<?php

use Illuminate\Database\Seeder;

class PrestacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->createPrestaciones();

        Eloquent::reguard();
    }

    private function createPrestacion()
    {
        $statuses = [
            ['id' => '1', 'name' => 'ANTICIPO FONDO DE RETIRO POLICIAL(LETRA"A"/LETRA"C")','sigla' =>'FRP-ANT'],
            ['id' => '2', 'name' => 'FONDO DE RETIRO POR JUBILACIÓN','sigla' => 'FRP-JUB'],
            ['id' => '3', 'name' => 'FONDO DE RETIRO POLICIAL Y CUOTA MORTUORIA','sigla' => 'FRP-CM'],
            ['id' => '4', 'name' => 'FONDO DE RETIRO VOLUNTARIO(A)', 'sigla' => 'FRP-RV'],
            ['id' => '5', 'name' => 'FONDO DE RETIRO FORZOSO', 'sigla' => 'FRP-RF'],
            ['id' => '6', 'name' => 'CUOTA MORTUORIA CONYUGUE FALLECIDA(O)', 'sigla' => 'CM-CF'],
            ['id' => '7', 'name' => 'CUOTA MORTUORIA TITULAR FALLECIDO(A)', 'sigla' => 'CM-TF'],
            ['id' => '8', 'name' => 'AUXILIO MORTUORIO TITULAR FALLECIDO(A)', 'sigla' => 'AM-TF'],
            ['id' => '9', 'name' => 'AUXILIO MORTUORIO CONYUGUE FALLECIDA', 'sigla' => 'AM-CF'],            
            ['id' => '10', 'name' => 'AUXILIO MORTUORIO VIUDA FALLECIDA', 'sigla' => 'AM-VF'],
            ['id' => '11', 'name' => 'APORTE VOLUNTARIO', 'sigla' => 'A.V.'],
            ['id' => '12', 'name' => 'EXPEDIENTE TRANSITORIO', 'sigla' => 'ET'],

         ];

        foreach ($statuses as $status) {
         
            Muserpol\Prestacion::create($status);
            
        }
    }
}
