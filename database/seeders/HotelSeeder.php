<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids_asociados = DB::table('asociado')->pluck('id')->toArray();

        $listHotel = [];

        foreach ($ids_asociados as $id) {
            $listHotel[] = [
                'hot_ubicacion' => 'hubicacion ' . $id,
                'hot_precio' => rand(20000, 30000) / 100,
                'aso_id' => $id
            ];
        }

        DB::table('hotel')->insert($listHotel);
    }
}
