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
            ['id' => '1', 'abre' => 'Baja Forzosa', 'name' => 'Retiro por Baja Forzosa'],
            ['id' => '2', 'abre' => 'Baja Voluntaria', 'name' => 'Retiro por Baja Voluntaria'],
            ['id' => '3', 'abre' => 'Jubilación', 'name' => 'Retiro por Jubilación'],
            ['id' => '4', 'abre' => 'fallecimiento', 'name' => 'Retiro por fallecimiento'],
            ['id' => '5', 'abre' => 'Devolución', 'name' => 'Devolución de Descuentos al Garante']
        ];

        foreach ($statuses as $status) {
         
            Muserpol\Modalidad::create($status);
        }
    }
}
