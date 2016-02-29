<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(GradoTableSeeder::class);
        $this->call(UnidadTableSeeder::class);
        $this->call(DepartamentoTableSeeder::class);
        $this->call(AfiTypeTableSeeder::class);
        $this->call(MunicipiosTableSeeder::class);
        $this->call(IpcTasasTableSeeder::class);

        Model::reguard();
    }
}
