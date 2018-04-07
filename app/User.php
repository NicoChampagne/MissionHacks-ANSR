<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','socialID', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'socialID','password', 'remember_token',
    ];

    public function courses() {
    return $this->hasMany(Course::class);
}

    public function completedCourses() {
        return $this->hasMany(Course::class);
    }


    public function subjects() {
        return $this->hasMany(Subject::class);
    }

    //TODO:
    public function permitted() {
        //return $this->hasMany()
    }
}
