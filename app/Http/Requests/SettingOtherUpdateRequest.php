<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingOtherUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            // 'decimal_digit_amount' => ['required', 'numeric'],
            // 'decimal_digit_percent' => ['required', 'numeric'],
            'tahun_periode_aktif' => ['required', 'numeric'],
        ];
    }
}
