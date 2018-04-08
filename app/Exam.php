<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Exam
 *
 * @property int $id
 * @property int $user_id
 * @property \App\Course $course
 * @property string $date
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\User $student
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam whereCourse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Exam whereUserId($value)
 * @mixin \Eloquent
 */
class Exam extends Model
{
    protected $fillable = ['user_id','subject_id','course_id','date'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function subject() {
        return $this->belongsTo(Subject::class);
    }

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function date() {
        return new Carbon($this->date);
    }
}
