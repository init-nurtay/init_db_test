<?php

namespace App\Http\Requests\Lead;

use Illuminate\Foundation\Http\FormRequest;

class LeadRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'required|string|max:255',
            'phone' => 'required|string|max:20|regex:/^\+?[^a-zA-Z]{1,}$/',//example +1234567890
            'comment' => 'required',
            'source' => 'required|string|max:255',
            'stage' => 'required|string|max:255'
        ];
    }
}
