<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\SecureDelete;

class EstudianteCurso extends Model
{
    use SecureDelete, SoftDeletes;

    protected $table = 'estudiante_curso';

    protected $fillable = ['fecha_registro', 'estudiante_id', 'curso_id', 'gestion_id'];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function gestion()
    {
        return $this->belongsTo(Gestion::class);
    }

    public static function estudiantesPorGestionYCursos($gestionId, $cursoId)
    {
        return static::where('gestion_id', $gestionId)
            ->where('curso_id', $cursoId)
            ->with('estudiante')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'fullname' => $item->estudiante->fullname,
                ];
            });
    }
}

