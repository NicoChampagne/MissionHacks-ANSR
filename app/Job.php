<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['name', 'description'];

    public function required() {
        $this->hasMany(Skill::class);
    }
}
