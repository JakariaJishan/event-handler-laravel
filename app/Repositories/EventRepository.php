<?php

namespace App\Repositories;
use App\Interfaces\EventRepositoryInterface;
use App\Models\Event;
use Carbon\Carbon;

class EventRepository implements EventRepositoryInterface
{
    public function getAllEvents()
    {
        return Event::paginate(5);
    }

    public function getEventById($id)
    {
        return Event::findOrFail($id);
    }

    public function createEvent(array $data)
    {
        return Event::create($data);
    }

    public function updateEvent($id, array $data)
    {
        $event = Event::findOrFail($id);
        $event->update($data);
        return $event;
    }

    public function deleteEvent($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return $event;
    }
}
