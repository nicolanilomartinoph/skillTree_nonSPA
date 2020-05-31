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
        $jobs = json_decode(file_get_contents(storage_path('/app/public/skillTree/data/jobs.json')));

        foreach($jobs as $key => $job)
        {
            DB::table('jobs')->insert([
                'job_name' => $key,
                'job_description' => $job->job_description,
                'base_skills' => json_encode($job->base_skills),
                'job_image' => file_get_contents(storage_path($job->job_image)),
                'aux' => json_encode($job->aux)
            ]);
        }  
    }
}
