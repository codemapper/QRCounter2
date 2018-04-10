@extends('layouts.app')

@section('content')
    @include('includes.instascan')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Logbuch</div>
                    <div class="card-body">



                        <video id="prev" width="320" autoplay="autoplay" height="240">
                            Your browser does not support the video tag.
                        </video>

                        <table class="table" id="feedback"></table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
