<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DepartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->createDepartamentos();

        Eloquent::reguard();
    }

    private function createDepartamentos()
    {
        $statuses = [
            ['id' => '1', 'name' => 'BENI', 'cod' => 'BN'],
            ['id' => '2', 'name' => 'CHUQUISACA', 'cod' => 'CH'],
            ['id' => '3', 'name' => 'COCHABAMBA', 'cod' => 'CB'],
            ['id' => '4', 'name' => 'LA PAZ', 'cod' => 'LP'],
            ['id' => '5', 'name' => 'ORURO', 'cod' => 'OR'],
            ['id' => '6', 'name' => 'PANDO', 'cod' => 'PN'],
            ['id' => '7', 'name' => 'POTOSÍ', 'cod' => 'PO'],
            ['id' => '8', 'name' => 'SANTA CRUZ', 'cod' => 'SC'],
            ['id' => '9', 'name' => 'TARIJA', 'cod' => 'TJ']

        ];

        foreach ($statuses as $status) {

                Muserpol\Departamento::create($status);
            
        }
    }
}