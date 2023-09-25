<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'paquete';
    protected $fillable = [
        'descuento',
        'hot_id',
        'tra_id',
        'res_id',
        'vue_id',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hot_id');
    }

    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class, 'res_id');
    }

    public function transporte()
    {
        return $this->belongsTo(Transporte::class, 'tra_id');
    }

    public function vuelo()
    {
        return $this->belongsTo(Vuelo::class, 'vue_id');
    }

    public function detallevuelo()
    {
        return $this->hasMany(Detallevuelo::class,'paq_id');
    }
}
