<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallevuelo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'detallevuelo';
    protected $fillable = [
        'promo_id',
        'entrada_id',
        'paq_id',
        'asiento'
    ];
    public function entrada()
    {
        return $this->belongsTo(Entrada::class, 'id');
    }
    public function paquete()
    {
        return $this->belongsTo(Paquete::class, 'id');
    }
    public function promocion()
    {
        return $this->belongsTo(Promocion::class, 'id');
    }
    public function historial()
    {
        return $this->hasMany(Historial::class, 'detalle_id');
    }
}
