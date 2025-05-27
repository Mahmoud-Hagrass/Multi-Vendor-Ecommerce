<?php

namespace App\Http\Requests\Backend\Admin\Password;

use Illuminate\Foundation\Http\FormRequest;

class PasswordResetRequest extends FormRequest
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
            'otp' => ['required' , 'numeric' , 'min:6' ,  'max_digits:6'] ,
            'email' => ['email:filter' , 'string' , 'exists:admins,email' , 'max:255'] ,
        ];
    }
}
