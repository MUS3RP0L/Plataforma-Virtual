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
        $this->createAfiState();

        Eloquent::reguard();
    }

    private function createAfiType()
    {
        $statuses = [
            ['id' => '1', 'name' => 'Activo'],
            ['id' => '2', 'name' => 'Pasivo'],
            ['id' => '3', 'name' => 'Otro']
        ];

        foreach ($statuses as $status) {

                Muserpol\AfiType::create($status);
            
        }
    }


    private function createAfiState()
    {
        $statuses = [
            ['id' => '1', 'afi_type_id' => '1', 'name' => 'Servicio'],
            ['id' => '2', 'afi_type_id' => '1', 'name' => 'Comisión'],
            ['id' => '3', 'afi_type_id' => '2', 'name' => 'Jubilado'],
            ['id' => '4', 'afi_type_id' => '2', 'name' => 'Fallecido'],
            ['id' => '5', 'afi_type_id' => '3', 'name' => 'Baja Forzosa'],
            ['id' => '6', 'afi_type_id' => '3', 'name' => 'Baja Voluntaria'],
            ['id' => '7', 'afi_type_id' => '3', 'name' => 'Jubilación por Invalidez'],
            ['id' => '8', 'afi_type_id' => '3', 'name' => 'Excluido Juridico'],
            ['id' => '9', 'afi_type_id' => '3', 'name' => 'Excluido Financiero'],
            ['id' => '10', 'afi_type_id' => '3', 'name' => 'Excluido Inversiones']
        ];

        foreach ($statuses as $status) {

                Muserpol\AfiState::create($status);
            
        }
    }
}
