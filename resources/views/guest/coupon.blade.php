@extends('layouts.guest')

@section('content')
    @include('includes.instascan')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><b>Erfasse {{$point->points}} Jahre für {{$point->name}}</b></div>
                    <div class="card-body">


                        <video id="prev" width="320" autoplay="autoplay" height="240">
                            Your browser does not support the video tag.
                        </video>
                        <p id="feedback" class="digit"></p>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection