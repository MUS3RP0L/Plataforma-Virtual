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
        $this->call(DepartamentoTableSeeder::class);
        $this->call(AfiTypeTableSeeder::class);
        $this->call(IpcTasasTableSeeder::class);
        $this->call(AporTasasTableSeeder::class);
        $this->call(SueldosTableSeeder::class);
        $this->call(CategoriasTableSeeder::class);
        $this->call(AporteTypeTableSeeder::class);
        $this->call(PagoTypesTableSeeder::class);
        $this->call(DesgloseTableSeeder::class);
        $this->call(UnidadTableSeeder::class);
        $this->call(SoliTypeSeeder::class);

        Model::reguard();
    }
}
