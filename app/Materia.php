<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\SecureDelete;

class Materia extends Model
{
    use SecureDelete, SoftDeletes;

    protected $table = 'materias';

    protected $dates    = ['deleted_at'];

    protected $fillable = ['nombre', 'descripcion'];

    public static function listMaterias()
    {
        return static::orderBy('id', 'DESC')
            ->select('id', 'nombre')
            ->get();
    }

    public function cursos()
    {
        return $this->belongsToMany(
            Curso::class,
            'curso_materia',
            'materia_id',
            'curso_id'
        )->withPivot('gestion_id', 'profesor_id')->withTimestamps();
    }
}
