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
            ['id' => '1', 'cod' => '0', 'name' => ''],
            ['id' => '2', 'cod' => '1', 'name' => 'PASIVOS LA PAZ'],
            ['id' => '3', 'cod' => '2', 'name' => 'DIR NAL POFOMA'],
            ['id' => '4', 'cod' => '3', 'name' => 'ITEM CERO'],
            ['id' => '5', 'cod' => '4', 'name' => ''],
            ['id' => '6', 'cod' => '5', 'name' => 'BAT. SEG. FISICA PRIVADA'],
            ['id' => '7', 'cod' => '6', 'name' => 'JUZGADOS POLICIALES - UNIDAD C.C. Y FAMILIAR'],
            ['id' => '8', 'cod' => '7', 'name' => ''],
            ['id' => '9', 'cod' => '8', 'name' => 'ESCUADRON DE SEG. LOS PUMAS'],
            ['id' => '10', 'cod' => '9', 'name' => 'DIR NAL SEG. PENITENCIARIA']

            
        ];

        foreach ($statuses as $status) {

                Muserpol\PagoType::create($status);
            
        }
    }
}
