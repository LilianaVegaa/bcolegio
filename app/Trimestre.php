<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\SecureDelete;
use Illuminate\Support\Facades\DB;

class Trimestre extends Model
{
    use SecureDelete, SoftDeletes;

    protected $table = 'trimestres';

    protected $dates    = ['deleted_at'];

    protected $fillable = ['nombre', 'pruebas', 'gestion_id'];

    public static function listTrimestres()
    {
        return static::orderBy('id', 'DESC')
            ->select('id', 'año')
            ->get();
    }

    public function gestion()
    {
        return $this->belongsTo(Gestion::class, 'gestion_id');
    }
}
