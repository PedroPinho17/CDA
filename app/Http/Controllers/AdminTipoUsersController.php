<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoUsers;

class AdminTipoUsersController extends Controller
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
            $tipoUsers = tipoUsers::where('nome', 'like', '%'.$verification.'%')->orWhere('descricao', 'like', '%'.$verification.'%')->paginate(10);
            return view('admin.tipoUsers.index', compact('tipoUsers', 'verification'));

        }if($verification == null){
            $verification = '';
            $tipoUsers = tipoUsers::paginate(5);
            return view('admin.tipoUsers.index', compact('tipoUsers', 'verification'));
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
        return view('admin.tipoUsers.create');
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
        $tipoUsers = new TipoUsers();
        $tipoUsers->nome = $request->nome;
        $tipoUsers->descricao = $request->descricao;
        if($tipoUsers->save()){
            return redirect()->route('tipoUser.index')->with('success', 'Tipo de utilizador adicionado com sucesso!');
        }else{
            return redirect()->route('tipoUser.index')->with('error', 'Erro ao adicionar tipo de utilizador!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  TipoUsers $tipoUser
     * @return \Illuminate\Http\Response
     */
    public function show(TipoUsers $tipoUser)
    {
        //
        return view('admin.tipoUsers.show', compact('tipoUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  TipoUsers $tipoUser
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoUsers $tipoUser)
    {
        //
        return view('admin.tipoUsers.edit', compact('tipoUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  TipoUsers $tipoUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoUsers $tipoUser)
    {
        //
        $tipoUser->nome = $request->nome;
        $tipoUser->descricao = $request->descricao;
        if($tipoUser->save()){
            return redirect()->route('tipoUser.index')->with('success', 'Tipo de utilizador atualizado com sucesso!');
        }else{
            return redirect()->route('tipoUser.index')->with('error', 'Erro ao atualizar tipo de utilizador!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  TipoUsers $tipoUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoUsers $tipoUser)
    {
        //
        if($tipoUser->delete()){
            return redirect()->route('tipoUser.index')->with('success', 'Tipo de utilizador eliminado com sucesso!');
        }else{
            return redirect()->route('tipoUser.index')->with('error', 'Erro ao eliminar tipo de utilizador!');
        }
    }
}
