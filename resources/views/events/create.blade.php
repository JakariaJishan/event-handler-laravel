@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-12 p-8 bg-white shadow-md rounded-lg">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">Create New Event</h2>

        <form action="{{ route('events.store') }}" method="POST" novalidate>
            @csrf

            {{-- Global errors --}}
           @include('shared.errors')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                {{-- Event Name --}}
                <div>
                    <label for="name" class="block text-gray-600 mb-1">Event Name <span class="text-red-500">*</span></label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name') }}"
                        required
                        class="w-full border text-gray-600 border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        placeholder="Enter event title"
                    >
                    @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Location --}}
                <div>
                    <label for="location" class="block text-gray-600 mb-1">Location <span class="text-red-500">*</span></label>
                    <input
                        type="text"
                        name="location"
                        id="location"
                        value="{{ old('location') }}"
                        required
                        class="w-full border text-gray-600 border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        placeholder="Where is it happening?"
                    >
                    @error('location')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Start Time --}}
                <div>
                    <label for="start_time" class="block text-gray-600 mb-1">Start Time <span class="text-red-500">*</span></label>
                    <input
                        type="datetime-local"
                        name="start_time"
                        id="start_time"
                        value="{{ old('start_time') }}"
                        required
                        class="w-full border text-gray-600 border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500 flatpickr"
                        placeholder="Select start date & time"
                    >
                    @error('start_time')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- End Time --}}
                <div>
                    <label for="end_time" class="block text-gray-600 mb-1">End Time <span class="text-red-500">*</span></label>
                    <input
                        type="datetime-local"
                        name="end_time"
                        id="end_time"
                        value="{{ old('end_time') }}"
                        required
                        class="w-full border text-gray-600 border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500 flatpickr"
                        placeholder="Select end date & time"
                    >
                    @error('end_time')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Description --}}
            <div class="mt-6">
                <label for="description" class="block text-gray-600 mb-1">Description <span class="text-red-500">*</span></label>
                <textarea
                    name="description"
                    id="description"
                    rows="4"
                    required
                    class="w-full border text-gray-600 border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="What’s this event about?"
                >{{ old('description') }}</textarea>
                @error('description')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Optional Meet Link --}}
            <div class="mt-6">
                <label for="meet_link" class="block text-gray-600 mb-1">Video Meet Link</label>
                <input
                    type="url"
                    name="meet_link"
                    id="meet_link"
                    value="{{ old('meet_link') }}"
                    class="w-full border text-gray-600 border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="https://"
                >
                @error('meet_link')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Hidden User ID --}}
            <input type="hidden" name="user_id" value="1">

            {{-- Submit Button --}}
            <div class="mt-8 flex justify-between items-center">
                <a
                    href="{{ route('events.index') }}"
                    class="bg-gray-500 text-white font-semibold py-2 px-6 rounded shadow hover:bg-gray-600 transition"
                >
                    Back
                </a>
                <button
                    type="submit"
                    class="bg-indigo-600 text-white font-semibold py-2 px-6 rounded shadow hover:bg-indigo-700 transition"
                >
                    Create Event
                </button>
            </div>
        </form>
    </div>
@endsection
