<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipa extends Model
{
    use HasFactory;
    protected $table = 'equipa';
    protected $primaryKey = 'id_equipa';
    public $timestamps = false;
    protected $fillable = [
        'nome' , 'tipo_Equipa', 'imagemEquipa', 'id_escalao', 'id_equipaTecnica'
    ];

    public function escalao()
    {
        return $this->belongsTo(Escalao::class, 'id_escalao');
    }

    public function equipaTec()
    {
        return $this->belongsTo(EquipaTecnica::class, 'id_equipaTecnica');
    }

}
