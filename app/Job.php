<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'job_name','job_description','base_skills','job_image',
    ];

    // public function getRouteKeyName()
    // {
    //     return 'job_id';
    // }   
}
