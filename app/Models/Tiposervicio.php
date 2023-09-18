<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiposervicio extends Model
{
    use HasFactory;
    protected $table = 'tiposervicio';
    protected $fillable = [
        'tip_ser_nombre',
    ];
    
    public function asociado_tiposervicios()
    {
        return $this->hasMany(Asociado_tiposervicio::class, 'tip_ser_id');
    }
}
