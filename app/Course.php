<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['subject_id', 'name', 'description', 'credits'];

    public function subject() {
        return $this->belongsTo(Subject::class);
    }

    public function title() {
        return $this->subject().'-'.$this->id();
    }

    public function requirements() {
        return $this->hasMany(__CLASS__);
    }
}