<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\Skill;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CarsImport;
class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//        DB::table('cars')->insert([
//            'make' => 'BMV',
//            'model' => 'SUV',
//            'produced_on' => now(),
//        ]);
        $data = [
            ['course_id' => 0, 'lesson_id' => 0, 'code' => 'vocabulary', 'title' => 'Từ vựng', 'description' => 'Từ vựng', 'image' => '', 'status' => 1, 'type' => ''],
            ['course_id' => 0, 'lesson_id' => 0, 'code' => 'choose-picture', 'title' => 'Chọn ảnh', 'description' => 'Chọn ảnh có nghĩa là', 'image' => '', 'status' => 1, 'type' => ''],
            ['course_id' => 0, 'lesson_id' => 0, 'code' => 'choose-word', 'title' => 'Chọn từ', 'description' => 'Chọn từ có nghĩa là', 'image' => '', 'status' => 1, 'type' => ''],
            ['course_id' => 0, 'lesson_id' => 0, 'code' => 'vocabulary', 'title' => 'Mẫu câu', 'description' => 'Mẫu câu', 'image' => '', 'status' => 1, 'type' => ''],
            ['course_id' => 0, 'lesson_id' => 0, 'code' => 'filling-blank', 'title' => 'Điền từ', 'description' => 'Điền từ', 'image' => '', 'status' => 1, 'type' => ''],
        ];
        Skill::insert($data);

//        $rootPath = $_SERVER['DOCUMENT_ROOT'].env('APP_PATH');
//        $file = $rootPath.'resources/assets/xls/cars.xlsx';
//        Excel::import(new CarsImport, $file);die;


    }
}
