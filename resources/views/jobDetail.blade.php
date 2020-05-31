@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row jobDetails justify-content-sm-center">
            <div class="col-lg-4 col-md-6 col-sm-12 align-items-center">
                <img src="data:image/png;base64, {{ base64_encode($job_details->job_image) }}" class="align-items-center rounded job-icon"/>
            </div>
            <div class="col-lg-8 col-md-6 my-4 ">
                <div class="col-12 jobName">{{ $job_details->job_name }}</div>
                <div class="col-12 jobDesc">{{ $job_details->job_description }}</div> 
            </div>
        </div>
        <Skill-tree :skills_details="{{ json_encode($base_skills) }}" :aux="{{ json_encode($aux) }}"/>
    </div>
@endsection

<style>
.jobDetails {
    background: grey;
    padding: 5px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
}

.jobName {
    margin-bottom: 10px;    
    word-wrap: break-word;
}

.jobDesc {
    word-wrap: break-word;
}
</style>
