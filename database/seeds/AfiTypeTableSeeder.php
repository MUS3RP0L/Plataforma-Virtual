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
        $this->createStateType();

        Eloquent::reguard();
    }

    private function createAfiType()
    {
        $statuses = [
            ['id' => '1', 'name' => 'COMANDO'],
            ['id' => '2', 'name' => 'BATALLÓN']
        ];

        foreach ($statuses as $status) {

            Muserpol\AfiType::create($status);    
        }
    }
    private function createStateType()
    {
        $statuses = [
            ['id' => '1', 'name' => 'ACTIVO'],
            ['id' => '2', 'name' => 'PASIVO'],
            ['id' => '3', 'name' => 'BAJA']
        ];

        foreach ($statuses as $status) {

            Muserpol\StateType::create($status);    
        }
    }

    private function createAfiState()
    {
        $statuses = [
            ['id' => '1', 'state_type_id' => '1', 'name' => 'Servicio'],
            ['id' => '2', 'state_type_id' => '1', 'name' => 'Comisión'],
            ['id' => '3', 'state_type_id' => '1', 'name' => 'Disponibilidad'],

            ['id' => '4', 'state_type_id' => '2', 'name' => 'Fallecido'],
            ['id' => '5', 'state_type_id' => '2', 'name' => 'Jubilado'],
            ['id' => '6', 'state_type_id' => '2', 'name' => 'Jubilación por Invalidez'],

            ['id' => '7', 'state_type_id' => '3', 'name' => 'Forzosa'],
            ['id' => '8', 'state_type_id' => '3', 'name' => 'Voluntaria'],
            ['id' => '9', 'state_type_id' => '3', 'name' => 'Temporal']
        ];

        foreach ($statuses as $status) {

            Muserpol\AfiState::create($status);    
        }
    }
}
