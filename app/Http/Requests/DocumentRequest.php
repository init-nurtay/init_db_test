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
            'type_document' => 'required|string|in:contract,conract application,additional agreement,invoice,certificate of completion,act of reconciliation,commercial offer',
            'header' => 'required|string',
            'content' => 'required|string',
            'project_id' => 'required|integer',
            'identification_number' => 'string',
            'client_id' => 'integer',
            'agreement_number' => 'string',
            'agreement_date_at' => 'timestamp',
        ];
    }
}
