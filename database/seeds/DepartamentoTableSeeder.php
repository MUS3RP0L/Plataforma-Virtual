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

        // DB::table('departamentos')->truncate();

        Eloquent::unguard();

        $this->createDepartamentos();

        Eloquent::reguard();
    }

        private function createDepartamentos()
    {
        $statuses = [
            ['id' => '1', 'name' => 'Beni', 'cod' => 'BN'],
            ['id' => '2', 'name' => 'Chuquisaca', 'cod' => 'CH'],
            ['id' => '3', 'name' => 'Cochabamba', 'cod' => 'CBBA'],
            ['id' => '4', 'name' => 'La Paz', 'cod' => 'LP'],
            ['id' => '5', 'name' => 'Oruro', 'cod' => 'OR'],
            ['id' => '6', 'name' => 'Pando', 'cod' => 'PN'],
            ['id' => '7', 'name' => 'Potosí', 'cod' => 'PO'],
            ['id' => '8', 'name' => 'Santa Cruz', 'cod' => 'SC'],
            ['id' => '9', 'name' => 'Tarija', 'cod' => 'TJ']

        ];

        foreach ($statuses as $status) {

                Muserpol\Departamento::create($status);
            
        }
    }
}