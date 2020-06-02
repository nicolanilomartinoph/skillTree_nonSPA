<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    // public $primaryKey = "subject_id";

    protected $fillable = [
        'skill','subject_title','subject_description'
    ];

    // public function getRouteKeyName()
    // {
    //     return 'subject_id';
    // }

    public function skill()
    {
        return $this->belongsTo('App\Skill');
    }
}