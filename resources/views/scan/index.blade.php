@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Punkte</div>
                    <div class="card-body">

                        @foreach($stations as $station)

                            <p><a class="btn btn-primary btn-block" href="{!! route('scan.station',['station' => $station->id]) !!}">{{$station->name}}</a></p>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
