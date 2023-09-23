<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids_vuelos = DB::table('vuelo')->pluck('id')->toArray();

        $listAsientos = [];

        // Generar registros aleatorios vinculando los IDs
        foreach ($ids_vuelos as $vueloId) {

            for ($i = 0; $i < 100; $i++) {
                $listAsientos[] = [
                    'asi_numero' => $i+1,
                    'asi_estado' => 0,
                    'vue_id' => $vueloId
                ];
            }
        }

        DB::table('asiento')->insert($listAsientos);
    }
}
