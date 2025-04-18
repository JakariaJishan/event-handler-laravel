@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Events</h1>
        <button>
            <button class="border-2 bg-blue-500 text-white font-bold py-2 px-4 rounded">
                <a href="{{ route('events.create') }}">Create Event</a>
            </button>
        </button>
        <ul>
            @foreach($events as $event)
                <li class="">{{ $event->name }}</li>
                <p>{{ $event->description }}</p>
                <p>Date: {{ $event->start_time }} - {{$event->end_time}}</p>
                <p>Location: {{ $event->location }}</p>
            @endforeach
        </ul>
    </div>
@endsection
