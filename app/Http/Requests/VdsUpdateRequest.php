<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VdsUpdateRequest extends FormRequest
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
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
            'ip' => [
                'required',
                'string',
                'ip',
                Rule::unique('vds')->ignore($this->ip)
            ],
            'port' => ['required', 'integer'],
            'location' => ['required', 'integer'],
            'cores' => ['required', 'integer'],
            'status' => ['required', 'boolean']
        ];
    }
}
