<?php

use Illuminate\Database\Seeder;

class DesgloseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->createDesglose();

        Eloquent::reguard();
    }

    private function createDesglose()
    {
        $statuses = [
            
            ['id' => '1', 'cod' => '1', 'name' => 'PASIVOS LA PAZ'],// Servicio Disponibilidad Comando *

            ['id' => '2', 'cod' => '2', 'name' => 'DIR NAL POFOMA'],//Servicio 

            ['id' => '3', 'cod' => '3', 'name' => 'ITEM CERO'],//Comisión * 

            ['id' => '4', 'cod' => '5', 'name' => 'BAT. SEG. FISICA PRIVADA'],//Servicio Batallón *

            ['id' => '5', 'cod' => '6', 'name' => 'JUZGADOS POLICIALES - UNIDAD C.C. Y FAMILIAR'],//Servicio

            ['id' => '6', 'cod' => '8', 'name' => 'ESCUADRON DE SEG. LOS PUMAS'],//Servicio

            ['id' => '7', 'cod' => '9', 'name' => 'DIR NAL SEG. PENITENCIARIA'],//Servicio

            ['id' => '8', 'cod' => '0', 'name' => ''],//Servicio

            ['id' => '9', 'cod' => '4', 'name' => ''],//
            ['id' => '10', 'cod' => '7', 'name' => '']//

        ];

        foreach ($statuses as $status) {

                Muserpol\Desglose::create($status);
            
        }
    }
}
