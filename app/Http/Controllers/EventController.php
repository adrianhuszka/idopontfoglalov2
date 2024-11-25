<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Response;
use App\Models\Event;
use Inertia\Inertia;

class EventController extends Controller
{
    public function index(): Response
    {
        $events = Event::all();

        return Inertia::render('Events', [
            'events' => $events
        ]);
    }
}
