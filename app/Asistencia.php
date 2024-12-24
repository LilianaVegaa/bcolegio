<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\SecureDelete;

class Asistencia extends Model
{
    use SecureDelete, SoftDeletes;

    protected $table = 'asistencias';

    protected $fillable = ['fecha', 'estado', 'observaciones', 'estudiante_curso_id', 'materia_id'];

    public function estudianteCurso()
    {
        return $this->belongsTo(EstudianteCurso::class);
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }
}
