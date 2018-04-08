<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Course::class, 5)->create();

        App\Subject::all()->each(function($s){
            $s->courses()->saveMany(factory(\App\Course::class, 50)->create(['subject_id' => $s->id]));
        });

    }
}
