<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;

    static function getInstance($module) {
        $modelName = "App\Models\\".$module;
        return new $modelName();
    }
    function getValue($header){
        return $this->getAttribute($header);
    }
    static function mappingField(){
        return array();
    }

    function formatData($input, $image = null){
        if(isset($input['status'])){
            $input['status'] = isset($input['status']) ? 1: 0;
        }
        if($image){
            $input['image'] = $image;
        }
        unset($input['id']);
        unset($input['_token']);
        unset($input['image_hidden_name']);
        return $input;
    }
}
