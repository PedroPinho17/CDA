<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipaTecnica extends Model
{
    use HasFactory;
    protected $table = 'equipa_tecnica';
    protected $primaryKey = 'id_equipaTec';
    public $timestamps = false;
    protected $fillable = [
        'nome', 'foto'
    ];
}
