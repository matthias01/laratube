<?php

namespace Laratube;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Support\Str;

//this is a custom model that extends laravel base model, so othe models can make use of the uui id created
class Model extends BaseModel
{
    public $incrementing = false;



    protected $guarded =[];

    //creating a custom made unique id
    protected static function boot(){
        //load the boot model from Model class, to help create our unique id
        parent::boot();

        static::creating(function ($model){
            $model->{$model->getKeyName()} = (string)Str::uuid();
        });
    }
}
