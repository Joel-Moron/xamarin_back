<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'vuelo';
    protected $fillable = [
        'vue_fecha',
        'vue_hora'
    ];

    public function destino()
    {
        return $this->belongsToMany(Destino::class, 'destino_vuelo', 'vue_id', 'des_id');
    }

    public function asientos()
    {
        return $this->hasMany(Asiento::class, 'vue_id');
    }

    public function paquete()
    {
        return $this->hasMany(Paquete::class,'id');
    }

    public function detallevuelo()
    {
        return $this->hasMany(Detallevuelo::class,'vue_id');
    }
}
