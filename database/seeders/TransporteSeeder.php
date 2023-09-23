<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids_asociados = DB::table('asociado')->pluck('id')->toArray();

        $listTransporte = [];

        foreach ($ids_asociados as $id) {
            $listTransporte[] = [
                'tra_ubicacion' => 'hubicacion ' . $id,
                'tra_precio' => rand(20000, 30000) / 100,
                'aso_id' => $id
            ];
        }

        DB::table('transporte')->insert($listTransporte);
    }
}
