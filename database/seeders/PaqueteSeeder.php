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
        $ids_entrada = DB::table('entrada')->pluck('id')->toArray();
        $listPaquetes = [];

        // Generar registros aleatorios vinculando los IDs
        for ($i = 0; $i < 3; $i++) { // Cambia 10 al número deseado de registros
            $listPaquetes[] = [
                'entrada_id' => $ids_entrada[array_rand($ids_entrada)],
            ];
        }

        // Insertar los datos en la tabla "asociado_tiposervicio"
        DB::table('paquete')->insert($listPaquetes);
    }
}
