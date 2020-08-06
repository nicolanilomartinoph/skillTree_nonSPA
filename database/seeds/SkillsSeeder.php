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
            'HTML' => 'app/images/skills/HTML/html_icon.png',

            // CSS starts here
            'CSS' => 'app/public/skillTree/images/CSS/css_icon.png',
            'SASS' => 'app/public/skillTree/images/CSS/sass_icon.png',
            'Bootstrap' => 'app/public/skillTree/images/CSS/bootstrap_4_icon.jpeg',

            // Javascript starts here
            'Javascript' => 'app/public/skillTree/images/JS/javascript_icon.png',
            'ReactJS' => 'app/public/skillTree/images/JS/reactjs_icon.png',
            'VueJS' => 'app/public/skillTree/images/JS/vuejs_icon.png',
            'Angular' => 'app/public/skillTree/images/JS/angular_icon.png',
            'Vuex' => 'app/public/skillTree/images/JS/vuex_icon.png',
            'Redux' => 'app/public/skillTree/images/JS/redux_icon.png',

            // PHP starts here
            // 'PHP' => 'app/images/skills/php_icon.png',
            // 'MySQL' => 'app/images/skills/mysql_icon.png',
            // 'DBMS' => 'app/images/skills/DBMS_icon.jpg',
            // 'Unreal Engine' => 'app/images/skills/unreal_engine_icon.jpg',
            // 'Unity' => 'app/images/skills/unity_icon.png',
            // 'AUX' =>  'app/images/skills/auxiliary_icon.png',
        ];

        $skills = json_decode(file_get_contents(storage_path("app/public/skillTree/data/skills.json")));

        /**
         * EXECUTE SEEDING
         */
        foreach($skills as $key => $skill)
        {
            DB::table('skills')->insert([
                'title' => $key,
                'description' => $skill->description,
                'image' => file_get_contents(storage_path($skill->image)),
                'parents' => json_encode($skill->parents),
                'children' => json_encode($skill->children),
            ]);
        }
    }
}


