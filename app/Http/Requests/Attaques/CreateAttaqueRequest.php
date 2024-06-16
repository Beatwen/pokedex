<?php

namespace App\Http\Requests\Attaques;

use Illuminate\Foundation\Http\FormRequest;

class CreateAttaqueRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'power' => 'required|numeric',
            'category' => 'required|string|max:255',
            'accuracy' => 'required|numeric',
            'type_id' => 'required|integer|exists:types,id',
            'pp' => 'required|numeric',
            'description' => 'nullable|string',
            'probability' => 'required|numeric',
        ];
    }
}
