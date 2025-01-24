<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    protected $fillable = ['nama'];

    public function events()
    {
        return $this->hasMany(Event::class, 'event_category_id');


        
    }
}
