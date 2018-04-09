@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Punkte zu {{$station->name}}</div>
                    <div class="card-body">

                        @foreach($points as $point)

                            <p><a class="btn btn-primary btn-block" href="{!! route('scan.points',['station' => $station, 'point' => $point->id]) !!}">{{$point->name}}</a></p>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
