@extends('layouts.app')

@section('content')
    <form action="{{route('events.store')}}" method="POST">
        @csrf
        <div class="container">
            <h1>Create Event</h1>
            <div>
                <label for="name">Event Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <div>
                <label for="start_time">Start Time:</label>
                <input type="datetime-local" id="start_time" name="start_time" required>
            </div>
            <div>
                <label for="end_time">End Time:</label>
                <input type="datetime-local" id="end_time" name="end_time" required>
            </div>
            <div>
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required>
            </div>
            <button type="submit">Create Event</button>
        </div>
@endsection
