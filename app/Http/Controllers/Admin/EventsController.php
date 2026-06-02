<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Gate;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('event_access'), 403);

        $events = Event::orderBy('sort_order', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        abort_if(Gate::denies('event_create'), 403);

        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('event_create'), 403);

        $request->validate([
            'event_type' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'start_time' => 'nullable|string|max:255',
            'end_time' => 'nullable|string|max:255',
            'status_badge' => 'nullable|string|max:255',
            'progress' => 'nullable|integer|min:0|max:100',
            'event_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $event = Event::create([
            'event_type' => $request->event_type,
            'category' => $request->category,
            'title' => $request->title,
            'short_description' => $request->short_description,
            'location' => $request->location,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status_badge' => $request->status_badge,
            'progress' => $request->progress ?? 0,

            'info_one_title' => $request->info_one_title,
            'info_one_text' => $request->info_one_text,
            'info_two_title' => $request->info_two_title,
            'info_two_text' => $request->info_two_text,

            'button_one_text' => $request->button_one_text,
            'button_one_link' => $request->button_one_link,
            'button_two_text' => $request->button_two_text,
            'button_two_link' => $request->button_two_link,

            'people_reached' => $request->people_reached ?? 0,
            'families_supported' => $request->families_supported ?? 0,
            'youth_guided' => $request->youth_guided ?? 0,

            'sort_order' => $request->sort_order ?? 0,
            'is_featured' => $request->has('is_featured') ? 1 : 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('event_image')) {
            $event->addMediaFromRequest('event_image')->toMediaCollection('event_image');
        }

        return redirect()->route('admin.events.index')
            ->with('message', 'Event created successfully.');
    }

    public function show(Event $event)
    {
        abort_if(Gate::denies('event_show'), 403);

        return view('admin.events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        abort_if(Gate::denies('event_edit'), 403);

        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        abort_if(Gate::denies('event_edit'), 403);

        $request->validate([
            'event_type' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'start_time' => 'nullable|string|max:255',
            'end_time' => 'nullable|string|max:255',
            'status_badge' => 'nullable|string|max:255',
            'progress' => 'nullable|integer|min:0|max:100',
            'event_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $event->update([
            'event_type' => $request->event_type,
            'category' => $request->category,
            'title' => $request->title,
            'short_description' => $request->short_description,
            'location' => $request->location,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status_badge' => $request->status_badge,
            'progress' => $request->progress ?? 0,

            'info_one_title' => $request->info_one_title,
            'info_one_text' => $request->info_one_text,
            'info_two_title' => $request->info_two_title,
            'info_two_text' => $request->info_two_text,

            'button_one_text' => $request->button_one_text,
            'button_one_link' => $request->button_one_link,
            'button_two_text' => $request->button_two_text,
            'button_two_link' => $request->button_two_link,

            'people_reached' => $request->people_reached ?? 0,
            'families_supported' => $request->families_supported ?? 0,
            'youth_guided' => $request->youth_guided ?? 0,

            'sort_order' => $request->sort_order ?? 0,
            'is_featured' => $request->has('is_featured') ? 1 : 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('event_image')) {
            $event->clearMediaCollection('event_image');
            $event->addMediaFromRequest('event_image')->toMediaCollection('event_image');
        }

        return redirect()->route('admin.events.index')
            ->with('message', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        abort_if(Gate::denies('event_delete'), 403);

        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('message', 'Event deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('event_delete'), 403);

        Event::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }

    public function removeImage(Event $event)
    {
        abort_if(Gate::denies('event_edit'), 403);

        $event->clearMediaCollection('event_image');

        return redirect()->route('admin.events.edit', $event->id)
            ->with('message', 'Image removed successfully.');
    }
}