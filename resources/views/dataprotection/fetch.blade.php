@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Verlauf</div>
                    <div class="card-body">

                    <table  class="table">
                        <tr>
                            <th>Station</th>
                            <th>Herausforderung</th>
                            <th>Zeit</th>

                        </tr>
                        @if(!count($history))
                            <tr>
                                <td colspan="3">Noch keine Herausforderung bewältigt.</td>
                            </tr>
                        @else
                            @foreach ($history as $codesPoints)
                                <tr>
                                    <td>{{ $codesPoints['station']->name }}</td>
                                    <td>{{ $codesPoints['point']->name }}</td>
                                    <td>{{ $codesPoints['point']->points }} Jahre</td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center" style="margin-top: 30px">
            <div class="col-md-8">
                <a class="btn btn-primary btn-block" href="{!! route('data.index') !!}">Zurück zum Scan</a>
            </div>
        </div>
    </div>
@endsection
