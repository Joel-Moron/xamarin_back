<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    use HasFactory;
    protected $table = 'promocion';
    protected $fillable = [
        'promo_descuento',
        'paq_asoc_id',
        'entrada_id'
    ];
    public function paqueteAsociado()
    {
        return $this->belongsTo(Paquete_asociado::class, 'id');
    }
    public function entrada()
    {
        return $this->belongsTo(Entrada::class, 'id');
    }
    public function detalleVuelo()
    {
        return $this->hasMany(Detallevuelo::class, 'promo_id');
    }
}
