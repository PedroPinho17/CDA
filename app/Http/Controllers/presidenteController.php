<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presidente;
use DB;
class presidenteController extends Controller
{
    //
    public function index(Request $request){
        $presidentes = Presidente::all();

        $ultimo_query = 'SELECT id,nome, ano_inicio ,ano_final,foto FROM presidente ORDER BY id DESC LIMIT 1;';
        $ultimo_presidente = DB::select($ultimo_query);

        return view('site.presidente', [ 'titulo' => 'Presidente', 'presidentes' => $presidentes, 'ultimo_presidente' => $ultimo_presidente ]);
    }
}
