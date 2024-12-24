<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\SecureDelete;
use Illuminate\Support\Facades\DB;

class Profesor extends Model
{
    use SecureDelete, SoftDeletes;

    protected $table = 'profesores';

    protected $dates    = ['deleted_at'];

    protected $fillable = ['nombres', 'apellidos', 'telefono', 'direccion', 'ci', 'usuario_id'];

    protected $relationships = [
        ''
    ];

    protected $appends = ['fullname'];

    public static function listProfesores()
    {
        return static::orderBy('id', 'DESC')
            ->select('id', DB::raw("CONCAT(nombres, ' ', apellidos) as nombre"))
            ->get();
    }

    public function getFullnameAttribute()
    {
        $fullname = $this->apellidos." ".$this->nombres;
        return $fullname;
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function cursoMaterias()
    {
        return $this->hasMany(CursoMateria::class, 'profesor_id');
    }
}
