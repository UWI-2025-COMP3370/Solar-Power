<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitRequest extends FormRequest
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
            'technician_name' => 'required|regex:~^[a-zA-Z0-9 ]+$~',
            'customer_name' => 'required|regex:~^[a-zA-Z0-9 ]+$~',
            'customer_email' => 'required|email|max:255',
            'roof_size' => 'required|numeric|min:0',
            'roof_type' => 'required|in:gable,hip,flat,other',
            'monthly_consumption_kwh' => 'required|numeric|min:0',
            'shaded' => 'required|in:yes,no,partially',
            'notes' => 'required|string|max:1000',
        ];
    }
}
