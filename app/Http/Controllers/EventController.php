<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeEventRequest;
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

    public function store(StoreEventRequest $request)
    {
        $this->eventRepository->createEvent($request->validated());

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }
}
