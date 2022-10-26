<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estadoProduto extends Model
{
    use HasFactory;
    protected $table = 'estado_produtos';
    protected $primaryKey = 'id_estado';
    public $timestamps = false;
    protected $fillable = [
        'Estado'
    ];
}
