<?php

namespace App\Http\Controllers;
use App\Models\Galeria;
use Illuminate\Http\Request;

class GaleriaController extends Controller
{
    //
    public function index(){

        $galerias = Galeria::all();
        return view('site.galeria', ['titulo' => 'Galeria', 'galerias' => $galerias]);
    }
}
