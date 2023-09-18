<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquete_asociado extends Model
{
    use HasFactory;
    protected $table = 'paquete_asociado';
    protected $fillable = [
        'paq_id',
        'aso_tip_ser_id',
    ];
    public function paquete()
    {
        return $this->belongsTo(Paquete::class, 'id');
    }
    public function asociadoTipoServicio()
    {
        return $this->belongsTo(Asociado_tiposervicio::class, 'id');
    }
    public function promocion()
    {
        return $this->hasOne(Promocion::class, 'paq_asoc_id');
    }
}
