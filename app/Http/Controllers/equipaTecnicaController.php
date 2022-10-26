<?php

namespace App\Http\Controllers;

use App\Models\EquipaTecnica;
use App\Models\tpFuncao;
use Illuminate\Http\Request;
use DB;

class equipaTecnicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (\Request::is('jogadores/EquipaTecnicaSeniores')) {

            $treinadores = tpFuncao::with('equipaTecnica')->where('id_equipaTec', '=',' 1')->get();
            //$treinadores = 'SELECT tp.nome_treinador, tp.foto_treinador , tp.funcao, et.nome, et.foto FROM tpfuncao tp , equipa_tecnica et WHERE tp.id_equipaTec = 1 and tp.id_equipaTec = et.id_equipaTec;';
            //$treinadores = DB::select($treinadores);

            return view('site.equipaTecnica',['titulo' => 'Equipa Tecnica dos Seniores', 'treinadores' => $treinadores]);
        }
        if (\Request::is('jogadores/EquipaTecnicaJuniores')) {

            $treinadores = tpFuncao::with('equipaTecnica')->where('id_equipaTec', '=',' 2')->get();
            //$treinadores = 'SELECT tp.nome_treinador, tp.foto_treinador , tp.funcao, et.nome, et.foto FROM tpfuncao tp , equipa_tecnica et WHERE tp.id_equipaTec = 1 and tp.id_equipaTec = et.id_equipaTec;';
            //$treinadores = DB::select($treinadores);

            return view('site.equipaTecnica',['titulo' => 'Equipa Tecnica dos Seniores', 'treinadores' => $treinadores]);
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
     * @param  \App\Models\EquipaTecnica  $equipaTecnica
     * @return \Illuminate\Http\Response
     */
    public function show(EquipaTecnica $equipaTecnica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EquipaTecnica  $equipaTecnica
     * @return \Illuminate\Http\Response
     */
    public function edit(EquipaTecnica $equipaTecnica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EquipaTecnica  $equipaTecnica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EquipaTecnica $equipaTecnica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EquipaTecnica  $equipaTecnica
     * @return \Illuminate\Http\Response
     */
    public function destroy(EquipaTecnica $equipaTecnica)
    {
        //
    }
}
