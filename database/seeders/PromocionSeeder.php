<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromocionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids_paqueteAsociado = DB::table('paquete_asociado')->pluck('id')->toArray();
        $ids_entrada = DB::table('entrada')->pluck('id')->toArray();

        $listPromocion = [];

        // Generar registros aleatorios vinculando los IDs
        for ($i = 0; $i < 5; $i++) { // Cambia 10 al número deseado de registros
            $promo_descuento = rand(5, 10);
            $listAsociados[] = [
                'promo_descuento' => 1,
                'paq_asoc_id' => $ids_paqueteAsociado[array_rand($ids_paqueteAsociado)],
                'entrada_id' => $ids_entrada[array_rand($ids_entrada)],
            ];
        }

        DB::table('promocion')->insert($listPromocion);
    }
}
