<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'assigned_by_id' => 'required|exists:admins,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'assigned_to_id' => 'required|exists:users,id',
        ];
    }

    public function attributes()
    {
        return [
            'assigned_by_id' => 'Admin',
            'title' => 'Task Title',
            'description' => 'Task Description',
            'assigned_to_id' => 'Assigned User',
        ];
    }
}
