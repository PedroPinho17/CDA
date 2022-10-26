<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loja;
use DB;


class LojaController extends Controller
{
    //

    public function loja(Request $request){

        $produtos = Loja::all();
        
        //$produtos = DB::select('SELECT * FROM produtos');
        return view('site.loja', [ 'titulo' => 'Loja', 'produtos' => $produtos ]);
    }
}
