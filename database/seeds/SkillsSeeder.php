<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * PREPARE: 
         * - Get the image data for seeding 
         * - Get the skills' parent and child skills
         */

        $skills_and_icon = [
            'HTML' => 'app/images/skills/html_icon.png',

            // CSS starts here
            'CSS' => 'app/images/skills/css_icon.png',
            'SASS' => 'app/images/skills/sass_icon.png',
            'Bootstrap' => 'app/images/skills/bootstrap_4_icon.jpeg',

            // Javascript starts here
            'Javascript' => 'app/images/skills/javascript_icon.png',
            'ReactJS' => 'app/images/skills/reactjs_icon.png',
            'VueJS' => 'app/images/skills/vuejs_icon.png',
            'Angular' => 'app/images/skills/angular_icon.png',
            'Vuex' => 'app/images/skills/vuex_icon.png',
            'Redux' => 'app/images/skills/redux_icon.png',

            // PHP starts here
            // 'PHP' => 'app/images/skills/php_icon.png',
            // 'MySQL' => 'app/images/skills/mysql_icon.png',
            // 'DBMS' => 'app/images/skills/DBMS_icon.jpg',
            // 'Unreal Engine' => 'app/images/skills/unreal_engine_icon.jpg',
            // 'Unity' => 'app/images/skills/unity_icon.png',
            // 'AUX' =>  'app/images/skills/auxiliary_icon.png',
        ];

        $parent_and_child_skills = json_decode(file_get_contents(storage_path("app/images/skills/skills.json")));

        /**
         * 
         * EXECUTE SEEDING
         * 
         */
        foreach($skills_and_icon as $key => $icon)
        {
            DB::table('skills')->insert([
                'skill_name' => $key,
                'skill_description' => 'na',
                'skill_image' => file_get_contents(storage_path($icon)),
                'parent_skills' => json_encode($parent_and_child_skills->$key->parent_skills),
                'child_skills' => json_encode($parent_and_child_skills->$key->child_skills),
            ]);
        }
    }
}


