<?php

namespace App\Http\Requests\admin\company;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::guard('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies,email',
            'website' => 'nullable|url',
            'phone' => 'required|string|min:10|max:10|unique:companies,phone',
            'address' => 'nullable|string|max:255',
            'industry' => 'nullable|string|max:255',
            'size' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'password' => 'required|string|min:6|max:20',
        ];
    }
}
