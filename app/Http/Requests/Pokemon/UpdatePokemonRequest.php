<?php

namespace App\Http\Requests\Pokemon;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePokemonRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:255',
            'type_id' => 'required|integer|exists:types,id',
            'type_id2' => 'nullable|integer|exists:types,id',
            'life' => 'required|numeric',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
        ];
        if ($this->hasFile('image')) {
            $rules['image'] = 'image|file|max:2048';
        } else {
            $rules['image'] = 'nullable|string';
        }

        return $rules;
    }
}
