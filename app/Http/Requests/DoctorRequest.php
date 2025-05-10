<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use  Illuminate\Validation\Rule;

class DoctorRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'nameDoctor' => 'required|string|max:35',
            'lastnameDoctor' => 'required|string|max:35',
            'emailDoctor' => ['required',
                'string',
                'email',
                'unique:mysql_logic.Doctors,emailDoctor'
            ],
            'phoneDoctor' => 'required|string|min:8',
            'descriptionDoctor' => 'required|string|max:1500'
        ];
    }

}
