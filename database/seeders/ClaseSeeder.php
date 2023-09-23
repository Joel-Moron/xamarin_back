<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids_destino = DB::table('destino')->pluck('id')->toArray();

        $listClase = [];

        // Generar registros aleatorios vinculando los IDs
        foreach ($ids_destino as $destinoId) {
            $pre_vip = rand(150, 250);
            $pre_fachero = rand(250, 300);

            $listClase[] = [
                'clas_nombre' => 'pobre',
                'clas_precio' => 0,
                'des_id' => $destinoId,
            ];

            $listClase[] = [
                'clas_nombre' => 'vip',
                'clas_precio' => $pre_vip,
                'des_id' => $destinoId,
            ];

            $listClase[] = [
                'clas_nombre' => 'fachero',
                'clas_precio' => $pre_fachero,
                'des_id' => $destinoId,
            ];
        }

        DB::table('clase')->insert($listClase);
    }
}
