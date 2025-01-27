<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{
    use HasUuids;

    public function participants()
    {
        return $this->hasMany(Participants_Events_Connection::class, 'participants_id', 'id');
    }
}
