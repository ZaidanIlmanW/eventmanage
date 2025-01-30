<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Event;
use App\Models\Participant;

class ParticipantController extends Controller
{
    
    public function store(Request $request, Event $event)
    {
        // Pastikan event berkategori seminar
        if ($events->category !== 'Seminar') {
            return redirect()->back()->with('error', 'Hanya bisa mendaftar pada event seminar.');
        }

        // Validasi data
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'email' => 'required|email|unique:participants,email',
            'phone' => 'required|string|max:15',
        ]);

        // Simpan data peserta
        Participant::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'email' => $request->email,
            'phone' => $request->phone,
            'event_id' => $event->id,
        ]);

        return redirect()->back()->with('success', 'Pendaftaran berhasil.');
    }


}
