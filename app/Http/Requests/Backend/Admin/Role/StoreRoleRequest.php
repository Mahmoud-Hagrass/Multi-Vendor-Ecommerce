<?php

namespace App\Http\Requests\Backend\Admin\Role;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
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
        $role_id = $this->route('role') ;
        return [
            'name.en'        => ['required', 'string', 'min:3', 'max:10', 'unique_translation:roles,name,'.$role_id],
            'name.ar'        => ['required', 'string', 'min:3', 'max:10', 'unique_translation:roles,name,'.$role_id],
            'permissions'    => ['required', 'array', 'min:1', 'max:80'],
        ];
    }
}
