<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\SecureDelete;

class CursoMateria extends Model
{
    use SecureDelete, SoftDeletes;

    protected $table = 'curso_materia';

    protected $fillable = ['curso_id', 'materia_id', 'gestion_id', 'profesor_id'];

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class, 'materia_id');
    }

    public function gestion()
    {
        return $this->belongsTo(Gestion::class, 'gestion_id');
    }

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'profesor_id');
    }

    public function estudiantes()
    {
        return $this->hasMany(EstudianteCurso::class, 'curso_id', 'curso_id')
            ->where('gestion_id', $this->gestion_id);
    }

    public function cantidadEstudiantes()
    {
        return $this->estudiantes()->count();
    }

    public static function materiasPorGestionYProfesor($gestionId, $cursoId, $profesorId = null)
    {
        $query = static::where('gestion_id', $gestionId)->where('curso_id', $cursoId);

        if (!is_null($profesorId)) {
            $query->where('profesor_id', $profesorId);
        }

        return $query->with('materia')
            ->get()
            ->map(function ($item) {
                return $item->materia;
            });
    }
}


