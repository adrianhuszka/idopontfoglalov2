<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasUuids;

    public function events()
    {
        return $this->hasMany(Event::class, 'teacher_id', 'id');
    }
}
