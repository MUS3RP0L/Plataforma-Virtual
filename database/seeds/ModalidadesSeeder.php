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
            ['id' => '1', 'abre' => 'BAJA FORZOSA', 'name' => 'RETIRO POR BAJA FORZOSA'],
            ['id' => '2', 'abre' => 'BAJA VOLUNTARIA', 'name' => 'RETIRO POR BAJA VOLUNTARIA'],
            ['id' => '3', 'abre' => 'JUBILACIÓN', 'name' => 'RETIRO POR JUBILACIÓN'],
            ['id' => '4', 'abre' => 'FALLECIMIENTO', 'name' => 'RETIRO POR FALLECIMIENTO'],
            ['id' => '5', 'abre' => 'DEVOLUCIÓN', 'name' => 'DEVOLUCIÓN DE DESCUENTOS AL GARANTE']
        ];

        foreach ($statuses as $status) {
         
            Muserpol\Modalidad::create($status);
        }
    }
}
