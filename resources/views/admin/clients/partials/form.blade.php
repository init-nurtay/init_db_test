<form action="{{ route('admin.clients.update', $client->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="organization_type" class="form-label">Organization Type</label>
        <input type="text" class="form-control" id="organization_type" name="organization_type" value="{{ old('organization_type', $client->organization_type ?? '') }}">
    </div>
    <div class="mb-3">
        <label for="identification_number" class="form-label">Identification Number</label>
        <input type="text" class="form-control" id="identification_number" name="identification_number" value="{{ old('identification_number', $client->identification_number ?? '') }}">
    </div>
    <div class="mb-3">
        <label for="organization_name" class="form-label">Organization Name</label>
        <input type="text" class="form-control" id="organization_name" name="organization_name" value="{{ old('organization_name', $client->organization_name ?? '') }}" required>
    </div>
    <div class="mb-3">
        <label for="chief_full_name" class="form-label">Chief Full Name</label>
        <input type="text" class="form-control" id="chief_full_name" name="chief_full_name" value="{{ old('chief_full_name', $client->chief_full_name ?? '') }}" required>
    </div>
    <div class="mb-3">
        <label for="agent_type" class="form-label">Agent Type</label>
        <input type="text" class="form-control" id="agent_type" name="agent_type" value="{{ old('agent_type', $client->agent_type ?? '') }}">
    </div>
    <div class="mb-3">
        <label for="bank_name" class="form-label">Bank Name</label>
        <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{ old('bank_name', $client->bank_name ?? '') }}">
    </div>
    <div class="mb-3">
        <label for="identification_code" class="form-label">Identification Code</label>
        <input type="text" class="form-control" id="identification_code" name="identification_code" value="{{ old('identification_code', $client->identification_code ?? '') }}">
    </div>
    <div class="mb-3">
        <label for="beneficiary_code" class="form-label">Beneficiary Code</label>
        <input type="text" class="form-control" id="beneficiary_code" name="beneficiary_code" value="{{ old('beneficiary_code', $client->beneficiary_code ?? '') }}">
    </div>
    <div class="mb-3">
        <label for="beneficiary_code" class="form-label">City</label>
        <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $client->address->city ?? '') }}">
    </div>
    <div class="mb-3">
        <label for="street" class="form-label">Street</label>
        <input type="text" class="form-control" id="street" name="street" value="{{ old('street', $client->address->street ?? '') }}">
    </div>
    <div class="mb-3">
        <label for="postal_code" class="form-label">Postal Code</label>
        <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ old('postal_code', $client->address->postal_code ?? '') }}">
    </div>
    <div class="mb-3">
        <label for="building" class="form-label">Building</label>
        <input type="text" class="form-control" id="building" name="building" value="{{ old('building', $client->address->building ?? '') }}">
    </div>
    <div class="mb-3">
        <label for="apartment" class="form-label">Apartment</label>
        <input type="text" class="form-control" id="apartment" name="apartment" value="{{ old('apartment', $client->address->apartment ?? '') }}">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>
