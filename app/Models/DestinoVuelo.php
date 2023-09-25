<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinoVuelo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'destino_vuelo';
    protected $fillable = [
        'des_id',
        'vue_id'
    ];
}
