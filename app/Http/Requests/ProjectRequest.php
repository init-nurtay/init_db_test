<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'string',
            'type' => 'string',
            'client_id' => 'number',

            'contract_number' => '',
            'contract_created_at' => '',

            'server_domain' => 'url',
            'domain_expires_at' => 'datetime',
            'server' => '',

            'status' => 'string|in:finished,static,seo,ours,archive,deleted',
            'domain' => 'url',

            'icon' => '',
            'git_url' => 'url',
            'started_at' => 'datetime'
        ];
    }
}
