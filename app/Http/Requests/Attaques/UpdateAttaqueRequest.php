<?php
namespace App\Http\Requests\Attaques;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAttaqueRequest extends FormRequest
{
    public function authorize()
    {
        return true;  // Ensure proper authorization logic here
    }

    public function rules()
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
