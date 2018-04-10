@extends('layouts.app')

@section('content')
    @include('includes.instascan')

    <video id="prev" width="320" autoplay="autoplay" height="240">
        Your browser does not support the video tag.
    </video>

    <table class="table" id="feedback"></table>
@endsection
