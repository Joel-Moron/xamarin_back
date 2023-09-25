<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acompanante extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'acompanante';
    protected $fillable = [
        'aco_nombre',
        'aco_apellidop',
        'aco_apellidom',
        'aco_documento',
        'det_id',
    ];
}
