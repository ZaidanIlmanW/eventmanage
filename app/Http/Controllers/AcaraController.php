<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class AcaraController extends Controller
{
    public function index(Request $request)
    {
        // Ambil keyword dari query string
        $search = $request->input('search');
        
        // Ambil data event dengan pencarian (jika ada keyword)
        $events = Event::when($search, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        })->latest()->get();

        return view('acara.index', compact('events', 'search'));
    }

/*************  ✨ Codeium Command ⭐  *************/
    /**
     * Display the specified event.
     *
     * @param  int  $id  The ID of the event to display.
     * @return \Illuminate\View\View  The view displaying the event details.
     */

/******  8d30d1eb-4306-452d-bb5d-34026461d798  *******/
    public function show($id)
    {
        $events = Event::findOrFail($id); // Mengambil event berdasarkan ID
        return view('acara.show', compact('events'));
    }
}
