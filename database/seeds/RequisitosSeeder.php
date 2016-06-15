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
            ['id' => '1', 'modalidad_id' => '1', 'abre' => 'Depósito Bancario para el canje de formulario y Carpeta.', 'name' => 'Depósito de Bs. 25.- en cuenta N° 1-13809229 del Banco Unión a para el canje de formulario y Carpeta.'],
            ['id' => '2', 'modalidad_id' => '1', 'abre' => 'Solicitud dirigida a la Dirección General Ejecutiva.', 'name' => 'Solicitud dirigida a la Dirección General Ejecutiva.'],
            ['id' => '3', 'modalidad_id' => '1', 'abre' => 'Fotocopia de Cédula de Identidad.', 'name' => 'Fotocopia simple de Cédula de Identidad.'],
            ['id' => '4', 'modalidad_id' => '1', 'abre' => 'Certificado de nacimiento.', 'name' => 'Certificado de nacimiento original y actualizado.'],
            ['id' => '5', 'modalidad_id' => '1', 'abre' => 'Memorándum de Agradecimiento de Servicios.', 'name' => 'Memorándum de Agradecimiento de Servicios otorgado por el Comando General de la Policía Boliviana (Original o Fotocopia Legalizada).'],
            ['id' => '6', 'modalidad_id' => '1', 'abre' => 'Certificado de Haberes de los últimos 36 meses de pago.', 'name' => 'Certificado de Haberes otorgado por el Comando General de la Policía Boliviana (Papeletas de haberes Original O Fotocopia Legalizada) de los últimos 36 meses de pago.'],
            ['id' => '7', 'modalidad_id' => '1', 'abre' => 'Reposición de Obrados Desglosado o Certificado de Años de Servicio.', 'name' => 'Reposición de Obrados Desglosado (Original) o Certificado de Años de Servicio (Copias Originales o fotocopia legalizada), emitidos por el C.A.S. desde la fecha de ingreso a la fecha de retiro definitivo de la institución policial de acuerdo a Memorándum de Agradecimiento.'],
            ['id' => '8', 'modalidad_id' => '1', 'abre' => 'Computo General Desglosado de Años de Servicio.', 'name' => 'Computo General Desglosado de Años de Servicio otorgado por el Comando General de la Policía Boliviana (Original).'],

            ['id' => '9', 'modalidad_id' => '2', 'abre' => 'Depósito Bancario para el canje de formulario y Carpeta.', 'name' => 'Depósito de Bs. 25.- en cuenta N° 1-13809229 del Banco Unión a para el canje de formulario y Carpeta.'],
            ['id' => '10', 'modalidad_id' => '2', 'abre' => 'Solicitud dirigida a la Dirección General Ejecutiva.', 'name' => 'Solicitud dirigida a la Dirección General Ejecutiva.'],
            ['id' => '11', 'modalidad_id' => '2', 'abre' => 'Fotocopia de Cédula de Identidad.', 'name' => 'Fotocopia simple de Cédula de Identidad.'],
            ['id' => '12', 'modalidad_id' => '2', 'abre' => 'Certificado de nacimiento.', 'name' => 'Certificado de nacimiento original y actualizado.'],
            ['id' => '13', 'modalidad_id' => '2', 'abre' => 'Memorándum de Agradecimiento de Servicios.', 'name' => 'Memorándum de Agradecimiento de Servicios otorgado por el Comando General de la Policía Boliviana (Original o Fotocopia Legalizada).'],
            ['id' => '14', 'modalidad_id' => '2', 'abre' => 'Certificado de Haberes de los últimos 36 meses de pago.', 'name' => 'Certificado de Haberes otorgado por el Comando General de la Policía Boliviana (Papeletas de haberes Original O Fotocopia Legalizada) de los últimos 36 meses de pago.'],
            ['id' => '15', 'modalidad_id' => '2', 'abre' => 'Reposición de Obrados Desglosado o Certificado de Años de Servicio.', 'name' => 'Reposición de Obrados Desglosado (Original) o Certificado de Años de Servicio (Copias Originales o fotocopia legalizada), emitidos por el C.A.S. desde la fecha de ingreso a la fecha de retiro definitivo de la institución policial de acuerdo a Memorándum de Agradecimiento.'],
            ['id' => '16', 'modalidad_id' => '2', 'abre' => 'Computo General Desglosado de Años de Servicio.', 'name' => 'Computo General Desglosado de Años de Servicio otorgado por el Comando General de la Policía Boliviana (Original).'],

            ['id' => '17', 'modalidad_id' => '3', 'abre' => 'Depósito Bancario para el canje de formulario y Carpeta.', 'name' => 'Depósito de Bs. 25.- en cuenta N° 1-13809229 del Banco Unión a para el canje de formulario y Carpeta.'],
            ['id' => '18', 'modalidad_id' => '3', 'abre' => 'Solicitud dirigida a la Dirección General Ejecutiva.', 'name' => 'Solicitud dirigida a la Dirección General Ejecutiva.'],
            ['id' => '19', 'modalidad_id' => '3', 'abre' => 'Fotocopia de Cédula de Identidad.', 'name' => 'Fotocopia simple de Cédula de Identidad.'],
            ['id' => '20', 'modalidad_id' => '3', 'abre' => 'Certificado de nacimiento.', 'name' => 'Certificado de nacimiento original y actualizado.'],
            ['id' => '21', 'modalidad_id' => '3', 'abre' => 'Memorándum de Agradecimiento de Servicios.', 'name' => 'Memorándum de Agradecimiento de Servicios otorgado por el Comando General de la Policía Boliviana (Original o Fotocopia Legalizada).'],
            ['id' => '22', 'modalidad_id' => '3', 'abre' => 'Certificado de Haberes de los últimos 36 meses de pago.', 'name' => 'Certificado de Haberes otorgado por el Comando General de la Policía Boliviana (Papeletas de haberes Original O Fotocopia Legalizada) de los últimos 36 meses de pago.'],
            ['id' => '23', 'modalidad_id' => '3', 'abre' => 'Reposición de Obrados Desglosado o Certificado de Años de Servicio.', 'name' => 'Reposición de Obrados Desglosado (Original) o Certificado de Años de Servicio (Copias Originales o fotocopia legalizada), emitidos por el C.A.S. desde la fecha de ingreso a la fecha de retiro definitivo de la institución policial de acuerdo a Memorándum de Agradecimiento.'],
            ['id' => '24', 'modalidad_id' => '3', 'abre' => 'Computo General Desglosado de Años de Servicio.', 'name' => 'Computo General Desglosado de Años de Servicio otorgado por el Comando General de la Policía Boliviana (Original).'],


            ['id' => '25', 'modalidad_id' => '4', 'abre' => 'Depósito Bancario para el canje de formulario y Carpeta.', 'name' => 'Depósito de Bs. 25.- en cuenta N° 1-13809229 del Banco Unión a para el canje de formulario y Carpeta.'],
            ['id' => '26', 'modalidad_id' => '4', 'abre' => 'Solicitud dirigida a la Dirección General Ejecutiva.', 'name' => 'Solicitud dirigida a la Dirección Ejecutiva.'],
            ['id' => '27', 'modalidad_id' => '4', 'abre' => 'Fotocopia de Cédula de Identidad del Afiliado fallecido.', 'name' => 'Fotocopia simple de Cédula de Identidad del Afiliado fallecido.'],
            ['id' => '28', 'modalidad_id' => '4', 'abre' => 'Certificado de Defunción del Afiliado fallecido.', 'name' => 'Certificado de Defunción original y actualizado.'],
            ['id' => '29', 'modalidad_id' => '4', 'abre' => 'Certificado de nacimiento del Afiliado fallecido.', 'name' => 'Certificado de nacimiento original y actualizado del fallecido.'],
            ['id' => '30', 'modalidad_id' => '4', 'abre' => 'Certificado de nacimiento del/la cónyugue y los hijos beneficiarios.', 'name' => 'Certificado de nacimiento original y actualizado del/la cónyugue y los hijos beneficiarios.'],
            ['id' => '31', 'modalidad_id' => '4', 'abre' => 'Certificado de matrimonio o Declaración de Matrimonio de Hecho o Unión Libre.', 'name' => 'Certificado de matrimonio original y actualizado o Declaración de Matrimonio de Hecho o Unión Libre.'],
            ['id' => '32', 'modalidad_id' => '4', 'abre' => 'Declaratoria de Herederos.', 'name' => 'Declaratoria de Herederos en original o fotocopia legalizada.'],
            ['id' => '33', 'modalidad_id' => '4', 'abre' => 'Certificación de verificación de descendencia y partidas matrimoniales emitida por el SERECI.', 'name' => 'Certificación de verificación de descendencia y partidas matrimoniales emitida por el SERECI.'],
            ['id' => '34', 'modalidad_id' => '4', 'abre' => 'Fotocopia de Cédula de Identidad del /la solicitante y todos los beneficiarios.', 'name' => 'Fotocopia simple de Cédula de Identidad del /la solicitante y todos los beneficiarios.'],
            ['id' => '35', 'modalidad_id' => '4', 'abre' => 'Formulario (AVC-04) de afiliación a la caja nacional de salud.', 'name' => 'Formulario (AVC-04) de afiliación a la caja nacional de salud (Original o fotocopia legalizada).'],
            ['id' => '36', 'modalidad_id' => '4', 'abre' => 'Certificado de Haberes de los últimos 36 meses de pago.', 'name' => 'Certificado de Haberes otorgado por el Comando General de la Policía Boliviana (Papeletas de haberes Original O Fotocopia Legalizada) de los últimos 36 meses de pago.'],
            ['id' => '37', 'modalidad_id' => '4', 'abre' => 'Reposición de Obrados Desglosado o Certificado de Años de Servicio.', 'name' => 'Reposición de Obrados Desglosado (Original) o Certificado de Años de Servicio (Copias Originales o fotocopia legalizada), emitidos por el C.A.S. desde la fecha de ingreso a la fecha de fallecimiento.'],
            ['id' => '38', 'modalidad_id' => '4', 'abre' => 'Computo General Desglosado de Años de Servicio.', 'name' => 'Computo General Desglosado de Años de Servicio otorgado por el Comando General de la Policía Boliviana (Original).'],
            ['id' => '39', 'modalidad_id' => '4', 'abre' => 'Certificado de Defunción ó certificado de obito en caso de fallecimiento de los beneficiarios del fallecido.', 'name' => 'Certificado de Defunción original y actualizado ó certificado de obito en caso de fallecimiento de los beneficiarios del fallecido.'],
            
            ['id' => '40', 'modalidad_id' => '5', 'abre' => 'Depósito Bancario para el canje de formulario y Carpeta.', 'name' => 'Depósito de Bs. 25.- en cuenta N° 1-13809229 del Banco Unión a para el canje de formulario y Carpeta.'],
            ['id' => '41', 'modalidad_id' => '5', 'abre' => 'Solicitud dirigida a la Dirección General Ejecutiva.', 'name' => 'Solicitud dirigida a la Dirección General Ejecutiva.'],
            ['id' => '42', 'modalidad_id' => '5', 'abre' => 'Fotocopia de Cédula de Identidad del solicitante.', 'name' => 'Fotocopia simple de Cédula de Identidad del solicitante.'],
            ['id' => '43', 'modalidad_id' => '5', 'abre' => 'Fotocopia de Cédula de Identidad del titular prestatario.', 'name' => 'Fotocopia simple de Cédula de Identidad del titular prestatario.'],
            ['id' => '44', 'modalidad_id' => '5', 'abre' => 'Memorándum de Baja  o Resolución Administrativa de Baja Definitiva', 'name' => 'Memorándum de Baja otorgado por el Comando General de la Policía Boliviana o Resolución Administrativa de Baja Definitiva (Fotocopia legalizada).'],
            ['id' => '45', 'modalidad_id' => '5', 'abre' => 'Certificado de Haberes de los últimos 36 meses de pago.', 'name' => 'Certificado de Haberes otorgado por el Comando General de la Policía Boliviana(Papeletas de haberes Original O Fotocopia Legalizada) de los últimos 36 meses de pago.'],
            ['id' => '46', 'modalidad_id' => '5', 'abre' => 'Computo General Desglosado de Años de Servicio.', 'name' => 'Computo General Desglosado de Años de Servicio otorgado por el Comando General de la Policía Boliviana (Original).'],
            ['id' => '47', 'modalidad_id' => '5', 'abre' => 'En caso del fallecimineto del titular prestatario debera presentar certificado de defunción.', 'name' => 'En caso del fallecimineto del titular prestatario debera presentar certificado de defunción en original y actualizado.']
        ];

        foreach ($statuses as $status) {
         
            Muserpol\Requisito::create($status);
            
        }
    }
}
