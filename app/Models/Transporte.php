<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'transporte';
    protected $fillable = [
        'tra_ubicacion',
        'tra_precion',
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
