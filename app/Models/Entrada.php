<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;
    protected $table = 'entrada';
    protected $fillable = [
        'entrada_hora',
        'entrada_fecha',
        'entrada_lugar',
        'entrada_destino',
        'entrada_pais'
    ];
    public function paquete()
    {
        return $this->hasMany(Paquete::class, 'entrada_id');
    }
    public function promocion()
    {
        return $this->hasOne(Promocion::class, 'entrada_id');
    }
    public function detalleVuelo()
    {
        return $this->hasMany(Detallevuelo::class, 'entrada_id');
    }
}
