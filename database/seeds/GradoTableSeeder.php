<?php

use Illuminate\Database\Seeder;

class GradoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grados')->truncate();

        Eloquent::unguard();

        $this->createGrados();

        Eloquent::reguard();
    }

    private function createGrados()
    {
        $statuses = [
            ['id' => '1', 'niv' => '00', 'grad' => '00', 'lit' => 'COMANDANTE GRAL', 'abre' => 'CMTE. GRAL.'],
            ['id' => '2', 'niv' => '00', 'grad' => '01', 'lit' => 'COMANDANTE GRAL', 'abre' => 'CMTE. GRAL.'],
            ['id' => '3', 'niv' => '00', 'grad' => '02', 'lit' => 'SUBCOMANDANTE', 'abre' => 'CMTE. GRAL.'],
            ['id' => '4', 'niv' => '00', 'grad' => '03', 'lit' => 'INSPECTOR GENERAL', 'abre' => 'INSP. GRAL.'],
            ['id' => '5', 'niv' => '00', 'grad' => '04', 'lit' => 'DIRECTOR GENERAL', 'abre' => 'DIR. GRAL.'],

            ['id' => '6', 'niv' => '01', 'grad' => '01', 'lit' => 'CORONEL CON SUELDO DE GENERAL', 'abre' => 'CNL.'],
            ['id' => '7', 'niv' => '01', 'grad' => '02', 'lit' => 'CORONEL', 'abre' => 'CNL.'],      
            ['id' => '8', 'niv' => '01', 'grad' => '03', 'lit' => 'TENIENTE CORONEL', 'abre' => 'TCNL.'],
            ['id' => '9', 'niv' => '01', 'grad' => '04', 'lit' => 'MAYOR', 'abre' => 'MY.'],
            ['id' => '10', 'niv' => '01', 'grad' => '05', 'lit' => 'CAPITAN', 'abre' => 'GRAL.'],
            ['id' => '11', 'niv' => '01', 'grad' => '06', 'lit' => 'TENIENTE', 'abre' => 'TTE.'],
            ['id' => '12', 'niv' => '01', 'grad' => '07', 'lit' => 'SUBTENIENTE', 'abre' => 'SBTTE.'],
        ];

        foreach ($statuses as $status) {

                App\Grado::create($status);
            
        }
    }
}
