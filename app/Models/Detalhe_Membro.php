<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalhe_Membro extends Model
{
    use HasFactory;
    protected $table = 'detalhes_membros';
    protected $primaryKey = 'id_detalhe_membro';
    public $timestamps = false;
    protected $fillable = [
        'nome_membro' , 'cargo', 'foto', 'membro_id' 
    ];

    public function membro(){
        return $this->belongsTo('App\Models\Membro');
    }
}
