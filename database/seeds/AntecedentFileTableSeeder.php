<?php

use Illuminate\Database\Seeder;

class AntecedentFileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->createAntecedent_files();

        Eloquent::reguard();
    }

    private function createAntecedent_files()
    {
        $statuses = [
            ['id' => '1', 'name' => 'ANTICIPO FONDO DE RETIRO POLICIAL(LETRA"A"/LETRA"C")','shortened' =>'FRP-ANT'],
            ['id' => '2', 'name' => 'FONDO DE RETIRO POR JUBILACIÓN','shortened' => 'FRP-JUB'],
            ['id' => '3', 'name' => 'FONDO DE RETIRO POLICIAL Y CUOTA MORTUORIA','shortened' => 'FRP-CM'],
            ['id' => '4', 'name' => 'FONDO DE RETIRO VOLUNTARIO(A)', 'shortened' => 'FRP-RV'],
            ['id' => '5', 'name' => 'FONDO DE RETIRO FORZOSO', 'shortened' => 'FRP-RF'],
            ['id' => '6', 'name' => 'CUOTA MORTUORIA CONYUGUE FALLECIDA(O)', 'shortened' => 'CM-CF'],
            ['id' => '7', 'name' => 'CUOTA MORTUORIA TITULAR FALLECIDO(A)', 'shortened' => 'CM-TF'],
            ['id' => '8', 'name' => 'AUXILIO MORTUORIO TITULAR FALLECIDO(A)', 'shortened' => 'AM-TF'],
            ['id' => '9', 'name' => 'AUXILIO MORTUORIO CONYUGUE FALLECIDA', 'shortened' => 'AM-CF'],            
            ['id' => '10', 'name' => 'AUXILIO MORTUORIO VIUDA FALLECIDA', 'shortened' => 'AM-VF'],
            ['id' => '11', 'name' => 'APORTE VOLUNTARIO', 'shortened' => 'A.V.'],
            ['id' => '12', 'name' => 'EXPEDIENTE TRANSITORIO', 'shortened' => 'ET'],

         ];

        foreach ($statuses as $status) {
         
            Muserpol\AntecedentFile::create($status);
            
        }
    }
}
