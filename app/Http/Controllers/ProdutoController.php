<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Consulta para listar produto
        $produtos = Produto::orderBy('id')->get();
        //Carregar uma view
        return view('produtos.index', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdutoRequest $request)
    {
        $request -> validated(); //Valida os dados do formulário

        //Cadastro no banco de dados
        Produto::create([
            'name' => $request -> name,
            'description' => $request -> description,
            'category' => $request -> category,
        ]);

        //Redirecionar o produto para a routa de Listagem
        return redirect() -> route('produto.index') -> with('success', 'Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return view('produtos.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto) //Primeiro pegar a model Produto e injectar os dados na variavel $produto
    {
        return view('produtos.edit', ['produto' => $produto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        $request -> validate([
            'name' => 'required|max:255',
            'description' => 'required|max:500',
            'category' => 'required|max:100'
        ]);

        $produto -> update([
            'name'=> $request -> name,
            'description'=> $request -> description,
            'category'=> $request -> category,
        ]);

        return redirect() -> route('produto.show', ['produto' => $produto]) -> with('success', 'Produto editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto -> delete();

        return redirect() -> route('produto.index') -> with('success','Usuário deletado com sucesso!');
    }
}
