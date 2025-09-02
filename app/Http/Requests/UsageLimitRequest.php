<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsageLimitRequest extends FormRequest
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
            'user_id'  => 'required|string|max:255',
            'period_type'  => 'required|string|max:255',
            'max_consumption'  => 'required|string|max:255',
        ];
    }
}
