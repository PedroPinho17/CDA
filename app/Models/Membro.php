<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membro extends Model
{
    use HasFactory;
    protected $table = 'membro';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nome'
    ];
}
