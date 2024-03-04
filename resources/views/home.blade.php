@extends('layout')

@push('css')
    <link rel="stylesheet" href="{{ asset('./css/structure.css') }}">
@endpush
@push('scripts')
    <script src="./js/home.js" defer></script>
    <script src="./js/_textarea.js" defer></script>
@endpush

@section('content')
    @php
        $ip = $_SERVER['REMOTE_ADDR'];
        // TODO: add to productive
        $mail_message = wordwrap($ip, 70);
        // mail('info@nano.sx', 'posts', $mail_message);
    @endphp

    <main>
        <form method="POST" action="{{ route('store') }}">
            @csrf
            <label for="message">Nachricht</label>
            <textarea name="message" id="message" class="textarea"
            >{{ old('message') }}</textarea>
            <button>Absenden</button>
        </form>
        @if (count($chats) > 0)
            @foreach ($chats as $chat)
                @php
                    $date = date_create($chat->created_at);
                    $date = date_format($date,"d.m.Y H:i:s");
                    
                    $to_be_replaced = array('&lt;b&gt;', '&lt;/b&gt;', '&lt;i&gt;', '&lt;/i&gt;', '&lt;em&gt;', '&lt;/em&gt;', '&lt;u&gt;', '&lt;/u&gt;', '&lt;strong&gt;', '&lt;/strong&gt;');
                    $by = array('<b>', '</b>', '<i>', '</i>', '<em>', '</em>', '<u>', '</u>', '<strong>', '</strong>');
                    $message = $chat->message;
                    $message = htmlentities($message);
                    $message = str_replace($to_be_replaced, $by, $message);
                    $message = nl2br($message);
                @endphp
                <div>
                    <a href="./{{$chat->id}}"><p>{{ $date }}</p></a>
                    <p class="chat-message active"> {!! $message !!} </p>
                    <form method="POST" action="{{ route('update', $chat->id) }}" class="form">
                        @csrf
                        @method('patch')
                        <textarea name="message" class="message textarea">{{ old('message', $chat->message) }}</textarea>
                    </form>
                    <form class="destroy" method="POST" action="{{ route('destroy', $chat->id) }}">
                        @csrf
                        @method('delete')
                    </form>
                    <div><div class="save-div"><button class="save">Speichern</button> | <button class="cancel">Abbrechen</button></div> <div class="edit-div active"><button class="edit">Bearbeiten</button> | <button class="delete">Löschen</button></div></div>
                </div>
            @endforeach
            {{-- {{$chats->links()}}     --}}
        @endif
        <hr>
    </main>
@endsection