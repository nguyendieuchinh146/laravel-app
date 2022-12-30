<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Skill;
use App\Models\Question;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Imports\CarsImport;
use Maatwebsite\Excel\Facades\Excel;

class CarController extends Controller
{
    public function list()
    {
        $cars = Car::get();
        return view('cars.list', array('cars' => $cars));
    }
    public function show($id)
    {
        $car = Car::find($id);
        return view('cars.show', array('car' => $car));
    }
    public function add()
    {
        return view('cars.add');
    }
    public function edit($id)
    {
        $car = Car::find($id);
        return view('cars.edit', array('car' => $car));
    }
    public function update(Request $request)
    {
        $input = $request->all();
        $make = $input['make'];
        $model = $input['model'];
        $produced_on = $input['produced_on'];
        if($input['id'] !== null){
            Car::where('id', $input['id'])->update(['make' => $make, 'model' => $model, 'produced_on' => $produced_on]);
        }else{
            Car::create(['make' => $make, 'model' => $model, 'produced_on' => now()]);
        }

        return Redirect::route('cars.list')->with('message', 'Car saved correctly!!!');
    }
    public function importView()
    {
//        $this->importQuestions();
//        $rootPath = $_SERVER['DOCUMENT_ROOT'].env('APP_PATH');
//        $file = $rootPath.'resources/assets/xls/cars.xlsx';
//        Excel::import(new CarsImport, $file);die;
        return view('cars.import');
    }
    public function import(Request $request)
    {
        $file = $request->file('file')->store('temp');
        Excel::import(new CarsImport, $file);
        return back();
    }
    public function delete($id)
    {
        $data = Car::where('id', $id)->delete();
        return back();
    }

    function importQuestions(){
        $rootPath = $_SERVER['DOCUMENT_ROOT'].env('APP_PATH');
        $file = $rootPath.'storage/questions.xlsx';
        $sheets=  Excel::toCollection(new CarsImport, $file);
        $skill_templates =  Skill::where('lesson_id', 0)->get();
        $sheet_names = ['Giới thiêu', 'Trường học ', 'Sinh hoạt hàng ngày'];
        foreach($skill_templates as $skill_template){
            $skill_code = $skill_template->code;
            $skill_title = $skill_template->title;
            $skill_description = $skill_template->description;
            foreach ($sheets as $key =>  $sheet) {
                $lesson_data = $this->getLesson($sheet_names[$key]);
                $lesson_id = $lesson_data[0]->id;
                $count = 1;
                foreach ($sheet as $key_row => $row) {
                    $folder = $row[8];
                    if($folder === null) break;
                    if($folder === 'folder') continue;
                    if($folder == 'cum-tu'){
                        $new_skill_name = "Mẫu câu";
                        if($skill_title != 'Từ vựng'){
                            continue;
                        }
                    }else{
                        $new_skill_name =  $skill_title." ".$count;
                        if($skill_title == 'Mẫu câu'){
                            continue;
                        }
                    }
                    $skill_id = $this->createSkill($skill_code, $new_skill_name, $skill_description, $lesson_id);
                    $question = [];

                    $answer = $row[1];
                    $audio = $row[2];
                    $image = $row[3];
                    $spelling = $row[4];
                    $translate = $row[5];
                    $folder = $row[8];

                    $folder_path = 'storage/app/questions';
                    $folder_audio = $folder_path.'/audios/'.$folder."/";
                    $folder_image = $folder_path.'/images/'.$folder."/";
                    $question['skill_id']= $skill_id;
                    $question['title'] = $skill_title .' "'. $translate .'"';
                    $question['description'] = "";
                    $question['image'] = $folder_image.$image;
                    $question['audio'] = $folder_audio.$audio;
                    $question['spelling']= $spelling;
                    $question['template_name']= $skill_code;
                    $question['status']= 1;
                    $question['answer'] = $answer;
                    $question['translate']= $translate;

                    Question::create($question);
                    $count++;
                }
            }
        }
    }
    function getLesson($lesson_name){
        $lesson_data = Lesson::where('title', $lesson_name)->get();
        if(count($lesson_data) <=0){
            Lesson::create([
                'course_id' => 1,
                'code' => $lesson_name,
                'title' => $lesson_name,
                'description' => $lesson_name,
                'image' =>'',
                'status' => 1
            ]);
            $lesson_data = Lesson::where('title', $lesson_name)->get();
        }
        return $lesson_data;
    }
    function createSkill($skill_code, $new_skill_name, $skill_description, $lesson_id){
        $skill = Skill::where('code', $skill_code)->where('lesson_id', $lesson_id)->get();
        if(count($skill) <=0){
            $skill = Skill::create([
                'course_id' => 1,
                'lesson_id' => $lesson_id,
                'code' => $skill_code,
                'title' => $new_skill_name,
                'description'=> $skill_description,
                'image' => '',
                'status' => 1,
                'type' => ''
            ]);
            return $skill->id;
        }else{
            return $skill[0]->id;
        }
    }
}
