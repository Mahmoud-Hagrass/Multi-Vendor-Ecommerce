<?php

namespace App\Http\Requests;

use App\Rules\ValidCategoryParent;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        $category_id = $this->route('category') ;
        return [
            'category_name.en'       => ['required' , 'string' , 'min:3' , 'max:255' , 'unique_translation:categories,name,' . $category_id ],
            'category_name.ar'       => ['required' , 'string' , 'min:3' ,'max:255' , 'unique_translation:categories,name,' . $category_id],
            'parent_id'              => ['nullable' , 'integer' , 'min:1' , 'exists:categories,id' , new ValidCategoryParent($category_id)] ,
            'status'                 => ['required' , 'string' , Rule::in([__('dashboard.active') , __('dashboard.in_active')])] ,
        ];
    }
}
