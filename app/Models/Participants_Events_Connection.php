<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Participants_Events_Connection extends Model
{
    use HasUuids;

    public function participants_events_connection()
    {
        return $this->hasMany(Event::class, 'events_id', 'id');

        return $this->hasMany(Participants::class, 'participants_id', 'id');
    }
}
