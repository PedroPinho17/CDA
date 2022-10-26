<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class camposController extends Controller
{
    //
    public  function index(){
        return view('site.campos', ['titulo' => 'Campos']);
    }


}
