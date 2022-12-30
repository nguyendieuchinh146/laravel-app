<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Entity
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'course_id',
        'code',
        'title',
        'description',
        'image',
        'status'
    ];
    static function mappingField($list_parents = []){
        $headers =  array(
            'id' => [
                'title' => '#',
                'type' => 'hidden',
            ],
            'course_id' => [
                'title' => 'Course',
                'type' => 'select',
                'parent' => true,
                'model' => 'Course',
                'items' => []
            ],
            'code' => [
                'title' => 'Code',
                'type' => 'input',
            ],
            'title' => [
                'title' => 'Title',
                'type' => 'input',
            ],
            'description' => [
                'title' => 'Description',
                'type' => 'text',
            ],
            'image' => [
                'title' => 'Code',
                'type' => 'file',
            ],
            'status' => [
                'title' => 'Status',
                'type' => 'checkbox',
            ],
        );
        if($list_parents){
            foreach ($list_parents as $parent){
                $headers[$parent]['items'] = self::getParentItems($headers[$parent]['model']);
            }
        }
        return $headers;
    }
    static function getParentItems($model){
        $records = Entity::getInstance($model)->get();
        $items = [];
        foreach($records as $record){
            $items[] = array(
                'key' => $record['id'],
                'value' => $record['title'],
            );
        }
        return $items;
    }
    public function getValidate(){
        return [
            'code' => 'required',
            'title' => 'required|max:255',
            'course_id' => 'required',
        ];
    }
}
