<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index(Request $request)
    {
        $orderBy = $request->input('orderBy', 'created_at');
        $orderSort = $request->input('orderSort', 'asc');

        if (!in_array($orderSort, ['asc', 'desc'])) {
            $orderSort = 'asc';  
        }

        $leads = Lead::query()
            ->orderBy($orderBy, $orderSort)
            ->get();
        return view('admin.leads.index', compact('leads'));
    }

    public function store(LeadRequest $request)
    {
        Lead::create($request->validated());

        return redirect()->route('admin.leads.index')->with('success', 'Lead created successfully');
    }

    public function update(LeadRequest $request, Lead $lead)
    {
        $lead->update($request->validated());
        return redirect()->route('admin.leads.index')->with('success', 'Lead updated successfully');
    }

    public function destroy(Lead $lead)
    {

        $lead->delete();

        return redirect()->route('admin.leads.index')->with('success', 'Lead deleted successfully');
    }
}
