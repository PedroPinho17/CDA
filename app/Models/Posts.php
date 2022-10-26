<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $primaryKey = 'id_post';
    public $timestamps = false;
    protected $fillable = [
        'titulo','descricao','foto', 'data', 'link', 'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
