<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presidente;
use DB;

class HomePageController extends Controller
{
    //
    public function principal(){

        $ultimo_query = 'SELECT id,nome, ano_inicio ,ano_final,foto FROM presidente ORDER BY id DESC LIMIT 1;';
        $ultimo_presidente = DB::select($ultimo_query);

        $ultimos_posts = 'SELECT p.titulo, p.descricao, p.foto, p.data, p.link, u.name FROM posts p, users u where p.user_id = u.id ORDER BY id_post DESC LIMIT 3;';
        $ultimos_posts = DB::select($ultimos_posts);

        $ultimas_fotos = 'SELECT * FROM `galeria` ORDER BY id DESC LIMIT 6;';
        $ultimas_fotos = DB::select($ultimas_fotos);

        $num_presidentes = 'SELECT COUNT(id) as num_presidentes FROM presidente;';
        $num_presidentes = DB::select($num_presidentes);

        return view('site.index', ['titulo' => 'Home', 'ultimo_presidente' => $ultimo_presidente, 'ultimos_posts' => $ultimos_posts, 'ultimas_fotos' => $ultimas_fotos, 'num_presidentes' => $num_presidentes]);
    }

    public function teste(){
        return view('site.teste');
    }
}
