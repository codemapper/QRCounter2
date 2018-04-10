@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Bbc Silkroad</div>
                    <div class="card-body">

                    <table  class="table">
                        <tr>
                            <th>Vorname</th>
                            <th>Name</th>
                            <th>Geschlecht</th>
                            <th>Begleitung</th>
                            <th>Event-Quelle</th>
                            <th>Event-Rating</th>
                            <th>Leiblingsposten</th>
                            <th>Preise</th>
                        </tr>

                        @if(!count($prices))
                            <tr>
                                <td colspan="8">Noch keine Daten zum verkaufen.</td>
                            </tr>
                        @else
                            @foreach ($codes as $code)
                                <tr>
                                    <td>{{ $code->question_prename }}</td>
                                    <td>{{ $code->question_name }}</td>
                                    <td>{{ $code->question_gender }}</td>
                                    <td>{{ $code->question_alone }}</td>
                                    <td>{{ $code->question_event }}</td>
                                    <td>{{ $code->question_event_rating }}</td>
                                    <td>{{ $code->question_loved_station }}</td>
                                    <td>{{ $prices[$code->id] }} CHF</td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
