@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Codes</div>
                    <div class="card-body">

                    <table  class="table">
                        <tr>
                            <th>Name</th>
                            @admin
                            <th colspan="2" ><a href="{{ route('codes.create') }}" class="btn btn-primary">+</a></th>
                            @endadmin
                        </tr>
                        @foreach ($codes as $code)
                            <tr>
                                <td>{{$code->code}}</td>
                                @admin
                                <td><a class="btn btn-primary" href="{{ route('codes.edit', ['$station' => $code->id]) }}">Edit</a></td>
                                <td>
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['codes.destroy', $code->id]]) }}
                                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                    {{ Form::close() }}
                                </td>
                                @endadmin
                            </tr>
                        @endforeach
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection