<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobs = [
            'Web developer',
            'Game developer',
            'Artificial Intelligence/Machine Learning Engineer',
            'Computer Research Scientist',
            'Data Analyst',
            'IT Manager',
            'Database Administrator',
            'Information Security Analyst',
            'Software Engineer',
            'Computer Hardware Engineer',
            'DevOps Engineer',
            'Computer Network Architect',
            'Network & Systems Administrator',
            'Mobile Application Developer'
        ];
        
        foreach($jobs as $job) 
        {
            DB::table('jobs')->insert([
                'job_name' => $job
                ]);
        }
        
    }
}
