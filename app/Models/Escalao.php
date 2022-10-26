<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escalao extends Model
{
    use HasFactory;
    protected $table = 'escaloes';
    protected $primaryKey = 'id_escalao';
    public $timestamps = false;
    protected $fillable = [
        'id_escalao','nome_escalao'
    ];
}
