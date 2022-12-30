<?php

namespace App\Http\Admin\Controllers;

use App\Http\Admin\Controllers\AdminController;
use App\Models\Question;

class QuestionController extends AdminController
{

    public $title = 'Skill';
    public function listBySkill($skill_id){
        $questions = Question::where('skill_id', $skill_id)->get();
        return view('admin.question.listBySkill', array('questions' => $questions));
    }
}
