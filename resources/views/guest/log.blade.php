@extends('layouts.guest')

@section('content')
    @include('includes.instascan_code')

    <video id="prev" width="320" autoplay="autoplay" height="240">
        Your browser does not support the video tag.
    </video>

    <table id="logTable"></table>
@endsection
