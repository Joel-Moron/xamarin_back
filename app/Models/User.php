<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'user';
    protected $fillable = [
        'usu_nombre',
        'usu_apellidop',
        'usu_apellidom',
        'usu_documento',
        'usu_email',
        'usu_emailV',
        'usu_password',
        'usu_targeta',
        'rol_id',
        'usu_token',
        'date_token'
    ];
}
