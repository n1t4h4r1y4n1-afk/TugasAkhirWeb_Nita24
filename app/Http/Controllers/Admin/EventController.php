<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    /**
     * Menampilkan semua event
     */
    public function index()
    {
        $events = Event::latest()->get();

        return view(
            'admin.events.index',
            compact('events')
        );
    }

    /**
     * Form tambah event
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Menyimpan event baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',

            'category' => 'required|string|max:255',

            'location' => 'required|string|max:255',

            'event_date' => 'required|date',

            'event_time' => 'required|date_format:H:i',

            'description' => 'required|string',

            'banner' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        /*
        |--------------------------------------------------------------------------
        | BUAT SLUG OTOMATIS
        |--------------------------------------------------------------------------
        */

        $slug = Str::slug($validated['title']);

        $originalSlug = $slug;
        $counter = 1;

        while (Event::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $validated['slug'] = $slug;

        /*
        |--------------------------------------------------------------------------
        | UPLOAD BANNER
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('banner')) {
            $validated['banner'] = $request
                ->file('banner')
                ->store('events', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | STATUS EVENT
        |--------------------------------------------------------------------------
        */

        $validated['status'] = true;

        /*
        |--------------------------------------------------------------------------
        | SIMPAN EVENT
        |--------------------------------------------------------------------------
        */

        Event::create($validated);

        return redirect()
            ->route('admin.events.index')
            ->with(
                'success',
                'Event berhasil ditambahkan!'
            );
    }

    /**
     * Menampilkan detail event
     */
    public function show(Event $event)
    {
        return view(
            'admin.events.show',
            compact('event')
        );
    }

    /**
     * Form edit event
     */
    public function edit(Event $event)
    {
        return view(
            'admin.events.edit',
            compact('event')
        );
    }

    /**
     * Update event
     */
    public function update(
        Request $request,
        Event $event
    ) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',

            'category' => 'required|string|max:255',

            'location' => 'required|string|max:255',

            'event_date' => 'required|date',

            'event_time' => 'required|date_format:H:i',

            'description' => 'nullable|string',

            'banner' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        /*
        |--------------------------------------------------------------------------
        | BUAT SLUG BARU
        |--------------------------------------------------------------------------
        */

        $slug = Str::slug($validated['title']);

        $originalSlug = $slug;
        $counter = 1;

        while (
            Event::where('slug', $slug)
                ->where('id', '!=', $event->id)
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $validated['slug'] = $slug;

        /*
        |--------------------------------------------------------------------------
        | UPLOAD BANNER BARU
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('banner')) {
            $validated['banner'] = $request
                ->file('banner')
                ->store('events', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | STATUS EVENT
        |--------------------------------------------------------------------------
        */

        $validated['status'] = $request->has('status');

        /*
        |--------------------------------------------------------------------------
        | UPDATE EVENT
        |--------------------------------------------------------------------------
        */

        $event->update($validated);

        return redirect()
            ->route('admin.events.index')
            ->with(
                'success',
                'Event berhasil diperbarui!'
            );
    }

    /**
     * Hapus event
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()
            ->route('admin.events.index')
            ->with(
                'success',
                'Event berhasil dihapus!'
            );
    }
}