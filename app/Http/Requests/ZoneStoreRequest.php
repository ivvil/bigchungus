<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZoneStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:app.zones,id'],
            'description' => ['required', 'string', 'max:512'],
            'valves' => ['array'],
            'valves.*' => ['exists:app.valves,valve_id']
        ];
    }
}
