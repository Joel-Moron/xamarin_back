<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaqueteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtener todos los IDs de tiposervicio y asociado
        $ids_hotel = DB::table('hotel')->pluck('id')->toArray();
        $ids_restaurante = DB::table('restaurante')->pluck('id')->toArray();
        $ids_transporte = DB::table('transporte')->pluck('id')->toArray();
        $ids_vuelo = DB::table('vuelo')->pluck('id')->toArray();
        $listPaquetes = [];

        for ($i = 0; $i < 15; $i++) {
            $listPaquetes[] = [
                'descuento' => rand(10, 100),
                'hot_id' =>  $ids_hotel[array_rand($ids_hotel)],
                'tra_id' =>  $ids_restaurante[array_rand($ids_restaurante)],
                'res_id' =>  $ids_transporte[array_rand($ids_transporte)],
                'vue_id' =>  $ids_vuelo[array_rand($ids_vuelo)],
            ];
        }

        // Insertar los datos en la tabla "asociado_tiposervicio"
        DB::table('paquete')->insert($listPaquetes);
    }
}
