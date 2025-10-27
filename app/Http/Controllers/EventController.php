<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    // ======================
    // List semua event
    // ======================
    public function index(Request $request)
    {
        $query = Event::query();

        $search = trim((string) $request->get('q'));
        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        // Order by date desc by default
        $events = $query->orderBy('date', 'desc')->paginate(10)->withQueryString();

        // Tentukan view berdasarkan apakah user adalah admin atau tidak
        $isAdmin = auth()->check() && auth()->user()->isAdmin();
        $viewName = $isAdmin ? 'admin.events.index' : 'events.index';

        return view($viewName, compact('events'));
    }


    // ======================
    // Form tambah event (hanya user yang login)
    // ======================
    public function create()
    {
        return view('events.create');
    }

    // ======================
    // Simpan event baru
    // ======================
   public function store(Request $request)
{
    $validated = $request->validate([
        'title'       => 'required|string|max:255',
        'description' => 'required',
        'date'        => 'required|date',
        'location'    => 'required|string|max:255',
        'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    // Upload gambar jika ada
    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('events', 'public');
    }

    // Tambahkan user_id dari user yang login
    $validated['user_id'] = auth()->id();

    Event::create($validated);

    return redirect()->route('events.index')->with('success', 'Event berhasil dibuat!');
}


    // ======================
    // Detail event
    // ======================
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    // ======================
    // Form edit event (hanya user yang login)
    // ======================
    public function edit(Event $event)
    {
        // Tentukan view berdasarkan apakah user adalah admin atau tidak
        $isAdmin = auth()->check() && auth()->user()->isAdmin();
        $viewName = $isAdmin ? 'admin.events.edit' : 'events.edit';

        return view($viewName, compact('event'));
    }

   // ======================
// Update event (khusus admin)
// ======================
public function update(Request $request, Event $event)
{
    $validated = $request->validate([
        'title'       => 'required|string|max:255',
        'description' => 'required|string',
        'date'        => 'required|date',
        'location'    => 'required|string|max:255',
        'image'       => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    // Jika ada gambar baru diupload
    if ($request->hasFile('image')) {
        // Simpan file ke storage/app/public/events
        $validated['image'] = $request->file('image')->store('events', 'public');
    }

    // Update data event
    $event->update($validated);

    return redirect()
        ->route('events.index') // langsung kembali ke daftar event
        ->with('success', 'Event berhasil diperbarui!');
}


    // ======================
    // Hapus event (khusus admin)
    // ======================
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event berhasil dihapus!');
    }

    // ======================
    // Form registrasi peserta
    // ======================
    public function registerForm(Event $event)
    {
        return view('events.register', compact('event'));
    }

    // ======================
    // Simpan registrasi peserta
    // ======================
    public function register(Request $request, Event $event)
    {
        $request->validate([
            'nama'  => 'required|string|max:255',
            'email' => 'required|email',
            'no_hp' => 'required|string|max:20',
        ]);

        // Simpan peserta (pastikan sudah ada relasi participants di model Event)
        $event->participants()->create([
            'nama'  => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
        ]);

        return redirect()->route('events.index')->with('success', 'Pendaftaran berhasil untuk event: ' . $event->title);
    }
}
