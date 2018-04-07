<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['name'];

    public function required() {
        $this->hasMany(Course::class);
    }
}
