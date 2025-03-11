<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValveStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'id' => ['required', 'string', 'max:255', 'unique:app.valves,valve_id'],
            'location' => ['required', 'string', 'max:255'],
            'zones' => ['array'],
            'zones.*' => ['exists:app.zones,id']
        ];
    }
}
