<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FounderLeader;
use Illuminate\Http\Request;
use Gate;

class FounderLeadersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('founder_leader_access'), 403);

        $founderLeaders = FounderLeader::orderBy('sort_order', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.founderLeaders.index', compact('founderLeaders'));
    }

    public function create()
    {
        abort_if(Gate::denies('founder_leader_create'), 403);

        return view('admin.founderLeaders.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('founder_leader_create'), 403);

        $request->validate([
            'role_badge' => 'nullable|string|max:255',
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'focus_points' => 'nullable|array',
            'focus_points.*' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'leader_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'is_featured' => 'nullable',
            'status' => 'nullable',
        ]);

        $founderLeader = FounderLeader::create([
            'role_badge' => $request->role_badge,
            'name' => $request->name,
            'description' => $request->description,
            'focus_points' => array_values(array_filter($request->focus_points ?? [])),
            'sort_order' => $request->sort_order ?? 0,
            'is_featured' => $request->has('is_featured') ? 1 : 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('leader_image')) {
            $founderLeader
                ->addMediaFromRequest('leader_image')
                ->toMediaCollection('leader_image');
        }

        return redirect()->route('admin.founder-leaders.index')
            ->with('message', 'Founder leader created successfully.');
    }

    public function show(FounderLeader $founderLeader)
    {
        abort_if(Gate::denies('founder_leader_show'), 403);

        return view('admin.founderLeaders.show', compact('founderLeader'));
    }

    public function edit(FounderLeader $founderLeader)
    {
        abort_if(Gate::denies('founder_leader_edit'), 403);

        return view('admin.founderLeaders.edit', compact('founderLeader'));
    }

    public function update(Request $request, FounderLeader $founderLeader)
    {
        abort_if(Gate::denies('founder_leader_edit'), 403);

        $request->validate([
            'role_badge' => 'nullable|string|max:255',
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'focus_points' => 'nullable|array',
            'focus_points.*' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'leader_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'is_featured' => 'nullable',
            'status' => 'nullable',
        ]);

        $founderLeader->update([
            'role_badge' => $request->role_badge,
            'name' => $request->name,
            'description' => $request->description,
            'focus_points' => array_values(array_filter($request->focus_points ?? [])),
            'sort_order' => $request->sort_order ?? 0,
            'is_featured' => $request->has('is_featured') ? 1 : 0,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('leader_image')) {
            $founderLeader->clearMediaCollection('leader_image');

            $founderLeader
                ->addMediaFromRequest('leader_image')
                ->toMediaCollection('leader_image');
        }

        return redirect()->route('admin.founder-leaders.index')
            ->with('message', 'Founder leader updated successfully.');
    }

    public function destroy(FounderLeader $founderLeader)
    {
        abort_if(Gate::denies('founder_leader_delete'), 403);

        $founderLeader->delete();

        return redirect()->route('admin.founder-leaders.index')
            ->with('message', 'Founder leader deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('founder_leader_delete'), 403);

        FounderLeader::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }

    public function removeImage(FounderLeader $founderLeader)
    {
        abort_if(Gate::denies('founder_leader_edit'), 403);

        $founderLeader->clearMediaCollection('leader_image');

        return redirect()->route('admin.founder-leaders.edit', $founderLeader->id)
            ->with('message', 'Image removed successfully.');
    }
}