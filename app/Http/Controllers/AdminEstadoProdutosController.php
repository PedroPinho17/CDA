<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\estadoProduto;

class AdminEstadoProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $verification = $request->get('query');

        if($verification != null){
            $estadoProdutos = estadoProduto::where('Estado', 'like', '%'.$verification.'%')->paginate(5);
            return view('admin.estadoProdutos.index', ['estadoProdutos' => $estadoProdutos, 'verification' => $verification]);
        }
        if($verification == null){
            $verification = '';
            $estadoProdutos = estadoProduto::paginate(5);
            return view('admin.estadoProdutos.index', ['estadoProdutos' => $estadoProdutos, 'verification' => $verification]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.estadoProdutos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $estadoProduto = new estadoProduto();
        $estadoProduto->Estado = $request->Estado;
        if($estadoProduto->save()){
            return redirect()->route('estadoProdutos.index')->with('success', 'Estado de produto criado com sucesso!');
        }else{
            return redirect()->route('estadoProdutos.index')->with('error', 'Erro ao criar estado de produto!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  estadoProduto $estadoProduto
     * @return \Illuminate\Http\Response
     */
    public function show(estadoProduto $estadoProduto)
    {
        //
        return view('admin.estadoProdutos.show', ['estadoProduto' => $estadoProduto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  estadoProduto $estadoProduto
     * @return \Illuminate\Http\Response
     */
    public function edit(estadoProduto $estadoProduto)
    {
        //
        return view('admin.estadoProdutos.edit', ['estadoProduto' => $estadoProduto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  estadoProduto $estadoProduto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, estadoProduto $estadoProduto)
    {
        //
        $estadoProduto->Estado = $request->Estado;
        if($estadoProduto->save()){
            return redirect()->route('estadoProdutos.index')->with('success', 'Estado de produto atualizado com sucesso!');
        }else{
            return redirect()->route('estadoProdutos.index')->with('error', 'Erro ao atualizar estado de produto!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  estadoProduto $estadoProduto
     * @return \Illuminate\Http\Response
     */
    public function destroy(estadoProduto $estadoProduto)
    {
        //
        if($estadoProduto->delete()){
            return redirect()->route('estadoProdutos.index')->with('success', 'Estado de produto eliminado com sucesso!');
        }else{
            return redirect()->route('estadoProdutos.index')->with('error', 'Erro ao eliminar o  estado de produto!');
        }

    }
}
