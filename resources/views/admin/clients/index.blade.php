@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Clients</h1>
        <div class="mb-3">
            <form action="{{ route('admin.clients.index') }}" method="GET">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Clients" class="form-control">
                <button type="submit" class="btn btn-primary mt-2">Search</button>
            </form>
        </div>

        <div class="mb-3">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createClientModal">Add New Client</button>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Organization Type</th>
                <th>Identification Number</th>
                <th>Organization Name</th>
                <th>Chief Full Name</th>
                <th>Agent Type</th>
                <th>Bank Name</th>
                <th>Identification Code</th>
                <th>Beneficiary Code</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->organization_type }}</td>
                    <td>{{ $client->identification_number }}</td>
                    <td>{{ $client->organization_name }}</td>
                    <td>{{ $client->chief_full_name }}</td>
                    <td>{{ $client->agent_type }}</td>
                    <td>{{ $client->bank_name }}</td>
                    <td>{{ $client->identification_code }}</td>
                    <td>{{ $client->beneficiary_code }}</td>
                    <td>{{ $client->address->city . ', ' . $client->address->street . ', ' . $client->address->street . ', ' . $client->address->building}}</td>}}</td>
                    <td>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editClientModal{{ $client->id }}">Edit</button>
                        <form action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>

                <!-- Edit Client Modal -->
                <div class="modal fade" id="editClientModal{{ $client->id }}" tabindex="-1" aria-labelledby="editClientModalLabel{{ $client->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editClientModalLabel{{ $client->id }}">Edit Client</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @include('admin.clients.partials.form', ['client' => $client])
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </tbody>
        </table>

        {{ $clients->links() }}

        <!-- Create Client Modal -->
        <div class="modal fade" id="createClientModal" tabindex="-1" aria-labelledby="createClientModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createClientModalLabel">Add New Client</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.clients.store') }}" method="POST">
                            @csrf
                            @include('admin.clients.partials.form', ['client' => null])
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Add Client</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
