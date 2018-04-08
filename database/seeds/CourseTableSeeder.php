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

        App\Subject::all()->each(function($s){
            for($i = 1; $i <= 40; $i++) {
                $s->courses()->save(
                    factory(\App\Course::class)->create(['subject_id' => $s->id , 'name' => "$s->name $i"])
                );
            }
        });

    }
}
