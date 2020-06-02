@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row jobDetails justify-content-sm-center">
            <div class="col-lg-4 col-md-6 col-sm-12 align-items-center">
                <img src="data:image/png;base64, {{ base64_encode($details->image) }}" class="align-items-center rounded job-icon"/>
            </div>
            <div class="col-lg-8 col-md-6 my-4 ">
                <div class="col-12 jobName">{{ $details->title }}</div>
                <div class="col-12 jobDesc">{{ $details->description }}</div> 
            </div>
        </div>
        <skill-tree 
            :skills-details="{{ json_encode($base) }}"
            :aux="{{ json_encode($aux) }}"
        />
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
