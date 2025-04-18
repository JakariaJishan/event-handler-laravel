<?php

namespace App\Interfaces;

interface EventRepositoryInterface
{
    public function getAllEvents();
    public function getEventById($id);
    public function createEvent(array $data);
    public function updateEvent($id, array $data);
    public function deleteEvent($id);

}
