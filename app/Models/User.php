<?php

namespace App\Models;

use App\Notifications\RedefinirPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\VerificarEmailNotification;
use Cache;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'tipoUser_id'
    ];

    public function tp()
    {
        return $this->belongsTo(tipoUsers::class, 'tipoUser_id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'password',
        'remember_token',
        'foto_perfil',
        'telemovel',
        'rede',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Check if User is online
    public function isOnline($idTpUser)
    {
        return Cache::has('user-is-online-' .  $idTpUser /* $this->id */);
    }

    public function tipoUser()
    {
        return $this->belongsTo(tipoUsers::class, 'tipoUser_id ');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new RedefinirPasswordNotification($token, $this->email, $this->name));
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerificarEmailNotification($this->name));
    }
}
