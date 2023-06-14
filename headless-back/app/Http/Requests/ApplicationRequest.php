<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
            'position_id' => 'required|exists:job_positions,position_id',
            'name' => 'required|max:48|alpha',
            'last_name' => 'required|max:48|alpha',
            'email' => 'required|email',
            'cv' => 'required|mimes:pdf,docx',
            'privacy_consent' => 'required|boolean',
        ];
    }
}
