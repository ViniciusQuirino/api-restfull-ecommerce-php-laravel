<?php
namespace App\Http\Requests\Seller;
use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
           "name" => ["required", "max:100"],
           "value" => ["required", "numeric"],
           "amount" => ["required", "numeric"],
           "stock" => ["required", "numeric"],
           "category" => ["required", "max:100"],
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "O campo name é obrigatório.",
            "name.max" => "O campo name não pode ter mais de 100 caracteres.",
            "value.required" => "O campo value é obrigatório.",
            "value.numeric" => "O campo value deve ser numérico.",
            "amount.required" => "O campo amount é obrigatório.",
            "amount.numeric" => "O campo amount deve ser numérico.",
            "stock.required" => "O campo stock é obrigatório.",
            "stock.numeric" => "O campo stock deve ser numérico.",
            "category.required" => "O campo category é obrigatório.",
            "category.max" => "O campo category não pode ter mais de 100 caracteres."
        ];
    }
}
