<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto py-8 px-4">
        @if(session('success'))
            <div id="successMessage"
                 class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                 role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        {{-- Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-4 sm:mb-0">Events</h1>
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
        <div id="eventsList" class="grid gap-6 md:grid-cols-2 mb-6">
            @foreach($events as $event)
                <div
                    class="bg-white shadow rounded-lg overflow-hidden event-card"
                    data-name="{{ strtolower($event->name) }}"
                    data-description="{{ strtolower($event->description) }}"
                >
                    {{-- Card Header --}}
                    <div class="flex justify-between items-center p-4 cursor-pointer header">
                        <h2 class="text-xl font-semibold ">{{ $event->name }}</h2>
                        <span class="text-sm text-gray-500">{{$event->created_at->diffForHumans()}}</span>
                    </div>
                    <div class="px-4 pb-4 text-gray-600  space-y-2 details">
                        <p>{{ $event->description }}</p>
                        <p class="text-gray-500 text-sm">
                            <span class="font-medium">Event Time:</span>
                            {{ \Carbon\Carbon::parse($event->start_time)->format('M j, Y g:i A') }}
                            –
                            {{ \Carbon\Carbon::parse($event->end_time)->format('M j, Y g:i A') }}
                        </p>
                        <p>
                            <span class="font-medium">Location:</span>
                            {{ $event->location }}
                        </p>
                        <div class="flex space-x-2 mt-4">
                            <a
                                href="{{ route('events.edit', $event->id) }}"
                                class="border font-semibold py-1 px-2 rounded transition"
                            >
                                Edit
                            </a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this event?');">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg transition"
                                >
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            @if($events->isEmpty())
                <div class="col-span-full text-center text-gray-500 py-10">
                    No events found.
                </div>
            @endif

        </div>
        <div>{{$events->links()}}</div>

    </div>
</x-app-layout>
<script>
    const smsg = document.getElementById('successMessage');
    if (smsg) {
        setTimeout(() => {
            smsg.style.display = 'none';
        }, 3000);
    }
</script>
