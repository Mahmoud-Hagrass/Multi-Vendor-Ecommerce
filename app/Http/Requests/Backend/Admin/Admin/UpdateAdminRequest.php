<?php

namespace App\Http\Requests\Backend\Admin\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAdminRequest extends FormRequest
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
        $adminId = $this->route('admin') ;
        return [
            'name'                   => ['required' , 'string' , 'min:3' , 'max:50'] ,
            'email'                  => ['required' , 'string' , 'email:filter' , 'lowercase' , 'min:10' , 'max:100' , 'unique:admins,email,' . $adminId] ,
            'password'               => ['required' , 'min:8' , 'max:80','confirmed'] ,
            'password_confirmation'  => ['required' , 'string' , 'max:80'] ,
            'role_id'                => ['required' , 'exists:roles,id'] ,
            'status'                 => ['required' , Rule::in([__('dashboard.active') , __('dashboard.in_active')])]
        ];
    }
}
