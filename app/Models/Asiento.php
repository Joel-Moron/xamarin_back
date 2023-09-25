<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asiento extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'asiento';
    protected $fillable = [
        'asi_numero',
        'asi_estado',
        'vue_id',
    ];
    public function vuelo()
    {
        return $this->belongsTo(Vuelo::class,'id');
    }
}
