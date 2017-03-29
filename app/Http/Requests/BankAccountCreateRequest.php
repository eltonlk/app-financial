<?php

namespace AppFinancial\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankAccountCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'    => 'required|max:255',
            'agency'  => 'max:255',
            'account' => 'max:255',
            'default' => 'boolean',
            'bank_id' => 'required|exists:banks,id',
        ];
    }
}
