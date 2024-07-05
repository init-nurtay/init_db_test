<?php

namespace App\Http\Controllers;

use App\Http\Requests\Lead as LeadRequest;
use App\Models\Lead;
use Illuminate\Support\Facades\DB;

class LeadController extends Controller
{
    public function index(LeadRequest\LeadSortRequest $request) {
        $leads = Lead::query()
                ->where('name','like','%'.$request->search.'%')
                ->orderBy('name',$request->orderSort?? 'asc')
                ->paginate(10);
        return view('admin.leads.index',compact('leads'));
    }

    public function store(LeadRequest\LeadRequest $request) {
        Lead::create($request->validated());

        return redirect()->route('admin.leads.index')->with('success','Lead created successfully');
    }

    public function update(LeadRequest\LeadRequest $request, Lead $lead) {
        $lead->update($request->validated());
        return redirect()->route('admin.leads.index')->with('success','Lead updated successfully');
    }

    public function destroy(Lead $lead) {

        $lead->delete();

        return redirect()->route('admin.leads.index')->with('success','Lead deleted successfully');
    }
}