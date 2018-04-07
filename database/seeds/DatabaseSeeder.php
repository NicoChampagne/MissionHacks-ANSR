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
        $this->call(CourseTableSeeder::class);
        $this->call(SkillTableSeeder::class);
        $this->call(JobTableSeeder::class);
    }
}
