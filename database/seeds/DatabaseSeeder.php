<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(SubjectTableSeeder::class);
        //$this->call(CourseTableSeeder::class);
        $this->call(SkillTableSeeder::class);
        $this->call(JobTableSeeder::class);

        App\Subject::all()->each(function($s) {
            $s->courses()->saveMany(factory(\App\Course::class, 20)->create(['subject_id' => $s->id])
                ->each(function ($course) {
                    $users = App\User::orderBy(DB::raw('RAND()'))->take(25)->get();
                    foreach ($users as $user) {
                        $user->courses()->attach($course->id);
                    }
                }));
        });
    }
}
