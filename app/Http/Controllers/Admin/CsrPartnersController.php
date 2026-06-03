<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CsrPartner;
use Illuminate\Http\Request;

class CsrPartnersController extends Controller
{
    public function index()
    {
        $partners = CsrPartner::orderBy('sort_order')
            ->latest()
            ->get();

        return view('admin.csr-partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.csr-partners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'approval_status' => 'required|in:approved,pending',
            'sort_order' => 'nullable|integer',
            'partner_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $data['status'] = $request->has('status') ? 1 : 0;

        $partner = CsrPartner::create($data);

        if ($request->hasFile('partner_logo')) {
            $partner->addMediaFromRequest('partner_logo')
                ->toMediaCollection('partner_logo');
        }

        return redirect()
            ->route('admin.csr-partners.index')
            ->with('message', 'CSR partner created successfully.');
    }

    public function edit(CsrPartner $csrPartner)
    {
        return view('admin.csr-partners.edit', compact('csrPartner'));
    }

    public function update(Request $request, CsrPartner $csrPartner)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'approval_status' => 'required|in:approved,pending',
            'sort_order' => 'nullable|integer',
            'partner_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $data['status'] = $request->has('status') ? 1 : 0;

        $csrPartner->update($data);

        if ($request->hasFile('partner_logo')) {
            $csrPartner->clearMediaCollection('partner_logo');

            $csrPartner->addMediaFromRequest('partner_logo')
                ->toMediaCollection('partner_logo');
        }

        return redirect()
            ->route('admin.csr-partners.index')
            ->with('message', 'CSR partner updated successfully.');
    }

    public function destroy(CsrPartner $csrPartner)
    {
        $csrPartner->delete();

        return redirect()
            ->route('admin.csr-partners.index')
            ->with('message', 'CSR partner deleted successfully.');
    }

    public function removeLogo(CsrPartner $csrPartner)
    {
        $csrPartner->clearMediaCollection('partner_logo');

        return redirect()
            ->back()
            ->with('message', 'CSR partner logo removed successfully.');
    }

    public function massDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:csr_partners,id',
        ]);

        CsrPartner::whereIn('id', $request->ids)->delete();

        return response(null, 204);
    }
}