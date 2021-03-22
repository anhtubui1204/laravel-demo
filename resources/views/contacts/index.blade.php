@extends('layouts.app')

@section('style')
    <style>
        .contact-container{
            padding-top: 5px;
        }
    </style>
@endsection

@section('content')
    <div class="container contact-container">
        <h1>Contact index</h1>

        @if(count($contacts))
            <ul class="list-group">
            @foreach($contacts as $person)
                <li class="list-group-item">{{$person}}</li>
            @endforeach
            </ul>
        @endif
    </div>
@endsection
