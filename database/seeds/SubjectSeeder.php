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
        DB::table('subjects')->insert([
            'skill_id' => 1,
            'subject_title' => 'HTML Basics 1',
            'subject_description' => 'First thing about HTML is bla bla blah'
        ]);
        DB::table('subjects')->insert([
            'skill_id' => 1,
            'subject_title' => 'HTML Basics 2',
            'subject_description' => 'Second thing about HTML is bla bla blah'
        ]);
        DB::table('subjects')->insert([
            'skill_id' => 1,
            'subject_title' => 'HTML Basics 3',
            'subject_description' => 'First thing about HTML is bla bla blah'
        ]);
        DB::table('subjects')->insert([
            'skill_id' => 1,
            'subject_title' => 'HTML Basics 4',
            'subject_description' => 'Second thing about HTML is bla bla blah'
        ]);
        DB::table('subjects')->insert([
            'skill_id' => 1,
            'subject_title' => 'HTML Basics 5',
            'subject_description' => 'First thing about HTML is bla bla blah'
        ]);

        DB::table('subjects')->insert([
            'skill_id' => 1,
            'subject_title' => 'HTML Basics 6',
            'subject_description' => 'Second thing about HTML is bla bla blah'
        ]);
        DB::table('subjects')->insert([
            'skill_id' => 1,
            'subject_title' => 'HTML Basics 7',
            'subject_description' => 'Second thing about HTML is bla bla blah'
        ]);
        DB::table('subjects')->insert([
            'skill_id' => 1,
            'subject_title' => 'HTML Basics 8',
            'subject_description' => 'First thing about HTML is bla bla blah'
        ]);

        DB::table('subjects')->insert([
            'skill_id' => 1,
            'subject_title' => 'HTML Basics 9',
            'subject_description' => 'Second thing about HTML is bla bla blah'
        ]);

        DB::table('subjects')->insert([
            'skill_id' => 2,
            'subject_title' => 'CSS Basics 1',
            'subject_description' => 'First thing about CSS is bla bla blah'
        ]);
        DB::table('subjects')->insert([
            'skill_id' => 2,
            'subject_title' => 'CSS Basics 2',
            'subject_description' => 'Second thing about CSS is bla bla blah'
        ]);
        DB::table('subjects')->insert([
            'skill_id' => 2,
            'subject_title' => 'CSS Basics 3',
            'subject_description' => 'THIRD thing about CSS is bla bla blah'
        ]);
    }
}
