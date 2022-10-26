<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(int $reservar){

        //dd($reservar);
        if ($reservar == 1){
            return view('site.contato', ['titulo' => 'Contato', 'reservar' => 1]);
        }
        else{
            return view('site.contato', ['titulo' => 'Contato', 'reservar' => 0]);
        }

    }
}
