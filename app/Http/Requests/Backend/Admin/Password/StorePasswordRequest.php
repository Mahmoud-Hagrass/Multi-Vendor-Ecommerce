<?php

namespace App\Http\Requests\Backend\Admin\Password;

use Illuminate\Foundation\Http\FormRequest;

class StorePasswordRequest extends FormRequest
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
            'email' => ['required', 'email:filter' , 'exists:admins,email' , 'max:255'],
            'password' => ['required','confirmed'  , 'string' , 'min:8', 'max:20'] ,
            'password_confirmation' => ['required' , 'string' , 'min:8', 'max:20'] ,
        ];
    }
}
