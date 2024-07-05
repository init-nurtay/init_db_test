<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'organization_type' => 'nullable|string',
            'identification_number' => 'nullable|integer|size:12',
            'organization_name' => 'nullable|string',
            'chief_full_name' => 'nullable|string',
            'agent_type' => 'nullable|string',
            'bank_name' => 'nullable|string',
            'identification_code' => 'nullable|string',
            'beneficiary_code' => 'nullable|string',
            'city' => 'nullable|string',
            'address' => 'nullable|string',
            'postal_code' => 'nullable|string'
        ];
    }
}
