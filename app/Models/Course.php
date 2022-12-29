<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'code',
        'title',
        'description',
        'image',
        'status',
        'course_group_id'
    ];
}
