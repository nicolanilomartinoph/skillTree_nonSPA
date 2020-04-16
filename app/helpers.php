<?php

function skill_unpacker($skill, $recursive = true) 
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
        $raw_skill['skill_image'] = 'data:image/png;base64,'.base64_encode($raw_skill['skill_image']);

        // Append subject count
        $raw_skill['subjects_count'] = $raw_skill->subjects()->count();

        // Unpack JSONs to regular PHP arrays so it's readable by PHP as array(array contents will be unpacked) 
        $raw_skill->parent_skills = json_decode($raw_skill->parent_skills);
        $raw_skill->child_skills = json_decode($raw_skill->child_skills);
        $raw_skill = $raw_skill->toArray();

        
        // then unpack skill if there is a child skill
        if($raw_skill['child_skills'] && $recursive)
        {
            // Then sign the returned value to the child skills array
            $raw_skill['child_skills'] = skill_unpacker($raw_skill['child_skills']);
        }

        // Assign the skill back to the index
        $skill[$key] = $raw_skill;
    }

    /**
     * Return the modified argument(array) of skills to the HEAD caller
     * It DOES NOT change the original skills array simply by passing it as an argument (original variable IS NOT referenced)
     * YOU MAY assign the returned value to the original array if you want it to overwrite it 
     * OR
     * Simply assign the returned value(array) to a new variable if you want to keep the original
     */
    
    return $skill;
}