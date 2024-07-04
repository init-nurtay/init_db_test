<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;

class ClientController extends Controller
{
    public function index(){
        $clients = Client::query()->get();
        return view('admin.clients.index', compact('clients'));
    }

    public function store(ClientRequest $request) {
        Client::create($request->validated());

        return redirect()->route('admin.clients.index')->with('success', 'Client created successfully');
    }

    public function update(ClientRequest $request, Client $client) {
        $client->update($request->validated());
        return redirect()->route('admin.clients.index')->with('success', 'Client updated successfully');
    }

    public function destroy(Client $client) {
        $client->delete();

        return redirect()->route('admin.clients.index')->with('success', 'Client deleted successfully');
    }
}

