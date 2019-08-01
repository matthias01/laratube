<?php

namespace Laratube;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    //changing the way incrementing is done, instead of using id, we use uuid
    // change the incrementing from the model class, by default its true
    public $incrementing = false;

    //creating a custom made unique id
    protected static function boot(){
        //load the boot model from Model class, to help create our unique id
        parent::boot();

        static::creating(function ($model){
            $model->{$model->getKeyName()} = (string)Str::uuid();
        });
    }

    public function channel(){
       return $this->hasOne(Channel::class);
    }




    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
