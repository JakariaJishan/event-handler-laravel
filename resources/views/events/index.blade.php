@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto py-8 px-4">
        {{-- Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
            <h1 class="text-3xl font-bold text-gray-200 mb-4 sm:mb-0">Events</h1>
            <div class="flex space-x-2">
                <input
                    id="search"
                    type="text"
                    placeholder="Search events…"
                    class="border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                >
                <a
                    href="{{ route('events.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition"
                >
                    Create Event
                </a>
            </div>
        </div>

        {{-- Events Grid --}}
        <div id="eventsList" class="grid gap-6 md:grid-cols-2">
            @foreach($events as $event)
                <div
                    class="bg-white shadow rounded-lg overflow-hidden event-card"
                    data-name="{{ strtolower($event->name) }}"
                    data-description="{{ strtolower($event->description) }}"
                >
                    {{-- Card Header --}}
                    <div class="flex justify-between items-center p-4 cursor-pointer header">
                        <h2 class="text-xl font-semibold text-gray-800">{{ $event->name }}</h2>
                    </div>
                    <div class="px-4 pb-4 text-gray-700 space-y-2 details">
                        <p>{{ $event->description }}</p>
                        <p>
                            <span class="font-medium">Date:</span>
                            {{ \Carbon\Carbon::parse($event->start_time)->format('M j, Y g:i A') }}
                            –
                            {{ \Carbon\Carbon::parse($event->end_time)->format('M j, Y g:i A') }}
                        </p>
                        <p>
                            <span class="font-medium">Location:</span>
                            {{ $event->location }}
                        </p>
                    </div>
                </div>
            @endforeach

            @if($events->isEmpty())
                <div class="col-span-full text-center text-gray-500 py-10">
                    No events found.
                </div>
            @endif
        </div>
    </div>

    {{-- Vanilla JS for interactivity --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle details on header click
            document.querySelectorAll('.event-card .header').forEach(header => {
                header.addEventListener('click', () => {
                    const card    = header.parentElement;
                    const details = card.querySelector('.details');
                    const icon    = header.querySelector('svg');

                    if (details.classList.contains('hidden')) {
                        details.classList.remove('hidden');
                        icon.classList.add('rotate-180');
                    } else {
                        details.classList.add('hidden');
                        icon.classList.remove('rotate-180');
                    }
                });
            });

            // Search/filter functionality
            const searchInput = document.getElementById('search');
            const cards       = document.querySelectorAll('.event-card');
            const list        = document.getElementById('eventsList');

            searchInput.addEventListener('input', function() {
                const q = this.value.toLowerCase();
                let anyVisible = false;

                cards.forEach(card => {
                    const name = card.dataset.name;
                    const desc = card.dataset.description;
                    const match = name.includes(q) || desc.includes(q);

                    card.classList.toggle('hidden', !match);
                    if (match) anyVisible = true;
                });

                // Handle “No events found” message
                let noMsg = document.getElementById('noEventsMessage');
                if (!anyVisible) {
                    if (!noMsg) {
                        noMsg = document.createElement('div');
                        noMsg.id = 'noEventsMessage';
                        noMsg.className = 'col-span-full text-center text-gray-500 py-10';
                        noMsg.textContent = 'No events found.';
                        list.append(noMsg);
                    }
                } else if (noMsg) {
                    noMsg.remove();
                }
            });
        });
    </script>
@endsection
