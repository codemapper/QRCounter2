@extends('layouts.app')

@section('content')
    @include('includes.instascan')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><b>{{$point->points}}</b> Jahre für {{$station->name}}</div>
                    <div class="card-body">


                        <video id="prev" width="320" autoplay="autoplay" height="240">
                            Your browser does not support the video tag.
                        </video>
                        <p id="years" class="digit"></p>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection