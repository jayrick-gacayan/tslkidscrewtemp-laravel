<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|max:150",
            "email" => [
                "required",
                "email",
                "max:120",
                Rule::unique("admins")
            ],
            "password" => "required|max:200",
            "is_super_admin" => "sometimes|boolean",
            "is_active" => "sometimes|boolean",
        ];
    }
}
