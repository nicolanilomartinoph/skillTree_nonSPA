<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //public $primaryKey = 'skill_id';

    //public function getRouteKeyName()
    //{
    //    return 'skill_id';
    //}

    protected $fillable = [
        'skill_name','skill_description','skill_image','parent_skill','child_skill'
    ];

    public function subjects()
    {
        return $this->hasMany('App\Subject');
    }
}
