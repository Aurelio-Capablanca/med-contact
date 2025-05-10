<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nameUsers' => 'required|string|max:50',
            'lastnameUsers' => 'required|string|max:50',
            'emailUser' => [
                'required',
                'email',
                Rule::unique('users', 'emailUser')->ignore($this->route('id'), 'user_id')
            ],
            'passUser' => 'required|string|min:8',
            'typeUser' => 'required|integer'
        ];
    }
}
