@extends('layouts.app')

@section('content')
    @include('includes.instascan_datacollect')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Umfrage</div>
                    <div class="card-body">


                        <video id="prev" width="320" autoplay="autoplay" height="240">
                            Your browser does not support the video tag.
                        </video>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
