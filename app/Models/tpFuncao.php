<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tpFuncao extends Model
{
    use HasFactory;
    protected $table = 'tpfuncao';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nome_treinador','funcao','foto_treinador', 'id_equipaTec'
    ];

    public function equipaTecnica()
    {
        return $this->belongsTo(EquipaTecnica::class, 'id_equipaTec');
    }
}


