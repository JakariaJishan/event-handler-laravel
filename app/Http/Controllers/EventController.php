<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeEventRequest;
use App\Interfaces\EventRepositoryInterface;
use App\Mail\SendWelcomeEmail;
use App\Notifications\NewEventNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $event = $this->eventRepository->createEvent($request->validated());
        $notificationData = [
            'message' => 'A new event has been created by: ' . $event->name,
            'event_id' => $event->id,
            'user_id' => auth()->id(),
        ];
        auth()->user()->notify(new NewEventNotification($notificationData));
        Mail::to(auth()->user()->email)->send(new SendWelcomeEmail($event));
        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function edit($id)
    {
        $event = $this->eventRepository->getEventById($id);
        return view('events.edit', compact('event'));
    }

    public function update(StoreEventRequest $request, $id)
    {
        $this->eventRepository->updateEvent($id, $request->validated());
        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy($id)
    {
        $this->eventRepository->deleteEvent($id);
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
