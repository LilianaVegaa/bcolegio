<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\SecureDelete;
use Illuminate\Support\Facades\DB;

class Estudiante extends Model
{
    use SecureDelete, SoftDeletes;

    protected $table = 'estudiantes';

    protected $dates    = ['deleted_at'];

    protected $fillable = ['nombres', 'apellidos', 'telefono', 'ci', 'estado', 'padre_id'];

    protected $relationships = [
        ''
    ];

    protected $appends = ['fullname'];

    public static function listEstudiantes()
    {
        return static::orderBy('id', 'DESC')
            ->select('id', DB::raw("CONCAT(nombres, ' ', apellidos) as nombre"), DB::raw('false as selected'))
            ->get();
    }

    public function getFullnameAttribute()
    {
        $fullname = $this->apellidos." ".$this->nombres;
        return $fullname;
    }

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'estudiante_curso')
                    ->withPivot('fecha_registro', 'gestion_id')
                    ->withTimestamps();
    }
}
