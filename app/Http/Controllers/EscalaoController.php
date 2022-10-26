<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Escalao;
use App\Models\Jogadores;
use App\Models\DetalhesJogadores;
use App\Models\Jogos;
use App\Models\Link;
use DB;
class EscalaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (\Request::is('jogadores/seniores')) {

            //$jogadores = 'SELECT j.nome,j.peso,j.altura,j.altura,j.numero_camisola,j.posicao,j.foto, eq.id_equipa, eq.imagemEquipa, e.id_escalao, e.nome_escalao from jogadores j ,equipa eq, escaloes e where e.id_escalao  = 8 and j.id_escalao = e.id_escalao  and j.id_equipa = eq.id_equipa;';
            //$jogadores = DB::select($jogadores);
            $jogadores = Jogadores::with('escalao','equipa')->where('id_escalao', '=', 8)->orderBy('numero_camisola','ASC')->get();
            $jogos = Jogos::with('equipa')->where('equipa_id', '=', 1)->orderBy('id_jogo','desc')->limit(5)->get();
            $link = Link::with('equipa')->where('equipa_id', '=', 1)->get();

           // $treinadores = 'SELECT tp.nome_treinador, tp.foto_treinador , tp.funcao, et.nome, et.foto FROM tpfuncao tp , equipa_tecnica et WHERE tp.id_equipaTec = 1 and tp.id_equipaTec = et.id_equipaTec;';
            //$treinadores = DB::select($treinadores);
            return view('site.jogadoresPage',['titulo' => 'Seniores','jogadores' => $jogadores,'jogos' => $jogos,'link' => $link]);
        }

        if (\Request::is('jogadores/juniores')) {

            //$jogadores = 'SELECT j.nome,j.peso,j.altura,j.altura,j.numero_camisola,j.posicao,j.foto,eq.id_equipa, eq.imagemEquipa, e.id_escalao, e.nome_escalao from jogadores j ,equipa eq, escaloes e where e.id_escalao  = 7 and j.id_escalao = e.id_escalao  and j.id_equipa = eq.id_equipa;';
            //$jogadores = DB::select($jogadores);
            $jogadores = Jogadores::with('escalao','equipa')->where('id_escalao', '=', 7)->orderBy('numero_camisola','ASC')->get();

            $jogos = Jogos::with('equipa')->where('equipa_id', '=', 2)->orderBy('id_jogo','desc')->limit(5)->get();
            $link = Link::with('equipa')->where('equipa_id', '=', 2)->get();
            return view('site.jogadoresPage',['titulo' => 'Juniores','jogadores' => $jogadores,'jogos' => $jogos,'link' => $link]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  Jogadores $jogador
     * @return \Illuminate\Http\Response
     */
    public function show(Jogadores $jogador)
    {
        $identificacao = $jogador->id_jogador;
        //dd($identificacao);
        $dados = DetalhesJogadores::with('jogador')->where('jogador_id', '=', $identificacao)->get();
        //dd($dados);
        return view('site.pageDetails',['jogador' => $jogador,'dados' => $dados]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
