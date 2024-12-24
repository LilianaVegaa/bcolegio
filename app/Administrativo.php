<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\SecureDelete;

class Administrativo extends Model
{
    use SecureDelete, SoftDeletes;

    protected $table = 'administrativos';

    protected $dates    = ['deleted_at'];

    protected $fillable = ['nombres', 'apellidos', 'telefono', 'direccion', 'ci', 'usuario_id'];

    protected $relationships = [
        ''
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
