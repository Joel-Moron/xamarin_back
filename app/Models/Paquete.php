<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    use HasFactory;
    protected $table = 'paquete';
    protected $fillable = [
        'entrada_id',
    ];
    public function entrada()
    {
        return $this->belongsTo(Entrada::class, 'id');
    }
    public function paqueteAsociado()
    {
        return $this->hasMany(Paquete_asociado::class, 'paq_id');
    }
    public function detalleVuelo()
    {
        return $this->hasMany(Paquete::class, 'paq_id');
    }
}
