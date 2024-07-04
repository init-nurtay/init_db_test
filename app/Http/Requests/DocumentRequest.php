<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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
            'document_type' => 'required|string|in:contract,conract application,additional agreement,invoice,certificate of completion,act of reconciliation,commercial offer',
            'header' => 'required|string',
            'content' => 'required|string',

            'account_number' => 'string',
            'account_created_at' => 'datetime',

            'project_name' => 'required|string',
            'identification_number' => 'number|size:12',
            'company_name' => 'string',
            'company_type' => 'string',
            'address' => 'string',
            'bank_name' => 'string',

            'contract_number' => 'string',
            'contract_date_at' => 'timestamp',

            'day' => 'integer|between:1,31',
            'email' => 'email:rfc'
        ];
    }
}
