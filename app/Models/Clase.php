<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'clase';
    protected $fillable = [
        'clas_nombre',
        'clas_precio',
        'des_id',
    ];

    public function destino()
    {
        return $this->belongsTo(Destino::class, 'des_id');
    }
    public function detallevulo()
    {
        return $this->hasMany(Detallevuelo::class, 'id');
    }
}
