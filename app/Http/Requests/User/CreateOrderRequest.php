<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status' => 'required|string|max:30',
            'name' => 'required|string|max:100',
            'value' => 'required|numeric|between:0,999999.99',
            'amount' => 'required|integer',
            'stock' => 'required|integer',
            'category' => 'required|string|max:40',
            'seller_id' => 'required|uuid',
            'user_id' => 'required|uuid',
            'address_id' => 'required|uuid',
        ];
    }

    public function messages(): array
    {
        return [
            'status.required' => 'O campo status é obrigatório.',
            'status.string' => 'O campo status deve ser uma string.',
            'name.required' => 'O campo name é obrigatório.',
            'name.string' => 'O campo nome deve ser uma string.',
            'value.required' => 'O campo value é obrigatório.',
            'value.numeric' => 'O campo value deve ser um numero',
            'value.between' => '"O campo value deve estar entre 0 e 999.999,99.',
            'amount.required' => 'O campo amount é obrigatório.',
            'amount.integer' => 'O campo amount deve ser um número inteiro.',
            'stock.required' => 'O campo stock é obrigatório.',
            'stock.integer' => 'O campo estoque deve ser um número inteiro.',
            'category.required' => 'O campo category é obrigatório.',
            'category.string' => 'O campo categoria deve ser uma string.',
            'seller_id.required' => 'O campo seller_id é obrigatório.',
            'seller_id.uuid' => 'O seller_id deve ser um UUID válido.',
            'user_id.required' => 'O campo user_id é obrigatório.',
            'user_id.uuid' => 'O user_id deve ser um UUID válido.',
            'address_id.required' => 'O campo address_id é obrigatório.',
            'address_id.uuid' => 'O address_id deve ser um UUID válido.',
        ];
    }
}
