<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadStoreRequest;
use App\Models\Leads;
use Illuminate\Http\Request;

class LeadsController extends Controller
{
    public function store(LeadStoreRequest $request)
    {
        Leads::create($request->validated());
        return redirect()->route('home');
    }
}
