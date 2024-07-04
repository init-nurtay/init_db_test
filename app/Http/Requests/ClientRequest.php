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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'organization_type' => 'string|in:ТОО, ИП, Физ. лицо, АО, УО',
            'identification_number' => 'integer|size:12',
            'organization_name' => 'string',
            'chief_full_name' => 'string',
            'agent_type' => 'string',
            'bank_name' => 'string',
            'identification_code' => 'string',
            'beneficiary_code' => 'string',
            'city' => 'string',
            'address' => 'string',
            'postal_code' => 'string'
        ];
    }
}
