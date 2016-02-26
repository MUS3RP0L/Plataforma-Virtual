<?php

use Illuminate\Database\Seeder;

class DepartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('afi_types')->truncate();

        Eloquent::unguard();

        $this->createAfiType();

        Eloquent::reguard();
    }

    private function createAfiType()
    {
        $statuses = [
            ['id' => '1', 'name' => 'Activo', 'status' => 'Servicio'],
            ['id' => '2', 'name' => 'Activo', 'status' => 'Comisión'],
            ['id' => '3', 'name' => 'Pasivo', 'status' => 'Jubilado'],
            ['id' => '4', 'name' => 'Pasivo', 'status' => 'Fallecido'],
            ['id' => '5', 'name' => 'Otro', 'status' => 'Baja Forzosa'],
            ['id' => '6', 'name' => 'Otro', 'status' => 'Baja Voluntaria']
            ['id' => '7', 'name' => 'Otro', 'status' => 'Jubilación por Invalidez'],
            ['id' => '8', 'name' => 'Otro', 'status' => 'Excluido Juridico'],
            ['id' => '9', 'name' => 'Otro', 'status' => 'Excluido Financiero'],
            ['id' => '10', 'name' => 'Otro', 'status' => 'Excluido Inversiones']
        ];

        foreach ($statuses as $status) {

                Muserpol\Departamento::create($status);
            
        }
    }
}
