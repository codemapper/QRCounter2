@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">

                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Punkte</th>
                            <th>Station</th>
                        </tr>
                        @foreach ($points as $point)
                            <tr>
                                <td>{{$point->value}}</td>
                                <td>{{$point->points}}</td>
                                <td>{{$point->station['name']}}</td>
                            </tr>
                        @endforeach
                    </table>
                        <a href="{{ route('points.create') }}" type="button" class="btn btn-primary">+</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection