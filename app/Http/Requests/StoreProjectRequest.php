<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'name' => 'required|max:255',
            'description' => 'nullable|max:5000',
            'technologies'=>'nullable|array|exists:technologies,id',
            'type_id' => 'nullable|exists:types,id',
            'creation_date' => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'This field is mandatory.',
            'name.max' => 'You have exceeded th maximum characters.',
            'description.max' => 'You have exceeded th maximum characters.',
            'technologies.required' => 'This field is mandatory.',
            'technologies.max' => 'You have exceeded th maximum characters.',
            'creation_date.required' => 'This field is mandatory',
            'creation_date' => 'Insert a valid date.',
        ];
    }
}