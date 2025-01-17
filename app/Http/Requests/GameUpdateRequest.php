<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GameUpdateRequest extends FormRequest
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
        return
//            dd($this->request);
            [
            'name' => ['required', 'string', 'max:35'],
            'code' => [
                'required',
                'string',
                'max:8',
                Rule::unique('games')->ignore($this->code)
            ],
            'status' => ['required', 'boolean']
        ];
    }
}
