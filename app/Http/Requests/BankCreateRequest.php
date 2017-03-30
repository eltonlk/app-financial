<?php

namespace AppFinancial\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'logo' => 'required|image',
        ];
    }
}
