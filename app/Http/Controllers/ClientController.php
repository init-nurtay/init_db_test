<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $orderBy = $request->input('orderBy', 'created_at');
        $orderSort = $request->input('orderSort', 'asc');

        if (!in_array($orderSort, ['asc', 'desc'])) {
            $orderSort = 'asc';
        }

        $clinets = Client::query()
            ->with('address')
            ->orderBy($orderBy, $orderSort)
            ->get();

        return view('admin.clients.index', compact('clients'));
    }

    public function store(ClientRequest $request)
    {
        ClientService::store($request->validated());

        return redirect()->route('admin.clients.index')->with('success', 'Client created successfully');
    }

    public function update(ClientRequest $request, Client $client)
    {
        $clientService = new ClientService($client);
        $clientService->update($request->validated());

        return redirect()->route('admin.clients.index')->with('success', 'Client updated successfully');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('admin.clients.index')->with('success', 'Client deleted successfully');
    }
}
