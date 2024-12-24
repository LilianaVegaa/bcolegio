<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\SecureDelete;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, SecureDelete, SoftDeletes;

    protected $table = 'usuarios';

    protected $dates    = ['deleted_at'];

    protected $fillable = [
        'nombre', 'contraseña', 'perfil_id', 'tipo_usuario'
    ];

    protected $hidden = [
        'contraseña',
    ];

    // protected $relationships = [
    //     'perfiles'
    // ];

    public function findForPassport($username)
    {
        return $this->where('nombre', $username)->first();
    }

    public function getAuthPassword()
    {
        return $this->contraseña;
    }

    public function setContraseñaAttribute($value)
    {
        $this->attributes['contraseña'] = bcrypt($value);
    }

    public function perfil()
    {
        return $this->belongsTo(Perfil::class);
    }

    public function rol()
    {
        return $this->hasOne($this->tipo_usuario, 'usuario_id');
    }
}
