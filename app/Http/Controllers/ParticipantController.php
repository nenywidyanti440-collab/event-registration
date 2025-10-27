<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    /**
     * Tampilkan form pendaftaran peserta untuk event tertentu
     */
    public function create(Event $event)
    {
        return view('participants.create', compact('event'));
    }

    /**
     * Simpan data peserta baru
     */
    public function store(Request $request, Event $event)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
        ]);

        $validated['event_id'] = $event->id;
        $validated['user_id'] = auth()->id();
        $validated['status'] = 'pending';

        Participant::create($validated);

        return redirect()
            ->route('events.show', $event)
            ->with('success', 'Pendaftaran peserta berhasil disimpan!');
    }

    /**
     * Khusus admin: lihat daftar peserta pada event
     */
    public function index(Event $event)
    {
        $participants = $event->participants()->latest()->get();

        return view('admin.events.participants', compact('event', 'participants'));
    }

    /**
     * Khusus admin: hapus peserta
     */
    public function destroy(Event $event, Participant $participant)
    {
        // pastikan peserta yang dihapus memang milik event ini
        if ($participant->event_id !== $event->id) {
            return back()->with('error', 'Peserta tidak valid untuk event ini.');
        }

        $participant->delete();

        return back()->with('success', 'Peserta berhasil dihapus.');
    }
}
