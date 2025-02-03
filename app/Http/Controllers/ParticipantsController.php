<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Response;
use App\Models\Event;
use App\Models\Course;
use App\Models\Teacher;
use Inertia\Inertia;
use App\Models\Participant;


class ParticipantsController extends Controller{
    public function save(Request $request): Response {

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'event_id' => 'required|string',
        ]);

        Participiant::create([
            'name' => $request->name,
            'email' => $request->email,
            'event_id' => $request->event_id,
        ]);

        return true;
    }
}