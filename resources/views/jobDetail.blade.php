@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row myr">
            <div class="col-4">
                <img src="data:image/png;base64, {{ base64_encode($job_details->job_image) }}" class="rounded job-icon"/>
            </div>
            <div class="col-8 my-4 bg-success">
                <div class="col-12">{{ $job_details->job_name }}</div>
                <div class="col-12">{{ $job_details->job_description }}</div>
            </div>
        </div>
        <skill-tree :skills_details="{{ json_encode($base_skills) }}" />
    </div>
@endsection
