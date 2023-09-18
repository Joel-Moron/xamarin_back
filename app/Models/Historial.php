<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'historial';
    protected $fillable = [
        'user_id',
        'detalle_id',
        'estado'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
    public function detallesvuelos()
    {
        return $this->belongsTo(Detallevuelo::class, 'id');
    }
}
