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
            'title' => 'HTML Basics 1',
            'description' => 'First thing about HTML is bla bla blah'
        ]);
        DB::table('subjects')->insert([
            'skill_id' => 1,
            'title' => 'HTML Basics 2',
            'description' => 'Second thing about HTML is bla bla blah'
        ]);
        DB::table('subjects')->insert([
            'skill_id' => 1,
            'title' => 'HTML Basics 3',
            'description' => 'First thing about HTML is bla bla blah'
        ]);
        DB::table('subjects')->insert([
            'skill_id' => 1,
            'title' => 'HTML Basics 4',
            'description' => 'Second thing about HTML is bla bla blah'
        ]);
        DB::table('subjects')->insert([
            'skill_id' => 1,
            'title' => 'HTML Basics 5',
            'description' => 'First thing about HTML is bla bla blah'
        ]);

        DB::table('subjects')->insert([
            'skill_id' => 1,
            'title' => 'HTML Basics 6',
            'description' => 'Second thing about HTML is bla bla blah'
        ]);
        DB::table('subjects')->insert([
            'skill_id' => 1,
            'title' => 'HTML Basics 7',
            'description' => 'Second thing about HTML is bla bla blah'
        ]);
        DB::table('subjects')->insert([
            'skill_id' => 1,
            'title' => 'HTML Basics 8',
            'description' => 'First thing about HTML is bla bla blah'
        ]);

        DB::table('subjects')->insert([
            'skill_id' => 1,
            'title' => 'HTML Basics 9',
            'description' => 'Second thing about HTML is bla bla blah'
        ]);

        DB::table('subjects')->insert([
            'skill_id' => 2,
            'title' => 'CSS Basics 1',
            'description' => 'First thing about CSS is bla bla blah'
        ]);
        DB::table('subjects')->insert([
            'skill_id' => 2,
            'title' => 'CSS Basics 2',
            'description' => 'Second thing about CSS is bla bla blah'
        ]);
        DB::table('subjects')->insert([
            'skill_id' => 2,
            'title' => 'CSS Basics 3',
            'description' => 'THIRD thing about CSS is bla bla blah'
        ]);
    }
}
