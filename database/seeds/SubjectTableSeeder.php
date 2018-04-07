<?php

use Illuminate\Database\Seeder;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Subject::class)->create(['name' => 'Mathematics']);
        factory(App\Subject::class)->create(['name' => 'Sciences']);
        factory(App\Subject::class)->create(['name' => 'Languages']);
        factory(App\Subject::class)->create(['name' => 'Arts']);
        factory(App\Subject::class)->create(['name' => 'Physical Education']);
        factory(App\Subject::class)->create(['name' => 'Social Studies']);
        factory(App\Subject::class)->create(['name' => 'History']);
        factory(App\Subject::class)->create(['name' => 'Practical Experience']);
    }
}
