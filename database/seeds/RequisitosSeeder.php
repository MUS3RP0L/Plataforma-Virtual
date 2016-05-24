<?php

use Illuminate\Database\Seeder;

class RequisitosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->createRequisito();

        Eloquent::reguard();
    }

    private function createRequisito()
    {
        $statuses = [
            ['id' => '1', 'name' => 'Deposito de Bs. 25.- en cuenta N° 1-13809229 del Banco Unión a para el canje de formulario y Carpeta.'],
            ['id' => '2', 'name' => 'Solicitud dirigida a la Dirección General Ejecutiva.'],
            ['id' => '3', 'name' => 'Fotocopia simple de Cédula de Identidad.'],
            ['id' => '4', 'name' => 'Certificado de nacimiento original y actualizado.'],
            ['id' => '5', 'name' => 'Memorandum de Agradecimiento de Servicios otorgado por el Comando General de la Policía Boliviana (Original o Fotocopia Legalizada).'],
            ['id' => '6', 'name' => 'Certificado de Haberes otorgado por el Comando General de la Policía Boliviana (Papeletas de haberes Original O Fotocopia Legalizada) de los últimos 36 meses de pago.'],
            ['id' => '7', 'name' => 'Reposición de Obrados Desglosado (Original) o Certificado de Años de Servicio (Copias Originales o fotocopia legalizada), emitidos por el C.A.S. desde la fecha de ingreso a la fecha de retiro definitivo de la institución policial de acuerdo a Memorandum de Agradecimiento.'],
            ['id' => '8', 'name' => 'Computo General Desglosado de Años de Servicio otorgado por el Comando General de la Policía Boliviana (Original).']
        ];

        foreach ($statuses as $status) {
         
            Muserpol\Requisito::create($status);
            
        }
    }
}
