<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loja extends Model
{
    use HasFactory;
    protected $table = 'produtos';
    protected $primaryKey = 'id_produto';
    public $timestamps = false;
    protected $fillable = [
        'nome_produto','valor','foto_produto','estado_produto_id'
    ];

    public function estadoProduto(){
        return $this->belongsTo(estadoProduto::class, 'estado_produto_id');
    }
}
