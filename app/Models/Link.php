<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    protected $table = 'afa_links';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id','link', 'equipa_id'
    ];

    public function equipa()
    {
        return $this->belongsTo('App\Models\Equipa', 'equipa_id');
    }
}
