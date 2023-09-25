<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'hotel';
    protected $fillable = [
        'hot_ubicacion',
        'hot_precio',
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
