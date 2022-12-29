<?php

namespace App\Http\Admin\Controllers;

use App\Http\Admin\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Models\Course;
use Illuminate\Support\Facades\Redirect;
use DB;

class CourseController extends AdminController
{
    public function list()
    {
        $courses = Course::get();
        return view('admin.course.list', array('courses' => $courses));
    }
    public function show($id)
    {
        $course = Course::find($id);
        return view('admin.course.show', array('course' => $course));
    }
    public function add()
    {
        return view('admin.course.add');
    }
    public function edit($id)
    {
        $course = Course::find($id);
        return view('admin.course.edit', array('course' => $course));
    }
    public function update(Request $request)
    {
        $input = $request->all();
        $validate_arr = [
            'code' => 'required',
            'title' => 'required|max:255',
            'course_group_id' => 'required',
        ];
        $isUpdate = $this->checkExitId($input['id']);
        if($isUpdate){
            $validate_arr['image'] = 'mimes:jpeg,jpg,png,gif|max:1000';
        }else{
            $validate_arr['image'] = 'mimes:jpeg,jpg,png,gif|required|max:1000';
        }
        $validator = Validator::make($input, $validate_arr);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)
                ->withInput();
        }
        $code = $input['code'];
        $status = isset($input['status']) ? 1: 0;

        $file_path = 'images/courses';
        $file_image = $request->file('image');
        if($file_image){
            $file_name = date('Ymd-His').'_'.$code.'.'.$file_image->extension();
            //        $file_name = date('Ymd-His').'_'. $file_image->getClientOriginalName();
            $file_image->storeAs($file_path, $file_name, 'local');
            $image = $file_path.'/'.$file_name;
        }else{
            $image = $input['image_name'];
        }

        $data = [
            'code' => $code,
            'title' => $input['title'],
            'description' => $input['description'],
            'image' => $image,
            'status' => $status,
            'course_group_id' => $input['course_group_id']
        ];

        if(isset($input['id']) && $input['id'] !== null){
            Course::where('id', $input['id'])->update($data);
        }else{
            Course::create($data);
        }
        return Redirect::route('admin.course.list')->with('message', 'Course saved correctly!!!');
    }
    public function  checkExitId($id){
        if(isset($id) && $id !== null){
            return true;
        }else{
            return false;
        }
    }
    public function delete($id)
    {
        Course::where('id', $id)->delete();
        return back();
    }
}
