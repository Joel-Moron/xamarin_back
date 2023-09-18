<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asociado_tiposervicio extends Model
{
    use HasFactory;
    protected $table = 'asociado_tiposervicio';
    protected $fillable = [
        'tip_ser_id',
        'aso_id',
    ];

    public function asociado()
    {
        return $this->belongsTo(Asociado::class, 'id');
    }
    public function tiposervicio()
    {
        return $this->belongsTo(tiposervicio::class, 'id');
    }
    public function paqueteAsociado()
    {
        return $this->hasMany(Paquete_asociado::class, 'aso_tip_ser_id');
    }
}
