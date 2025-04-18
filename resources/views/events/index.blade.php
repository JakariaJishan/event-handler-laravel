@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Events</h1>
        <button>
            <a href="{{ route('events.create') }}">Create Event</a>
        </button>
        <ul>
            @foreach($events as $event)
                <li>{{ $event->name }}</li>
                <p>{{ $event->description }}</p>
                <p>Date: {{ $event->start_time }} - {{$event->end_time}}</p>
                <p>Location: {{ $event->location }}</p>
            @endforeach
        </ul>
    </div>
@endsection
