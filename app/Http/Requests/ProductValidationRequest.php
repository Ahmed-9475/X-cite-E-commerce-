<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductValidationRequest extends FormRequest
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
            'name'=>'required|min:5|max:255|unique:categories,name|string|regex:/^[A-Za-z0-9-أ-ي-pL\s\-]+$/u',
            "categroyParent"=>'required',
            "store"=>'required',
            'description'=>'required|min:10|max:1000|string|regex:/^[A-Za-z0-9-أ-ي-pL\s\-]+$/u',
            "price"=>'required|numeric|regex:/^\d+(\.\d{1,2})?$/|',
            "compare_price"=>'required|regex:/^\d+(\.\d{1,2})?$/|numeric|',
            'image'=>'image|mimes:jpeg,jpg,png,gif',
            'status'=>'required|in:active,notActive',
            'product_id' => 'required|exists:products,id',
            'tag_ids' => 'required|array',
            // 'tag_ids.*' => 'required|exists:tags,id|unique:product_tag,tag_id,NULL,id,product_id,' . $this->product_id,
        ];
    }
}
