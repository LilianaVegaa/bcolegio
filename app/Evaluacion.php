<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\SecureDelete;

class Evaluacion extends Model
{
    use SecureDelete, SoftDeletes;

    protected $table = 'evaluaciones';

    protected $dates    = ['deleted_at'];

    protected $fillable = ['nombre', 'calificacion', 'fecha', 'estudiante_curso_id', 'materia_id', 'trimestre_id'];

    public function estudianteCurso()
    {
        return $this->belongsTo(EstudianteCurso::class);
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function trimestre()
    {
        return $this->belongsTo(Trimestre::class);
    }
}
