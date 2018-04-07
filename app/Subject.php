<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Subject
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Course[] $courses
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subject whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subject whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subject whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Subject extends Model
{
    protected $fillable = ['name', 'slug', 'description'];

    public function courses() {
        return $this->hasMany(Course::class);
    }

    public function score(){
        $sum = 0;
        foreach ($this->courses() as $course) {
            $course->credits;
        }

    }
}
