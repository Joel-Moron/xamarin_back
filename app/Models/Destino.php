<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destino extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'destino';
    protected $fillable = [
        'precio',
        'pais_id'
    ];

    public function pais()
    {
        return $this->belongsTo(Pais::class, 'pais_id');
    }

    public function clase()
    {
        return $this->hasMany(Clase::class,'des_id');
    }

    public function vuelo()
    {
        return $this->belongsToMany(Vuelo::class, 'destino_vuelo', 'des_id', 'vue_id');
    }
}
