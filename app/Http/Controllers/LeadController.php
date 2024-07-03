<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index(){
        $leads = Lead::query()->get();
        return view('admin.leads.index',compact('leads'));
    }
}
