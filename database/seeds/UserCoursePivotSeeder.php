<?php

use Illuminate\Database\Seeder;

class UserCoursePivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*App\Subject::all()->each(function($s) {
            $s->courses()->saveMany(factory(\App\Course::class, 20)->create(['subject_id' => $s->id])
             ->each(function ($course) {
                $users = App\User::take(25)->get();
                foreach ($users as $user) {
                    $user->courses()->attach($course->id);
                }
            }));
         });*/

        App\User::all()->each(function (App\User $u) {
            $subs = App\Subject::all();
            foreach ($subs as $s) {
                $coursesCount = random_int(6,35);

                echo("$u->name will have $coursesCount $s->name courses\n");

                $courses = App\Course::whereSubjectId($s->id)->paginate($coursesCount);

                foreach ($courses as $course) {
                    $u->courses()->attach($course->id);
                }
            }
        });
    }
}
