<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asociado extends Model
{
    use HasFactory;
    protected $table = 'asociado';
    protected $fillable = [
        'aso_direccion',
        'aso_ruc',
        'aso_rsocial'
    ];
    public function asociado_tiposervicios()
    {
        return $this->hasMany(Asociado_tiposervicio::class, 'aso_id');
    }
}
