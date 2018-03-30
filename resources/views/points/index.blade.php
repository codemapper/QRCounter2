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
                            <th><a href="{{ route('points.create') }}" type="button" class="btn btn-primary">+</a></th>
                        </tr>
                        @foreach ($points as $point)
                            <tr>
                                <td>{{$point->value}}</td>
                                <td>{{$point->points}}</td>
                                <td>{{$point->station['name']}}</td>
                                <td><a href="{{ route('points.edit', ['point' => $point->id]) }}">Edit</a></td>
                            </tr>
                        @endforeach
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection