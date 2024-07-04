<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {

        $leads = Lead::query()->get();
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
