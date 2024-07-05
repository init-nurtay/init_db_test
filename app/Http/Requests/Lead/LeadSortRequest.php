<?php

namespace App\Http\Requests\Lead;

use Illuminate\Foundation\Http\FormRequest;

class LeadSortRequest extends FormRequest
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
            'orderBy'=>'nullable|string|in:id,name,email,company,phone,comment,source,stage,created_at',
            'orderSort'=>'nullable|string|in:asc,desc',
            'search'=>'nullable|string|max:255',

            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'company' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20|regex:/^\+?[^a-zA-Z]{1,}$/',//example +1234567890
            'comment' => 'nullable|string',
            'stage'=>'nullable|string|max:255',
            'source'=>'nullable|string|max:255',

//            'created_at'=>'nullable|date_format:Y-m-d',

        ];
    }
}
