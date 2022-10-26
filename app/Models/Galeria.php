<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    use HasFactory;
    protected $table = 'galeria';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'titulo' , 'descricao', 'link', 'foto'
    ];
}
