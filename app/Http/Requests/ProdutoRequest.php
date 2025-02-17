<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
        // Pegar o ID do usuário logado, atraves do route model binding
        // Ex: Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
        // O Laravel injecta o objeto User, com os dados do usuário logado
        // para a variável $userID
        $produtoID = $this -> route('user'); //$userID 
        return [
            'name' => 'required|max:255',
            'description' => 'required|max:500',
            'category' => 'required|max:100'
        ];
    }

    public function messages(): array {
        return [
            'name.required' => 'Campo nome obrigatório',
            'description.required' => 'Campo descrição obrigatório',
            'category.required' => 'Campo categoria obrigatório',
        ];
    }
}
