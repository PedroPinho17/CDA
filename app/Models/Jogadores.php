<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogadores extends Model
{
    use HasFactory;
    protected $table = 'jogadores';
    protected $primaryKey = 'id_jogador';
    public $timestamps = false;
    protected $fillable = [
        'id_jogador','nome','peso','altura','numero_camisola','posicao','foto','id_escalao','id_equipa'
    ];
    public function escalao()
    {
        return $this->belongsTo(Escalao::class, 'id_escalao');
    }
    public function equipa()
    {
        return $this->belongsTo(Equipa::class, 'id_equipa');
    }
}
