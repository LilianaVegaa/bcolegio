<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = 'permisos';

	public $timestamps = false;

    protected $fillable = ['nombre', 'metodo', 'modulo', 'orden'];

    public function perfiles()
    {
        return $this->belongsToMany(Perfil::class);
    }

    public static function listActions()
    {
        return static::select('modulo', 'nombre', 'id')->get();
    }
}
