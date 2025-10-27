<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Registration;

class RegistrationController extends Controller
{
    // form registrasi
    public function create(Event $event)
    {
        return view('registrations.create', compact('event'));
    }

    // simpan registrasi
    public function store(Request $request, Event $event)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        Registration::create([
            'event_id' => $event->id,
            'user_id'  => auth()->id(),
            'name'     => $request->name,
            'email'    => $request->email,
        ]);

        return redirect()->route('events.index')
            ->with('success', 'Pendaftaran berhasil disimpan!');
    }
}
