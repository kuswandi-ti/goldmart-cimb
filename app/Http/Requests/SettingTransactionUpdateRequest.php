<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingTransactionUpdateRequest extends FormRequest
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
            'sale_prefix' => ['required', 'string', 'max:255'],
            'sale_last_number' => ['required', 'numeric'],
            'loan_regular_prefix' => ['required', 'string', 'max:255'],
            'loan_regular_last_number' => ['required', 'numeric'],
            'loan_funding_prefix' => ['required', 'string', 'max:255'],
            'loan_funding_last_number' => ['required', 'numeric'],
            'loan_social_prefix' => ['required', 'string', 'max:255'],
            'loan_social_last_number' => ['required', 'numeric'],
            'saving_deposit_prefix' => ['required', 'string', 'max:255'],
            'saving_deposit_last_number' => ['required', 'numeric'],
            'saving_withdraw_prefix' => ['required', 'string', 'max:255'],
            'saving_withdraw_last_number' => ['required', 'numeric'],
        ];
    }
}
