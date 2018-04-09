@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Punkte</div>
                    <div class="card-body">

                    <table  class="table">
                        <tr>
                            <th>Name</th>
                            <th>Punkte</th>
                            <th>Station</th>
                            <th colspan="2" ><a href="{{ route('points.create') }}" class="btn btn-primary">+</a></th>
                        </tr>
                        @foreach ($points as $point)
                            <tr>
                                <td>{{$point->name}}</td>
                                <td>{{$point->points}}</td>
                                <td>{{$point->station['name']}}</td>
                                <td><a class="btn btn-primary" href="{{ route('points.edit', ['point' => $point->id]) }}">Edit</a></td>
                                <td>
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['points.destroy', $point->id]]) }}
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