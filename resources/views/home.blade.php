@extends('layouts.app')

@section('content')
        <character-page :user="{{ json_encode($char) }}" />
@endsection
