<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogos extends Model
{
    use HasFactory;
    protected $table = 'jogos';
    protected $primaryKey = 'id_jogo';
    public $timestamps = false;

    protected $fillable = [
        'equipa_visitante', 'resultado', 'data', 'link', 'equipa_id'
    ];

    public function equipa()
    {
        return $this->belongsTo('App\Models\Equipa', 'equipa_id');
    }
}
