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
                            <th>Anzahl Posten</th>
                            <th>Preis</th>
                        </tr>

                        @if(!count($prices))
                            <tr>
                                <td colspan="8">Noch keine Daten zum verkaufen.</td>
                            </tr>
                        @else
                            @foreach ($codes as $code)
                                <tr>
                                    <td>{{ str_limit($code->question_prename, 10) }}</td>
                                    <td>{{ str_limit($code->question_name, 10) }}</td>
                                    <td>{{ str_limit($code->question_gender, 10) }}</td>
                                    <td>{{ str_limit($code->question_alone, 10) }}</td>
                                    <td>{{ str_limit($code->question_event, 10) }}</td>
                                    <td>{{ str_limit($code->question_event_rating, 10) }}</td>
                                    <td>{{ str_limit($code->question_loved_station, 10) }}</td>
                                    <td>{{ $numberOfVisits[$code->id] }}</td>
                                    <td>{{ link_to('/dataprotect/fetch?code=' . $code->id, $prices[$code->id] . ' CHF') }}</td>
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
