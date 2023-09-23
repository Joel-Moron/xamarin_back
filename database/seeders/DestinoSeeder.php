<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids_pais = DB::table('pais')->pluck('id')->toArray();

        $listDestino = [];

        for ($i = 0; $i < 30; $i++) {
            $listDestino[] = [
                'precio' => rand(300, 500),
                'pais_id' => $ids_pais[array_rand($ids_pais)]
            ];
        }

        DB::table('destino')->insert($listDestino);
    }
}
