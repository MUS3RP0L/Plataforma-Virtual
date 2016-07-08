<?php

use Illuminate\Database\Seeder;

class BreakdownTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->createBreakdowns();

        Eloquent::reguard();
    }

    private function createBreakdowns()
    {
        $statuses = [
            
            ['id' => '1', 'code' => '1', 'name' => 'DISPONIBILIDAD'],// Servicio Disponibilidad *

            ['id' => '2', 'code' => '2', 'name' => 'DIR NAL POFOMA'],//Servicio 

            ['id' => '3', 'code' => '3', 'name' => 'ITEM CERO'],//Comisión * 

            ['id' => '4', 'code' => '5', 'name' => 'BAT. SEG. FISICA PRIVADA'],//Servicio Batallón *

            ['id' => '5', 'code' => '6', 'name' => 'JUZGADOS POLICIALES - UNIDAD C.C. Y FAMILIAR'],//Servicio

            ['id' => '6', 'code' => '8', 'name' => 'ESCUADRON DE SEG. LOS PUMAS'],//Servicio

            ['id' => '7', 'code' => '9', 'name' => 'DIR NAL SEG. PENITENCIARIA'],//Servicio

            ['id' => '8', 'code' => '0', 'name' => ''],//Servicio

            ['id' => '9', 'code' => '4', 'name' => ''],//
            ['id' => '10', 'code' => '7', 'name' => '']//

        ];

        foreach ($statuses as $status) {

                Muserpol\Breakdown::create($status);
            
        }
    }
}
