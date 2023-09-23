<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AsociadoSeeder::class);
        $this->call(PaisSeeder::class);
        $this->call(DestinoSeeder::class);
        $this->call(ClaseSeeder::class);
        $this->call(VueloSeeder::class);
        $this->call(AsientoSeeder::class);
        $this->call(DestinoVueloSeeder::class);
        $this->call(HotelSeeder::class);
        $this->call(RestauranteSeeder::class);
        $this->call(TransporteSeeder::class);
        $this->call(PaqueteSeeder::class);
        
    }
}
