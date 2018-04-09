@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Stationen</div>
                    <div class="card-body">

                    <table  class="table">
                        <tr>
                            <th>Name</th>
                            <th colspan="2" ><a href="{{ route('stations.create') }}" class="btn btn-primary">+</a></th>
                        </tr>
                        @foreach ($stations as $station)
                            <tr>
                                <td>{{$station->name}}</td>
                                <td><a class="btn btn-primary" href="{{ route('stations.edit', ['$station' => $station->id]) }}">Edit</a></td>
                                <td>
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['stations.destroy', $station->id]]) }}
                                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection