<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public $timestamps = true;
    use HasFactory;
    protected $fillable = [
        'course_id',
        'lesson_id',
        'code',
        'title',
        'description',
        'image',
        'status',
        'type'
    ];
}
