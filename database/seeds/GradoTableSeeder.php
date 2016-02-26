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

            ['id' => '13', 'niv' => '02', 'grad' => '02', 'lit' => 'CORONEL ADMINISTRATIVO', 'abre' => 'CNL. ADM.'],
            ['id' => '14', 'niv' => '02', 'grad' => '03', 'lit' => 'TENIENTE CORONEL ADMINISTRATIVO', 'abre' => 'TCNL. ADM.'],
            ['id' => '15', 'niv' => '02', 'grad' => '04', 'lit' => 'MAYOR ADMINISTRATIVO', 'abre' => 'MY. ADM.'],
            ['id' => '16', 'niv' => '02', 'grad' => '05', 'lit' => 'CAPITAN ADMINISTRATIVO', 'abre' => 'CAP. ADM.'],
            ['id' => '17', 'niv' => '02', 'grad' => '06', 'lit' => 'TENIENTE ADMINISTRATIVO', 'abre' => 'TTE. ADM.'],
            ['id' => '18', 'niv' => '02', 'grad' => '07', 'lit' => 'SUBTENIENTE ADMINISTRATIVO', 'abre' => 'SBTTE. ADM.'],

            ['id' => '19', 'niv' => '03', 'grad' => '08', 'lit' => 'SUBOFICIAL SUPERIOR', 'abre' => 'SOF. SUP.'],
            ['id' => '20', 'niv' => '03', 'grad' => '09', 'lit' => 'SUBOFICIAL MAYOR', 'abre' => 'SOF. MY.'],
            ['id' => '21', 'niv' => '03', 'grad' => '10', 'lit' => 'SUBOFICIAL PRIMERO', 'abre' => 'SOF. 1RO.'],
            ['id' => '22', 'niv' => '03', 'grad' => '11', 'lit' => 'SUBOFICIAL SEGUNDO', 'abre' => 'SOF. 2DO.'],
            ['id' => '23', 'niv' => '03', 'grad' => '12', 'lit' => 'SARGENTO PRIMERO', 'abre' => 'SGTO. 1RO.'],
            ['id' => '24', 'niv' => '03', 'grad' => '13', 'lit' => 'SARGENTO SEGUNDO', 'abre' => 'SGTO. 2DO.'],
            ['id' => '25', 'niv' => '03', 'grad' => '14', 'lit' => 'CABO', 'abre' => 'CBO.'],
            ['id' => '26', 'niv' => '03', 'grad' => '15', 'lit' => 'POLICIA', 'abre' => 'POL.'],

            ['id' => '27', 'niv' => '04', 'grad' => '08', 'lit' => 'SUBOFICIAL SUPERIOR ADMINISTRATIVO', 'abre' => 'SOF. SUP. ADM.'],
            ['id' => '28', 'niv' => '04', 'grad' => '09', 'lit' => 'SUBOFICIAL MAYOR ADMINISTRATIVO', 'abre' => 'SOF. MY. ADM.'],
            ['id' => '29', 'niv' => '04', 'grad' => '10', 'lit' => 'SUBOFICIAL PRIMERO ADMINISTRATIVO', 'abre' => 'SOF. 1RO. ADM.'],
            ['id' => '30', 'niv' => '04', 'grad' => '11', 'lit' => 'SUBOFICIAL SEGUNDO ADMINISTRATIVO', 'abre' => 'SOF. 2DO. ADM.'],
            ['id' => '31', 'niv' => '04', 'grad' => '12', 'lit' => 'SARGENTO PRIMERO ADMINISTRATIVO', 'abre' => 'SGTO. 1RO. ADM.'],
            ['id' => '32', 'niv' => '04', 'grad' => '13', 'lit' => 'SARGENTO SEGUNDO ADMINISTRATIVO', 'abre' => 'SGTO. 2DO. ADM.'],
            ['id' => '33', 'niv' => '04', 'grad' => '14', 'lit' => 'CABO ADMINISTRATIVO', 'abre' => 'CBO. ADM.'],
            ['id' => '34', 'niv' => '04', 'grad' => '16', 'lit' => 'POLICIA ADMINISTRATIVO', 'abre' => 'POL. ADM.']
        ];

        foreach ($statuses as $status) {

                Muserpol\Grado::create($status);
            
        }
    }
}
