<?php

namespace App\Http\Admin\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Entity;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdminController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $title = 'Entity';
    public function list()
    {
        $prefix = strtolower($this->title);
        $blade_template = $this->getBladeTemplate('list');
        $title = $this->title . ' - List';
        $instance = Entity::getInstance($this->title);
        $records = $instance->get();
        $headers = $instance::mappingField();
        return view($blade_template, array('title' => $title, 'prefix' => $prefix, 'headers' => $headers, 'records' => $records));
    }
    public function add()
    {
        $prefix = strtolower($this->title);
        $blade_template = $this->getBladeTemplate('add');
        $title = $this->title . ' - List';
        $instance = Entity::getInstance($this->title);
        $headers = $instance::mappingField(['course_id']);
        return view($blade_template, array('title' => $title, 'prefix' => $prefix, 'headers' => $headers));
    }

    public function edit($id)
    {
        $prefix = strtolower($this->title);
        $title = $this->title . ' - List';
        $blade_template = $this->getBladeTemplate('edit');
        $instance = Entity::getInstance($this->title);
        $headers = $instance::mappingField(['course_id']);
        $record = $instance::find($id);
        return view($blade_template, array('title' => $title, 'prefix' => $prefix, 'headers' => $headers, 'record' => $record));
    }

    public function update(Request $request)
    {
        $instance = Entity::getInstance($this->title);
        $input = $request->all();
        $validate_arr = $instance->getValidate();
        $isUpdate = $this->checkExistId($input['id']);
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

        $file_path = 'images/'.strtolower($this->title).'s';
        $file_image = $request->file('image');
        if($file_image){
            $file_name = date('Ymd-His').'_'.$code.'.'.$file_image->extension();
            $file_image->storeAs($file_path, $file_name, 'local');
            $image = $file_path.'/'.$file_name;
        }else{
            $image = $input['image_hidden_name'];
        }
        $data = $instance->formatData($input, $image);
        if(isset($input['id']) && $input['id'] !== null){
            $instance::where('id', $input['id'])->update($data);
        }else{
            $instance::create($data);
        }
        $blade_template = $this->getBladeTemplate('list', 'route');
        return Redirect::route($blade_template)->with('message', 'Course saved correctly!!!');

    }

    public function delete($id)
    {
        $instance = Entity::getInstance($this->title);
        $instance::where('id', $id)->delete();
        return back();
    }

    public function getBladeTemplate($action, $type = ''){
        $prefix = strtolower($this->title);
        $blade_template = 'admin.'.$prefix.'.'.$action;
        if($type === 'route'){
            return $blade_template;
        }
        if(!view()->exists($blade_template)){
            $blade_template = 'admin.entity.'.$action;
        }
        return $blade_template;
    }
    public function  checkExistId($id){
        if(isset($id) && $id !== null){
            return true;
        }else{
            return false;
        }
    }
}
