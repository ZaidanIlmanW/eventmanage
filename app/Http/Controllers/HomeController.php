<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Acara;


class HomeController extends Controller
{


    public function index()
    {
        // Ambil dua event pertama dari database
        $events = Event::where('start_date', '>=', now())
                        ->orderBy('start_date', 'asc')
                        ->take(3)
                        ->get();
    
        return view('home', compact('events'));
    }


}
