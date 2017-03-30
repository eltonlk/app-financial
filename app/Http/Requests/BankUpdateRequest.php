<?php

namespace AppFinancial\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'logo' => 'image',
        ];
    }
}
