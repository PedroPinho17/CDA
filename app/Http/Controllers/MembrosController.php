<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Detalhe_Membro;

class MembrosController extends Controller
{
    //
    public function index(){

        if (\Request::is('clube/membros/direção')) {
            $elementos = Detalhe_Membro::with('membro')->where('membro_id', '=', 1)->get();
            //$elementos = 'SELECT dm.nome_membro, dm.cargo, dm.foto, m.nome FROM detalhes_membros dm , membro m WHERE dm.membro_id = 1 and dm.membro_id = m.id;';
            //$elementos = DB::select($elementos);
            return view('site.membros', [ 'titulo' => 'Membros do Clube', 'elementos' => $elementos ]);
        }
        if (\Request::is('clube/membros/socios')) {
            $elementos = Detalhe_Membro::with('membro')->where('membro_id', '=', 2)->get();
            return view('site.membros', [ 'titulo' => 'Membros do Clube', 'elementos' => $elementos ]);
        }

        if (\Request::is('clube/membros/fiscal')) {
            $elementos = Detalhe_Membro::with('membro')->where('membro_id', '=', 3)->get();
            return view('site.membros', [ 'titulo' => 'Membros do Clube', 'elementos' => $elementos ]);
        }
        if (\Request::is('clube/membros/vogais')) {
            $elementos = Detalhe_Membro::with('membro')->where('membro_id', '=', 4)->get();
            return view('site.membros', [ 'titulo' => 'Membros do Clube', 'elementos' => $elementos ]);
        }
        if (\Request::is('clube/membros/funcionarios')) {
            $elementos = Detalhe_Membro::with('membro')->where('membro_id', '=', 5)->get();
            return view('site.membros', [ 'titulo' => 'Membros do Clube', 'elementos' => $elementos ]);
        }
    }
}
