<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patrocinadores;

class patrocinadoresController extends Controller
{
    //
    public function index(Request $request){

        $patrocinadores = Patrocinadores::all();

        return view('site.patrocinadores', [ 'titulo' => 'Patrocinadores', 'patrocinadores' => $patrocinadores ]);
    }
}
