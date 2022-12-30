<?php

namespace App\Http\Admin\Controllers;

use App\Http\Admin\Controllers\AdminController;
use App\Models\Skill;

class SkillController extends AdminController
{

    public $title = 'Skill';
    public function listByLesson($lesson_id){
        $skills = Skill::where('lesson_id', $lesson_id)->get();
        return view('admin.skill.listByLesson', array('skills' => $skills));
    }
}
