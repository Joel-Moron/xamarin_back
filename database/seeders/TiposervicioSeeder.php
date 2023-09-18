<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposervicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tipos = [
            [
                'tip_ser_nombre' => 'hoteleria',
            ],
            [
                'tip_ser_nombre' => 'transporte',
            ],
            [
                'tip_ser_nombre' => 'restaurante',
            ],
            // Agrega más registros aquí
        ];
        
        // Insertar los datos en la tabla "entradas"
        DB::table('tiposervicio')->insert($tipos);
    }
}
