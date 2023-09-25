<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asociado extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'asociado';
    protected $fillable = [
        'aso_ruc',
        'aso_telefono',
        'aso_rsocial'
    ];

    public function hoteles()
    {
        return $this->hasMany(Asociado::class,'aso_id');
    }

    public function restaurantes()
    {
        return $this->hasMany(Asociado::class,'aso_id');
    }

    public function transportes()
    {
        return $this->hasMany(Asociado::class,'aso_id');
    }
}
