<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patrocinadores extends Model
{
    use HasFactory;
    protected $table = 'patrocinadores';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nome','descricao', 'link','foto'
    ];
}
