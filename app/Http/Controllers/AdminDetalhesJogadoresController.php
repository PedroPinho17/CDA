<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetalhesJogadores;
use App\Models\Jogadores;
use App\Models\Equipa;
use Validator;
use DB;
use Alert;
use App\Exports\DetalhesJogadoresExport;
use Excel;
use PDF;

class AdminDetalhesJogadoresController extends Controller
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
            $detalhesJogadores = DetalhesJogadores::where('ano_nascimento', 'like', '%'.$verification.'%')->orWhere('jogador_id', '=', $verification)->paginate(10);
            return view('admin.detalhesjogadores.index', compact('detalhesJogadores', 'verification'));

        }if($verification == null){
            $verification = '';
            $detalhesJogadores = DetalhesJogadores::with('jogador')->paginate(6);
            return view('admin.detalhesjogadores.index', compact('detalhesJogadores', 'verification'));
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
        $jogadores = Jogadores::all();
        $equipas = Equipa::all();
        return view('admin.detalhesjogadores.create', compact('jogadores','equipas'));
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
        $rules = array(
            'nome_completo' => ['required', 'string', 'max:255'],
            'data_nascimento' => ['required', 'string', 'max:255'],
            'Naturalidade' => ['required', 'string', 'max:50'],
            'info' => ['required', 'string', 'max:255'],
            'link' => ['required', 'string', 'max:255'],
            'jogador_id' => ['required']
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails()){
            return redirect()->back()->withErrors($error)->withInput();
        }

        $detalhesJogadores = new DetalhesJogadores();
        $detalhesJogadores->nome_completo = $request->nome_completo;
        $detalhesJogadores->data_nascimento = $request->data_nascimento;
        $detalhesJogadores->Naturalidade = $request->Naturalidade;
        $detalhesJogadores->info = $request->info;
        $detalhesJogadores->link = $request->link;
        $detalhesJogadores->jogador_id = $request->jogador_id;
        if($detalhesJogadores->save()){
            return redirect()->route('detalhes_jogadores.index')->with('success', 'Detalhes do Jogador adicionados com sucesso!');
        }else{
            return redirect()->back()->with('error', 'Erro ao adicionar detalhes do jogador!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  DetalhesJogadores $detalhes_jogadore
     * @return \Illuminate\Http\Response
     */
    public function show(DetalhesJogadores $detalhes_jogadore)
    {
        //
        return view('admin.detalhesjogadores.show', compact('detalhes_jogadore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  DetalhesJogadores $detalhes_jogadore
     * @return \Illuminate\Http\Response
     */
    public function edit(DetalhesJogadores $detalhes_jogadore)
    {
        //
        $jogadores = Jogadores::all();
        return view('admin.detalhesjogadores.edit', compact('detalhes_jogadore','jogadores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  DetalhesJogadores $detalhes_jogadore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalhesJogadores $detalhes_jogadore)
    {
        //
        $rules = array(
            'nome_completo' => ['required', 'string', 'max:255'],
            'data_nascimento' => ['required', 'string', 'max:255'],
            'Naturalidade' => ['required', 'string', 'max:50'],
            'info' => ['required', 'string', 'max:255'],
            'link' => ['required', 'string', 'max:255'],
            'jogador_id' => ['required']
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails()){
            return redirect()->back()->withErrors($error)->withInput();
        }

        $detalhesJogadores = DetalhesJogadores::find($detalhes_jogadore->id);
        $detalhesJogadores->nome_completo = $request->nome_completo;
        $detalhesJogadores->data_nascimento = $request->data_nascimento;
        $detalhesJogadores->Naturalidade = $request->Naturalidade;
        $detalhesJogadores->info = $request->info;
        $detalhesJogadores->link = $request->link;
        $detalhesJogadores->jogador_id = $request->jogador_id;
        if($detalhesJogadores->save()){
            return redirect()->route('detalhes_jogadores.index')->with('success', 'Detalhes do Jogador atualizado com sucesso!');
        }else{
            return redirect()->back()->with('error', 'Erro ao atualizar detalhes do jogador!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DetalhesJogadores $detalhes_jogadore
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetalhesJogadores $detalhes_jogadore)
    {
        //
        if($detalhes_jogadore->delete()){
            return redirect()->route('detalhes_jogadores.index')->with('success', 'Detalhes do Jogador removidos com sucesso!');
        }else{
            return redirect()->back()->with('error', 'Erro ao remover detalhes do jogador!');
        }
    }
    public function exportacao($extensao){
        //return 'teste';
        if(in_array($extensao,['xlsx','pdf'] )){
            return Excel::download(new DetalhesJogadoresExport, 'lista_detalhes_jogadores.'.$extensao);
        }
    }
    public function exportar(){
        //return 'teste';
        $detalhes_jogadores = DetalhesJogadores::all();
        $pdf = PDF::loadView('admin.detalhesjogadores.pdf',['detalhes_jogadores' => $detalhes_jogadores]);
        return $pdf->download('lista_detalhes_jogadores.pdf');
    }
}
