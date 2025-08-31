<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostGovernmentShippingPriceRequest extends FormRequest
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
            'government_id'      => ['required' , 'exists:governments,id' , 'min:1'] ,
            'new_shipping_price' => ['required' ,  'numeric', 'min:0' , 'max:9999.99']
        ];
    }
}
