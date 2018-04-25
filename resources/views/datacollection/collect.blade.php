@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Umfrage durchführen</div>
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

                        @if(Session::has('flash_message'))
                            <div class="alert alert-success"><em> {!! session('flash_message') !!}</em></div>
                        @endif

                        {!! Form::model($code, ['action' => ['DataCollectionController@update',$code],'method' => 'POST']) !!}

                        {{ Form::hidden('code', $code->id) }}

                        <div class="form-group">
                            {!! Form::label('Vorname') !!}
                            {!! Form::text('question_prename', old('question_prename'), ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Nachname') !!}
                            {!! Form::text('question_name', old('question_name'), ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Geschlecht') !!}
                            {!! Form::text('question_gender', old('question_gender'), ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Sind Sie alleine oder in Begleitung') !!}
                            {!! Form::text('question_alone', old('question_alone'), ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Wie/Von Wem haben sie vom Event erfahren') !!}
                            {!! Form::text('question_event', old('question_event'), ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Wie finden Sie das Event bis jetzt') !!}
                            {!! Form::text('question_event_rating', old('question_event_rating'), ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Welches ist Ihr Lieblings-Posten/Stand') !!}
                            {!! Form::text('question_loved_station', old('question_loved_station'), ['class' => 'form-control']) !!}
                        </div>

                        <button class="btn btn-success" type="submit">Speichern</button>
                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center" style="margin-top: 30px">
            <div class="col-md-8">
                <a class="btn btn-primary btn-block" href="{!! route('collect.index') !!}">Neue Umfrage</a>
            </div>
        </div>
    </div>
@endsection
