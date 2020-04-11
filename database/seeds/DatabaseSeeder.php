<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(JobsSeeder::class);
        $this->call(SkillsSeeder::class);
        $this->call(SubjectSeeder::class);
    }
}
