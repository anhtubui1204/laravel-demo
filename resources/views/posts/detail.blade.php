@extends('layouts.app')

@section('style')
    <style>
        .post-container{
            padding-top: 5px;
        }
    </style>
@endsection

@section('content')
    <div class="container post-container">
        <h1>Post Detail index</h1>
        <p>Post ID: {{$id}}</p>

    </div>
@endsection
