<?php

function skill_unpacker($skill, $recursive = true, &$parent_skills = null) 
{  
    /**
     * DESCRIPTION: This function accepts an array of skill ID [1,2,3,4] and turns the child skill index into associative arrays containing the details, if 
     * recursively "unpacking" the child skills of a child skill if there is one.
     * 
     * USAGE: 
     * function skill_unpacker( $ARRAY ), if not put the single skill ID into an array, consequently, this array will only contain 1 skill ID. (e.g. [1]).
     * 
     * If $recursive is false, it will not "unpack" the child skills into arrays of objects BUT just arrays of integers,
     * this is caused by json_decode.
     */

    // get the skill data

    
    foreach($skill as $key => $id)
    {
        // Find the skill and place it in this TEMP variable
        $raw_skill = \App\Skill::find($id);
        
        // Fix skill image (to prepare it for json_encode)
        $raw_skill['image'] = 'data:image/png;base64,'.base64_encode($raw_skill['image']);

        // Append Skill's subjects
        $raw_skill['subjects'] = $raw_skill->subjects;

        // Unpack JSONs to regular PHP arrays so it's readable by PHP as array(array contents will be unpacked)
        $raw_skill->parents = json_decode($raw_skill->parents);

        $raw_skill->children = json_decode($raw_skill->children);
        $raw_skill = $raw_skill->toArray();

        // then unpack skill if there is a child skill
        if($raw_skill['children'] && $recursive)
        {
            // Then sign the returned value to the child skills array
            $raw_skill['children'] = skill_unpacker($raw_skill['children'], true);
        }

        // Assign the skill back to the index
        $skill[$key] = $raw_skill;
    }
    
    return $skill;
}

function getUserEquipedJobs() {
    $equipedUserJobs = \Auth::user()->userJob()->get();
    
    for($i = 0; $i < count($equipedUserJobs); $i++) {
        $equipedUserJobs[$i]['title'] = \DB::table('jobs')->select('title')->where('id', '=', $equipedUserJobs[$i]->job_id)->get()[0]->title;
        
    }

    return $equipedUserJobs;
}