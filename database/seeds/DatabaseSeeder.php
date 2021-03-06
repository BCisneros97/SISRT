<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ClientesTableSeeder::class);
        $this->call(ProveedoresTableSeeder::class);
        $this->call(PiezasTableSeeder::class);
        $this->call(ProformasTableSeeder::class);
        $this->call(ServiciosTableSeeder::class);
        $this->call(Factura_ServiciosTableSeeder::class);
        $this->call(Factura_ComprasTableSeeder::class);      
    }
}
