@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Punkt erfassen</div>
                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {!! Form::model($point, ['action' => 'PointController@store']) !!}
                        <div class="form-group">
                            {!! Form::label('model', 'Station') !!}
                            {!! Form::select('station', $stations, null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('make', 'Herausforderung') !!}
                            {!! Form::text('value', old('value'), ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('model', 'Punkte') !!}
                            {!! Form::text('points', old('points'), ['class' => 'form-control']) !!}
                        </div>

                        <button class="btn btn-success" type="submit">Speichern</button>
                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection