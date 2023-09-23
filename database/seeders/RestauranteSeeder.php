<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestauranteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids_asociados = DB::table('asociado')->pluck('id')->toArray();

        $listRestaurante = [];

        foreach ($ids_asociados as $id) {
            $listRestaurante[] = [
                'res_ubicacion' => 'hubicacion ' . $id,
                'res_precio' => rand(20000, 30000) / 100,
                'aso_id' => $id
            ];
        }

        DB::table('restaurante')->insert($listRestaurante);
    }
}
