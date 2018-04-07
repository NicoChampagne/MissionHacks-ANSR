<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name', 'slug', 'description'];

    public function courses() {
        return $this->hasMany(Course::class);
    }
}
