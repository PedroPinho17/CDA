<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class tipoUsers extends Model
{
    use HasFactory;
    protected $table = 'tipousers';
    protected $primaryKey = 'idTpUser';
    public $timestamps = false;

    protected $fillable = [
        'nome', 'descricao'
    ];


}
