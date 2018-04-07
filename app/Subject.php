<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name', 'slug'];

    public function courses() {
        $this->hasMany(Course::class);
    }
}