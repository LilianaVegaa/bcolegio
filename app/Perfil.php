<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\SecureDelete;

class Perfil extends Model
{
    use SecureDelete, SoftDeletes;

    protected $table = 'perfiles';

    protected $dates    = ['deleted_at'];

    protected $fillable = ['descripcion'];

    protected $appends  = ['action_list'];

    public function usuarios()
    {
        return $this->hasMany(User::class);
    }

    public function permisos()
    {
        return $this->belongsToMany(Permiso::class);
    }

    public function getActionListAttribute()
    {
        return $this->permisos->pluck('id')->toArray();
    }

    public static function listPerfiles()
    {
        return static::orderBy('id', 'DESC')->select('id', 'descripcion')->get();
    }
}
