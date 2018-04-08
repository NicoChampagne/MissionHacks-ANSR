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
                $users = App\User::orderBy(DB::raw('RAND()'))->take(25)->get();
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

                $courses = App\Course::whereSubjectId($s->id)->get()->random($coursesCount);

                foreach ($courses as $course) {
                    $u->courses()->attach($course->id);
                }

                /*for($i = $coursesCount; $i > 0 ; $i--) {
                    $course = null;

                    do {
                        $id = random_int(1, App\Course::all()->count());
                        $course = App\Course::findOrFail($id)->first();
                        $valid = ($course === null || $course->subject_id !== $s->id);

                        echo ("$id - $valid");
                    } while ($course === null || $course->subject_id !== $s->id);

                    if($course !== null && $course->subject_id !== $s->id) {
                        $u->courses()->attach($course->id);
                    }
                }*/
            }
        });
    }
}
