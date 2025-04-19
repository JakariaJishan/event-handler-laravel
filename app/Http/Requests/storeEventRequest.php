<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeEventRequest extends FormRequest
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
            'description' => 'nullable|string|max:1000',
            'location' => 'required|string|max:255',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'user_id' => 'required|exists:users,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The event name is required.',
            'description.string' => 'The description must be a string.',
            'location.required' => 'The event location is required.',
            'user_id.required' => 'The user ID is required.',
            'user_id.exists' => 'The selected user ID does not exist.',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'event name',
            'description' => 'event description',
            'location' => 'event location',
            'user_id' => 'user ID',
        ];
    }
}
