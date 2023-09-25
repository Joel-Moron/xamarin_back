<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'pais';
    protected $fillable = [
        'nombre',
    ];

    public function destino()
    {
        return $this->hasMany(Destino::class,'pais_id');
    }
}
