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
        $this->createStateType();
        $this->createAfiState();

        Eloquent::reguard();
    }

    private function createAffiliate_types()
    {
        $statuses = [
            ['id' => '1', 'name' => 'COMANDO'],
            ['id' => '2', 'name' => 'BATALLÓN']
        ];

        foreach ($statuses as $status) {

            Muserpol\AffiliateType::create($status);    
        }
    }
    private function createState_types()
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

    private function createAffiliate_states()
    {
        $statuses = [
            ['id' => '1', 'state_type_id' => '1', 'name' => 'SERVICIO'],
            ['id' => '2', 'state_type_id' => '1', 'name' => 'COMISIÓN'],
            ['id' => '3', 'state_type_id' => '1', 'name' => 'DISPONIBILIDAD'],

            ['id' => '4', 'state_type_id' => '2', 'name' => 'FALLECIDO'],
            ['id' => '5', 'state_type_id' => '2', 'name' => 'JUBILADO'],
            ['id' => '6', 'state_type_id' => '2', 'name' => 'JUBILADO INVALIDEZ'],

            ['id' => '7', 'state_type_id' => '3', 'name' => 'BAJA FORZOSA'],
            ['id' => '8', 'state_type_id' => '3', 'name' => 'BAJA VOLUNTARIA'],
            ['id' => '9', 'state_type_id' => '3', 'name' => 'BAJA TEMPORAL']
        ];

        foreach ($statuses as $status) {

            Muserpol\AffiliateState::create($status);    
        }
    }
}
