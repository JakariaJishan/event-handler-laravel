<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Event') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-8 px-4">
        <form action="{{ route('events.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Global errors --}}
            @include('shared.errors')
            {{-- Event Name --}}
            <div>
                <label for="name" class="block text-gray-600 mb-1">Event Name <span class="text-red-500">*</span></label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name', $event->name) }}"
                    required
                    class="w-full border text-gray-600 border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Event name"
                >
                @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Location --}}
            <div class="mt-6">
                <label for="location" class="block text-gray-600 mb-1">Location <span class="text-red-500">*</span></label>
                <input
                    type="text"
                    name="location"
                    id="location"
                    value="{{ old('location', $event->location) }}"
                    required
                    class="w-full border text-gray-600 border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Where is it happening?"
                >
                @error('location')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Start Time --}}
            <div class="mt-6">
                <label for="start_time" class="block text-gray-600 mb-1">Start Time <span class="text-red-500">*</span></label>
                <input
                    type="datetime-local"
                    name="start_time"
                    id="start_time"
                    value="{{ old('start_time', \Carbon\Carbon::parse($event->start_time)->format('Y-m-d\TH:i')) }}"
                    required
                    class="w-full border text-gray-600 border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
                @error('start_time')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- End Time --}}
            <div class="mt-6">
                <label for="end_time" class="block text-gray-600 mb-1">End Time <span class="text-red-500">*</span></label>
                <input
                    type="datetime-local"
                    name="end_time"
                    id="end_time"
                    value="{{ old('end_time', \Carbon\Carbon::parse($event->end_time)->format('Y-m-d\TH:i')) }}"
                    required
                    class="w-full border text-gray-600 border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
                @error('end_time')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
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
                >{{ old('description', $event->description) }}</textarea>
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
                    value="{{ old('meet_link', $event->meet_link) }}"
                    class="w-full border text-gray-600 border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="https://"
                >
                @error('meet_link')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <input type="hidden" name="user_id" value="{{auth()->user()->id}}"></input>
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
                    Update Event
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
