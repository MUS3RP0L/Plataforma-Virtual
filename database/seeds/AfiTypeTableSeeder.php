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
        Eloquent::unguard();

        $this->createAfiType();
        $this->createAfiState();

        Eloquent::reguard();
    }

    private function createAfiType()
    {
        $statuses = [
            ['id' => '1', 'name' => 'ACTIVO'],
            ['id' => '2', 'name' => 'PASIVO'],
            ['id' => '3', 'name' => 'EXCLUIDO'],
            ['id' => '4', 'name' => 'BAJA']
        ];

        foreach ($statuses as $status) {

                Muserpol\AfiType::create($status);
            
        }
    }


    private function createAfiState()
    {
        $statuses = [
            ['id' => '1', 'afi_type_id' => '1', 'name' => 'Servicio Comando'],
            ['id' => '2', 'afi_type_id' => '1', 'name' => 'Servicio Batallón'],
            ['id' => '3', 'afi_type_id' => '1', 'name' => 'Comisión'],
            ['id' => '4', 'afi_type_id' => '1', 'name' => 'Disponibilidad'],

            ['id' => '5', 'afi_type_id' => '2', 'name' => 'Fallecido'],
            ['id' => '6', 'afi_type_id' => '2', 'name' => 'Jubilado'],
            ['id' => '7', 'afi_type_id' => '2', 'name' => 'Jubilación por Invalidez'],

            ['id' => '8', 'afi_type_id' => '3', 'name' => 'Juridico'],
            ['id' => '9', 'afi_type_id' => '3', 'name' => 'Financiero'],
            ['id' => '10', 'afi_type_id' => '3', 'name' => 'Inversiones'],
            ['id' => '12', 'afi_type_id' => '4', 'name' => 'Forzosa'],
            ['id' => '13', 'afi_type_id' => '4', 'name' => 'Voluntaria'],
            ['id' => '14', 'afi_type_id' => '4', 'name' => 'Temporal']


        ];

        foreach ($statuses as $status) {

                Muserpol\AfiState::create($status);
            
        }
    }
}
