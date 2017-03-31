<?php

namespace AppFinancial\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $client = \Auth::guard('api')->user()->client;

        return [
            'name'      => 'required|max:255',
            'parent_id' => Rule::exists('categories', 'id')
                ->where(function ($query) use ($client) {
                    $query->where('client_id', $client->id);
                })
        ];
    }
}
