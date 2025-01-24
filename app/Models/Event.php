<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EventSpeaker;
use App\Models\EventCategory;
use App\Models\Acara;
use Carbon\Carbon;


class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'start_date',
        'end_date',
        'image',
        'status',
        'event_category_id',
        'event_speaker_id',
    ];

    
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    // Relasi
    public function category()
    {
        return $this->belongsTo(EventCategory::class, 'event_category_id');
    }

    public function speaker()
    {
        return $this->belongsTo(EventSpeaker::class, 'event_speaker_id');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        // Validasi lainnya sesuai kebutuhan
    ]);

    // Menyimpan event baru
    $event = new Event();
    $event->title = $request->title;
    $event->start_date = Carbon::parse($request->start_date);
    $event->end_date = Carbon::parse($request->end_date);
    $event->save();

    return redirect()->route('events.index');
}

    

public function getImageUrlAttribute()
{
    return $this->image ? asset('storage/' . $this->image) : null;
}

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }


}
