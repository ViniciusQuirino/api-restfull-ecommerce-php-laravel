<?php
namespace App\Http\Requests\Administrator;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AdministratorUpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type' => ['nullable', Rule::in(['vendedor', 'cliente'])],
        ];
    }

    public function messages(): array
    {
        return [
            'type.required' => 'O tipo de usuário é obrigatório',
            'type.in' => 'O campo type deve ser "vendedor" ou "cliente".',
        ];
    }
}
