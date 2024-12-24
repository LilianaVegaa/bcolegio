<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\SecureDelete;

class Gestion extends Model
{
    use SecureDelete, SoftDeletes;

    protected $table = 'gestiones';

    protected $dates    = ['deleted_at'];

    protected $fillable = ['año', 'fecha_inicio', 'fecha_fin', 'estado'];

    public static function listGestiones()
    {
        return static::where('estado', false)
            ->orderBy('id', 'DESC')
            ->select('id', 'año')
            ->get();
    }

    public static function listGeneralGestiones()
    {
        return static::orderBy('id', 'DESC')
            ->select('id', 'año')
            ->get();
    }

    public function trimestres()
    {
        return $this->hasMany(Trimestre::class, 'gestion_id');
    }

    public function cursoMaterias()
    {
        return $this->hasMany(CursoMateria::class, 'gestion_id');
    }

    public function estudianteCursos()
    {
        return $this->hasMany(EstudianteCurso::class);
    }
}
