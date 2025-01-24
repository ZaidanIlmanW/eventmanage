<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventSpeaker extends Model
{
    protected $fillable = ['nama', 'bio', 'foto'];

    public function events()
    {
        return $this->hasMany(Event::class, 'event_speaker_id');
    }
}
