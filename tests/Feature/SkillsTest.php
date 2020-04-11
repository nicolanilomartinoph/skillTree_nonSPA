<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PhpParser\Node\Expr\FuncCall;
use Tests\TestCase;

class SkillsTest extends TestCase
{
    /**
    * @test
    * @dataProvider skill_dataProvider
    */
    public function skills_exist($dataProvider)
    {
        // AS YOU CAN SEE HERE, IT'S NOT GIVING AN ERROR
        $skill_data = json_decode(file_get_contents(storage_path("app/images/skills/skills.json")));

        $this->assertDatabaseHas('skills', [
            'skill_name' => "HTML"          ,  
        //  'skill_name' => "CSS"           ,
        //  'skill_name' => "SASS"          ,
        //  'skill_name' => "Bootstrap"     ,
        //  'skill_name' => "Javascript"    ,
        //  'skill_name' => "ReactJS"       ,
        //  'skill_name' => "Redux"         ,
        //  'skill_name' => "VueJS"         ,
        //  'skill_name' => "Vuex"          ,
        //  'skill_name' => "Angular"       ,
        ]);
    }

    public function skill_dataProvider() 
    {
        /**
         * ADDING ONE OF THESE VARIABLE CAUSES DATA PROVIDER TO BREAK
         * 
         * $skill_data = array(json_decode(file_get_contents(storage_path("app/images/skills/skills.json"))));
         * $skill_data = json_decode(file_get_contents(storage_path("app/images/skills/skills.json")));
         * $skill_data = file_get_contents(storage_path("app/images/skills/skills.json"));
         * $skill_data = storage_path("app/images/skills/skills.json");   
         * 
         */
        
        // This array is OK though. 
        $test = [1,2,3];

        return [[$test]];
    }
    
}
