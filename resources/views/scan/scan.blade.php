@extends('layouts.app')

@section('content')
    @include('includes.instascan')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Punkte</div>
                    <div class="card-body">

                            <video id="preview"></video>
                            <p id="years" class="digit"></p>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection