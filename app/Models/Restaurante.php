<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'restaurante';
    protected $fillable = [
        'res_ubicacion',
        'res_precio',
        'aso_id'
    ];

    public function asociado()
    {
        return $this->belongsTo(Asociado::class, 'id');
    }

    public function paquete()
    {
        return $this->hasMany(Paquete::class,'id');
    }
}
