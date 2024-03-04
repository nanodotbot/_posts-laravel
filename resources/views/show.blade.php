@extends('layout')

@push('css')
    <link rel="stylesheet" href="{{ asset('./css/structure.css') }}">
@endpush

@section('content')
    @php
        $date = date_create($chat->created_at);
        $date = date_format($date,"d.m.Y H:i:s");
        $date2 = date_create($chat->updated_at);
        $date2 = date_format($date2,"d.m.Y H:i:s");

        $to_be_replaced = array('&lt;b&gt;', '&lt;/b&gt;', '&lt;i&gt;', '&lt;/i&gt;', '&lt;em&gt;', '&lt;/em&gt;', '&lt;u&gt;', '&lt;/u&gt;', '&lt;strong&gt;', '&lt;/strong&gt;');
        $by = array('<b>', '</b>', '<i>', '</i>', '<em>', '</em>', '<u>', '</u>', '<strong>', '</strong>');
        $message = $chat->message;
        $message = htmlentities($message);
        $message = str_replace($to_be_replaced, $by, $message);
        $message = nl2br($message);
    @endphp
    <main>
        <a class="first" href="./index.php"><svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"><path d="m276.846-460 231.693 231.692L480-200 200-480l280-280 28.539 28.308L276.846-500H760v40H276.846Z"/></svg> Zurück</a>
        <div>
            <h1>Detailansicht</h1>
            <div>
                <p class="show-title">id</p>
                <p>{{$chat->id}}</p>
                <p class="show-title">erstellt am</p>
                <p>{{$date}}</p>
                <p class="show-title">bearbeitet am</p>
                <p>{{$date2}}</p>
            </div>
            <div class="show-message">
                <p class="show-title">Mitteilung</p>
                <p> {!! $message !!} </p>
            </div>
        </div>
    </main>
@endsection