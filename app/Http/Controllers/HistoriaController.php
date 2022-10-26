<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HistoriaController extends Controller
{
    //
    public function index(){
        $foto = 'SELECT nome,foto FROM presidente ORDER BY id ASC LIMIT 1;';
        $foto = DB::select($foto);
        /* ou
            $foto = DB::select('SELECT nome,foto FROM presidente ORDER BY id ASC LIMIT 1;');
        */
        return view('site.historia', ['titulo' => 'História', 'foto' => $foto]);
    }
}
