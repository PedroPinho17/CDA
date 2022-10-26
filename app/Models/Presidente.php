<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presidente extends Model
{
    use HasFactory;
    protected $table = 'presidente';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nome','ano_inicio', 'ano_final','foto'
    ];
}
