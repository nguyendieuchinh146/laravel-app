<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = true;
    use HasFactory;
    protected $fillable = [
        'skill_id',
        'title',
        'description',
        'image',
        'audio',
        'spelling',
        'template_name',
        'status',
        'answer',
    ];
}
