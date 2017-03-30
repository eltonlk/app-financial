<?php

namespace AppFinancial\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'description'     => 'required|max:255',
            'due_at'          => 'required|date',
            'amount'          => 'required|numeric',
            'paid'            => 'boolean',
            'bank_account_id' => 'required|exists:bank_accounts,id',
        ];
    }
}
