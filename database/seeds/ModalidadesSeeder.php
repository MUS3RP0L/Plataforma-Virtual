<?php

use Illuminate\Database\Seeder;

class ModalidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->createModalidad();

        Eloquent::reguard();
    }

    private function createModalidad()
    {
        $statuses = [
            ['id' => '1', 'name' => 'Retiro por Baja Forzosa'],
            ['id' => '2', 'name' => 'Retiro por Baja Voluntaria'],
            ['id' => '3', 'name' => 'Retiro por Jubilación'],
            ['id' => '4', 'name' => 'Retiro por fallecimiento'],
        ];

        foreach ($statuses as $status) {
         
            Muserpol\Modalidad::create($status);
            
        }
    }
}
