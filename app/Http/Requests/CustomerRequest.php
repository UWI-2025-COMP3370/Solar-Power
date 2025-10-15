<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name' => 'required|regex:~^[a-zA-Z ]+$~',
            'address' => 'required|regex:~^[ a-zA-Z0-9()-:.,/&#]+$~',
            'mobile' => ['required|regex:~^\+?[0-9 -()]+$~', 'min:7', 'max:20']
            'telephone' => ['required|regex:~^\+?[0-9 -()]+$~', 'min:7', 'max:20']
            'email' => 'required|email',
        ];
    }
}
