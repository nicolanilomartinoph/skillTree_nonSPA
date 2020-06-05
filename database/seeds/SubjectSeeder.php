<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a JSON file that contains the SKILL-SUBJECT PAIR
        $subjects = json_decode(file_get_contents(storage_path("app/public/skillTree/data/subjects.json")));
        
        foreach($subjects as $key => $subject)
        {
            DB::table('subjects')->insert([
                'title' => $subject->title,
                'description' => $subject->description,
                'skill_id' => $subject->skill_id,
                'video' => $subject->video,
                'site' => $subject->site,
            ]);
        }
    }
}
