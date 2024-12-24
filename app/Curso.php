<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\SecureDelete;
use Illuminate\Support\Facades\DB;

class Curso extends Model
{
    use SecureDelete, SoftDeletes;

    protected $table = 'cursos';

    protected $dates    = ['deleted_at'];

    protected $fillable = ['nombre', 'descripcion'];

    public static function listCursos()
    {
        return static::orderBy('id', 'DESC')
            ->select('id', 'nombre', 'descripcion')
            ->get();
    }

    public function materias()
    {
        return $this->belongsToMany(
            Materia::class,
            'curso_materia',
            'curso_id',
            'materia_id'
        )->withPivot('gestion_id', 'profesor_id')->withTimestamps();
    }

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class, 'estudiante_curso')
                    ->withPivot('fecha_registro', 'gestion_id')
                    ->whereNull('estudiante_curso.deleted_at')
                    ->withTimestamps();
    }
}
