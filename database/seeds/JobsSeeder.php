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
                'title' => $key,
                'description' => $job->description,
                'base' => json_encode($job->base),
                'image' => file_get_contents(storage_path($job->image)),
                'aux' => json_encode($job->aux)
            ]);
        }  
    }
}
