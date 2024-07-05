{{-- resources/views/admin/clients/index.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1>Clients</h1>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Button to open the modal to create a new client -->
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createClientModal">
                Create New Client
            </button>

            <form method="GET" action="{{ route('admin.clients.index') }}" class="form-inline mb-3">
                <div class="form-group">
                    <label for="orderBy" class="mr-2">Order By</label>
                    <select name="orderBy" id="orderBy" class="form-control mr-2">
                        <option value="created_at"{{ request('orderBy') == 'created_at' ? ' selected' : '' }}>Created At</option>
                        <option value="name"{{ request('orderBy') == 'name' ? ' selected' : '' }}>Name</option>
                        <!-- Add other fields as needed -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="orderSort" class="mr-2">Sort</label>
                    <select name="orderSort" id="orderSort" class="form-control mr-2">
                        <option value="asc"{{ request('orderSort') == 'asc' ? ' selected' : '' }}>Ascending</option>
                        <option value="desc"{{ request('orderSort') == 'desc' ? ' selected' : '' }}>Descending</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="query" class="mr-2">Name</label>
                    <input type="text" name="name" id="query" class="form-control mr-2" value="{{ request('name') }}">
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td>{{ $client->id }}</td>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->address->address }}</td>
                            <td>
                                <!-- Edit button triggers the edit modal -->
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editClientModal-{{ $client->id }}">
                                    Edit
                                </button>

                                <!-- Inline form for deleting the client -->
                                <form action="{{ route('admin.clients.destroy', $client) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit Client Modal -->
                        <div class="modal fade" id="editClientModal-{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="editClientModalLabel-{{ $client->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editClientModalLabel-{{ $client->id }}">Edit Client</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.clients.update', $client) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ $client->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" class="form-control" value="{{ $client->email }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" name="address" class="form-control" value="{{ $client->address->address }}">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $clients->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Create Client Modal -->
<div class="modal fade" id="createClientModal" tabindex="-1" role="dialog" aria-labelledby="createClientModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createClientModalLabel">Create New Client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.clients.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

