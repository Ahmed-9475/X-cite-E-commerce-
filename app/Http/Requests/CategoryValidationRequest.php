<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryValidationRequest extends FormRequest
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
            'name'=>'required|min:5|max:50|unique:categories,name|string|regex:/^[A-Za-z0-9-أ-ي-pL\s\-]+$/u',
            'description'=>'required|min:10|max:1000|string|regex:/^[A-Za-z0-9-أ-ي-pL\s\-]+$/u',
            'image'=>'nullable|image|mimes:jpeg,jpg,png,gif',
            'status'=>'required|in:active,notActive',
            'parent_id '=>'nullable|',
        ];
    }
}
