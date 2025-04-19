<?php

namespace App\Repositories;
use App\Interfaces\EventRepositoryInterface;
use App\Models\Event;
use Carbon\Carbon;

class EventRepository implements EventRepositoryInterface
{
    public function getAllEvents()
    {
        return Event::all();
    }

    public function getEventById($id)
    {
        return Event::findOrFail($id);
    }

    public function createEvent(array $data)
    {
//        $data['start_time'] = Carbon::createFromFormat('Y-m-d\TH:i', $data['start_time'])->format('Y-m-d H:i:s');
//        $data['end_time'] = Carbon::createFromFormat('Y-m-d\TH:i', $data['end_time'])->format('Y-m-d H:i:s');
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
