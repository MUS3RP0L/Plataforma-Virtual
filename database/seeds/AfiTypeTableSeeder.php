<?php

use Illuminate\Database\Seeder;

class AfiTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \DB::table('afi_types')->truncate();

        Eloquent::unguard();

        $this->createAfiType();

        Eloquent::reguard();
    }

    private function createAfiType()
    {
        $statuses = [
            ['id' => '1', 'type' => 'Activo', 'status' => 'Servicio'],
            ['id' => '2', 'type' => 'Activo', 'status' => 'Comisión'],
            ['id' => '3', 'type' => 'Pasivo', 'status' => 'Jubilado'],
            ['id' => '4', 'type' => 'Pasivo', 'status' => 'Fallecido'],
            ['id' => '5', 'type' => 'Otro', 'status' => 'Baja Forzosa'],
            ['id' => '6', 'type' => 'Otro', 'status' => 'Baja Voluntaria'],
            ['id' => '7', 'type' => 'Otro', 'status' => 'Jubilación por Invalidez'],
            ['id' => '8', 'type' => 'Otro', 'status' => 'Excluido Juridico'],
            ['id' => '9', 'type' => 'Otro', 'status' => 'Excluido Financiero'],
            ['id' => '10', 'type' => 'Otro', 'status' => 'Excluido Inversiones']
        ];

        foreach ($statuses as $status) {

                Muserpol\AfiType::create($status);
            
        }
    }
}
