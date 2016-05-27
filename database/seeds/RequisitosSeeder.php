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
            ['id' => '1', 'modalidad_id' => '1', 'name' => 'Deposito de Bs. 25.- en cuenta N° 1-13809229 del Banco Unión a para el canje de formulario y Carpeta.'],
            ['id' => '2', 'modalidad_id' => '1', 'name' => 'Solicitud dirigida a la Dirección General Ejecutiva.'],
            ['id' => '3', 'modalidad_id' => '1', 'name' => 'Fotocopia simple de Cédula de Identidad.'],
            ['id' => '4', 'modalidad_id' => '1', 'name' => 'Certificado de nacimiento original y actualizado.'],
            ['id' => '5', 'modalidad_id' => '1', 'name' => 'Memorandum de Agradecimiento de Servicios otorgado por el Comando General de la Policía Boliviana (Original o Fotocopia Legalizada).'],
            ['id' => '6', 'modalidad_id' => '1', 'name' => 'Certificado de Haberes otorgado por el Comando General de la Policía Boliviana (Papeletas de haberes Original O Fotocopia Legalizada) de los últimos 36 meses de pago.'],
            ['id' => '7', 'modalidad_id' => '1', 'name' => 'Reposición de Obrados Desglosado (Original) o Certificado de Años de Servicio (Copias Originales o fotocopia legalizada), emitidos por el C.A.S. desde la fecha de ingreso a la fecha de retiro definitivo de la institución policial de acuerdo a Memorandum de Agradecimiento.'],
            ['id' => '8', 'modalidad_id' => '1','name' => 'Computo General Desglosado de Años de Servicio otorgado por el Comando General de la Policía Boliviana (Original).'],

            ['id' => '9', 'modalidad_id' => '2', 'name' => 'Deposito de Bs. 25.- en cuenta N° 1-13809229 del Banco Unión a para el canje de formulario y Carpeta.'],
            ['id' => '10', 'modalidad_id' => '2', 'name' => 'Solicitud dirigida a la Dirección General Ejecutiva.'],
            ['id' => '11', 'modalidad_id' => '2', 'name' => 'Fotocopia simple de Cédula de Identidad.'],
            ['id' => '12', 'modalidad_id' => '2', 'name' => 'Certificado de nacimiento original y actualizado.'],
            ['id' => '13', 'modalidad_id' => '2', 'name' => 'Memorandum de Agradecimiento de Servicios otorgado por el Comando General de la Policía Boliviana (Original o Fotocopia Legalizada).'],
            ['id' => '14', 'modalidad_id' => '2', 'name' => 'Certificado de Haberes otorgado por el Comando General de la Policía Boliviana (Papeletas de haberes Original O Fotocopia Legalizada) de los últimos 36 meses de pago.'],
            ['id' => '15', 'modalidad_id' => '2', 'name' => 'Reposición de Obrados Desglosado (Original) o Certificado de Años de Servicio (Copias Originales o fotocopia legalizada), emitidos por el C.A.S. desde la fecha de ingreso a la fecha de retiro definitivo de la institución policial de acuerdo a Memorandum de Agradecimiento.'],
            ['id' => '16', 'modalidad_id' => '2','name' => 'Computo General Desglosado de Años de Servicio otorgado por el Comando General de la Policía Boliviana (Original).']

            ['id' => '17', 'modalidad_id' => '3', 'name' => 'Deposito de Bs. 25.- en cuenta N° 1-13809229 del Banco Unión a para el canje de formulario y Carpeta.'],
            ['id' => '18', 'modalidad_id' => '3', 'name' => 'Solicitud dirigida a la Dirección General Ejecutiva.'],
            ['id' => '19', 'modalidad_id' => '3', 'name' => 'Fotocopia simple de Cédula de Identidad.'],
            ['id' => '20', 'modalidad_id' => '3', 'name' => 'Certificado de nacimiento original y actualizado.'],
            ['id' => '21', 'modalidad_id' => '3', 'name' => 'Memorandum de Agradecimiento de Servicios otorgado por el Comando General de la Policía Boliviana (Original o Fotocopia Legalizada).'],
            ['id' => '22', 'modalidad_id' => '3', 'name' => 'Certificado de Haberes otorgado por el Comando General de la Policía Boliviana (Papeletas de haberes Original O Fotocopia Legalizada) de los últimos 36 meses de pago.'],
            ['id' => '23', 'modalidad_id' => '3', 'name' => 'Reposición de Obrados Desglosado (Original) o Certificado de Años de Servicio (Copias Originales o fotocopia legalizada), emitidos por el C.A.S. desde la fecha de ingreso a la fecha de retiro definitivo de la institución policial de acuerdo a Memorandum de Agradecimiento.'],
            ['id' => '24', 'modalidad_id' => '3','name' => 'Computo General Desglosado de Años de Servicio otorgado por el Comando General de la Policía Boliviana (Original).']

            ['id' => '25', 'modalidad_id' => '4', 'name' => 'Deposito de Bs. 25.- en cuenta N° 1-13809229 del Banco Unión a para el canje de formulario y Carpeta.'],
            ['id' => '26', 'modalidad_id' => '4', 'name' => 'Solicitud dirigida a la Dirección Ejecutiva.'],
            ['id' => '27', 'modalidad_id' => '4', 'name' => 'Fotocopia simple de Cédula de Identidad del Afiliado fallecido.'],
            ['id' => '28', 'modalidad_id' => '4', 'name' => 'Certificado de Defunción original y actualizado.'],
            ['id' => '29', 'modalidad_id' => '4', 'name' => 'Certificado de nacimiento original y actualizado del fallecido.'],
            ['id' => '30', 'modalidad_id' => '4', 'name' => 'Certificado de nacimiento original y actualizado del/la cónyugue y los hijos beneficiarios.'],
            ['id' => '31', 'modalidad_id' => '4', 'name' => 'Certificado de matrimonio original y actualizado o Declaración de Matrimonio de Hecho o Unión Libre.'],
            ['id' => '32', 'modalidad_id' => '4','name' => 'Declaratoria de Herederos en original o fotocopia legalizada.']
            ['id' => '33', 'modalidad_id' => '4', 'name' => 'Certificación de verificación de descendencia y partidas matrimoniales emitida por el SERECI.'],
            ['id' => '34', 'modalidad_id' => '4', 'name' => 'Fotocopia simple de Cédula de Identidad del /la solicitante y todos los beneficiarios.'],
            ['id' => '35', 'modalidad_id' => '4', 'name' => 'Formulario (AVC-04) de afiliación a la caja nacional de salud (Original o fotocopia legalizada).'],
            ['id' => '36', 'modalidad_id' => '4', 'name' => 'Certificado de Haberes otorgado por el Comando General de la Policía Boliviana (Papeletas de haberes Original O Fotocopia Legalizada) de los últimos 36 meses de pago.'],
            ['id' => '37', 'modalidad_id' => '4', 'name' => 'Reposición de Obrados Desglosado (Original) o Certificado de Años de Servicio (Copias Originales o fotocopia legalizada), emitidos por el C.A.S. desde la fecha de ingreso a la fecha de fallecimiento.'],
            ['id' => '38', 'modalidad_id' => '4', 'name' => 'Computo General Desglosado de Años de Servicio otorgado por el Comando General de la Policía Boliviana (Original).'],
            ['id' => '39', 'modalidad_id' => '4', 'name' => 'Certificado de Defunción original y actualizado ó certificado de obito en caso de fallecimiento de los beneficiarios del fallecido.'],
            
            ['id' => '40', 'modalidad_id' => '5', 'name' => 'Deposito de Bs. 25.- en cuenta N° 1-13809229 del Banco Unión a para el canje de formulario y Carpeta.'],
            ['id' => '41', 'modalidad_id' => '5', 'name' => 'Solicitud dirigida a la Dirección General Ejecutiva.'],
            ['id' => '42', 'modalidad_id' => '5', 'name' => 'Fotocopia simple de Cédula de Identidad del solicitante.'],
            ['id' => '43', 'modalidad_id' => '5', 'name' => 'Fotocopia simple de Cédula de Identidad del titular prestatario.'],
            ['id' => '44', 'modalidad_id' => '5', 'name' => 'Memorandum de Baja otorgado por el Comando General de la Policía Boliviana o Resolución Administrativa de Baja Definitiva (Fotocopia legalizada).'],
            ['id' => '45', 'modalidad_id' => '5', 'name' => 'Certificado de Haberes otorgado por el Comando General de la Policía Boliviana(Papeletas de haberes Original O Fotocopia Legalizada) de los últimos 36 meses de pago.'],
            ['id' => '46', 'modalidad_id' => '5', 'name' => 'Computo General Desglosado de Años de Servicio otorgado por el Comando General de la Policía Boliviana (Original).'],
            ['id' => '47', 'modalidad_id' => '5','name' => 'En caso del fallecimineto del titular prestatario debera presentar certificado de defuncion en original y actualizado.'],



        ];

        foreach ($statuses as $status) {
         
            Muserpol\Requisito::create($status);
            
        }
    }
}
