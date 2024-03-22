<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use ProtoneMedia\Splade\Facades\Toast;

class ProductInputRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'product_id' => ['required', 'integer', 'exists:App\Models\Product,id'],
            'value' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric', 'min:1'],
        ];
    }

    public function prepareForValidation(): array
    {
        $value = Str::replace('.', '', $this->value);
        $rules['value'] = Str::replace(',', '.', $value);
        return $rules;
    }

    public function failedValidation(Validator $validator)
    {
        parent::failedValidation($validator);
        Toast::title(title: 'Ops')
            ->message($validator->errors()->first())
            ->centerBottom()
            ->autoDismiss(afterSeconds: 20);
    }
}
