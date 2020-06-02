<?php

namespace App\Http\Controllers;

use App\Job;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function show(job $job)
    {
        return view('subjectDetail');
    }
}
