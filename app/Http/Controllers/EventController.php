<?php

namespace App\Http\Controllers;

use App\Interfaces\EventRepositoryInterface;
use Illuminate\Http\Request;

class EventController extends Controller
{
    private EventRepositoryInterface $eventRepository;

    public  function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function index()
    {
        return view('events.index', [
            'events' => $this->eventRepository->getAllEvents()
        ]);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        $this->eventRepository->createEvent($request->all());

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }
}
