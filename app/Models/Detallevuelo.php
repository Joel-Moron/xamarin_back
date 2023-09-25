<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallevuelo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'detallevuelo';
    protected $fillable = [
        'vue_id',
        'paq_id',
        'usu_id',
        'clas_id'
    ];

    public function vuelo()
    {
        return $this->belongsTo(Vuelo::class, 'vue_id');
    }

    public function paquete()
    {
        return $this->belongsTo(Paquete::class, 'paq_id');
    }

    public function clase()
    {
        return $this->belongsTo(Clase::class, 'clas_id');
    }
    
}
