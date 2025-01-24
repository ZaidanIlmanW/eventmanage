<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Event;

class Participant extends Model
{

    use HasFactory;
    
    

    protected  $fillable = [
        'event_id',
        'nama',
        'kelas',
        'phone',
        'email',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

}
