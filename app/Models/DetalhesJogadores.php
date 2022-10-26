<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalhesJogadores extends Model
{
    use HasFactory;
    protected $table = 'detalhes_jogadores';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nome_completo','data_nascimento', 'Naturalidade' , 'info', 'link', 'jogador_id'
    ];
    public function jogador()
    {
        return $this->belongsTo(Jogadores::class, 'jogador_id');
    }
}
