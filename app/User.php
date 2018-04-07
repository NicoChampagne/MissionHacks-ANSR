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
        'name', 'socialID', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'socialID', 'password', 'remember_token',
    ];

    public function courses() {
        return $this->hasMany(Course::class);
    }

    public function completedCourses() {
        return $this->hasMany(Course::class);
    }

    //TODO: Permissions
    public function permitted() {
        //return $this->hasMany()
    }

    public function subjectScore(Subject $subject) {
        $sum = 0;
        foreach($this->completedCourses as $course) {
            if($course->subject_id == $subject->id) {
                $sum += $course->credits;
            }
        }
    }
}
