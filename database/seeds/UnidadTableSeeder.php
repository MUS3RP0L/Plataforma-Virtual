<?php

use Illuminate\Database\Seeder;

class UnidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->createUnidades();

        Eloquent::reguard();
    }

    private function createUnidades()
    {
        $statuses = [
	    	['id' => '1', 'ciu' => 'SUCRE', 'cod' => '10182', 'abre' => 'CDPN.', 'lit' => 'CMDO DPTAL SUCRE'],
	    	['id' => '2', 'ciu' => 'SUCRE', 'cod' => '10194', 'abre' => 'DCSP.', 'lit' => 'NARCOTICOS SUCRE'],
	    	['id' => '3', 'ciu' => 'LA PAZ', 'cod' => '20181', 'abre' => 'S.F.E.', 'lit' => 'SEGURIDAD FISICA ESTATAL'],
	    	['id' => '4', 'ciu' => 'LA PAZ', 'cod' => '20182', 'abre' => 'CDPN.', 'lit' => 'CMDO DPTAL LA PAZ'],
	    	['id' => '5', 'ciu' => 'LA PAZ', 'cod' => '20183', 'abre' => 'ANAPOL', 'lit' => 'ACADEMIA NAL DE POLICIA'],
	    	['id' => '6', 'ciu' => 'LA PAZ', 'cod' => '20184', 'abre' => 'DP2', 'lit' => 'DISTRITO POLICIALNo 2'],
	    	['id' => '7', 'ciu' => 'LA PAZ', 'cod' => '20185', 'abre' => 'DP5', 'lit' => 'DISTRITO POLICIALNo 5'],
	    	['id' => '8', 'ciu' => 'LA PAZ', 'cod' => '20186', 'abre' => 'CRPA', 'lit' => 'CMDO. REG. EL. ALTO'],
	    	['id' => '9', 'ciu' => 'LA PAZ', 'cod' => '20187', 'abre' => 'DP1', 'lit' => 'DISTRITO POLICIALNo 1'],
	    	['id' => '10', 'ciu' => 'LA PAZ', 'cod' => '20188', 'abre' => 'DP3', 'lit' => 'DISTRITO POLICIALNo 3'],
	    	['id' => '11', 'ciu' => 'LA PAZ', 'cod' => '20189', 'abre' => 'DP4', 'lit' => 'DISTRITO POLICIALNo 4'],
	    	['id' => '12', 'ciu' => 'LA PAZ', 'cod' => '20190', 'abre' => 'CGPN.', 'lit' => 'COMANDO GENERAL'],
	    	['id' => '13', 'ciu' => 'LA PAZ', 'cod' => '20191', 'abre' => 'POLIV.', 'lit' => 'POLIVALENTE'],
	    	['id' => '14', 'ciu' => 'LA PAZ', 'cod' => '20192', 'abre' => 'PRF.', 'lit' => 'POLIC, RURAL Y FRONT.'],
	    	['id' => '15', 'ciu' => 'LA PAZ', 'cod' => '20193', 'abre' => 'CANES', 'lit' => 'CANES'],
	    	['id' => '16', 'ciu' => 'LA PAZ', 'cod' => '20194', 'abre' => 'DCPN.', 'lit' => 'NARCOTICOS LA PAZ'],
	    	['id' => '17', 'ciu' => 'LA PAZ', 'cod' => '20195', 'abre' => 'C.Z. SUD', 'lit' => 'CMDO. REG. ZONA. SUD'],
	    	['id' => '18', 'ciu' => 'LA PAZ', 'cod' => '20196', 'abre' => 'IDENTIF.', 'lit' => 'DIRECC. NAL. IDENTIF. PERS.'],
	    	['id' => '19', 'ciu' => 'LA PAZ', 'cod' => '20197', 'abre' => 'REC.', 'lit' => 'DIRECC. NAL. DE RECAUDAC.'],
	    	['id' => '20', 'ciu' => 'LA PAZ', 'cod' => '20210', 'abre' => 'DIPROVE', 'lit' => 'DIR. NAL. PREVENC. ROBO DE VEHICULOS'],
	    	['id' => '21', 'ciu' => 'LA PAZ', 'cod' => '20220', 'abre' => 'D. N. SALUD', 'lit' => 'DIRECC. NA. DE SALUD'],
	    	['id' => '22', 'ciu' => 'LA PAZ', 'cod' => '20230', 'abre' => 'D. N. I. ENS.', 'lit' => 'DIREC. NAL. DE INSTRUC. Y ENSEÑANZA.'],
	    	['id' => '23', 'ciu' => 'LA PAZ', 'cod' => '20280', 'abre' => 'UTOP.', 'lit' => 'UNID. TEC. OPERAT. POLICIAL (EX GES)'],
	    	['id' => '24', 'ciu' => 'LA PAZ', 'cod' => '20282', 'abre' => 'TRANS', 'lit' => 'TRANSITO'],
	    	['id' => '25', 'ciu' => 'LA PAZ', 'cod' => '20283', 'abre' => 'FELCC', 'lit' => 'FUERZ ESP. DE LUCHA C. EL CRIMEN (EX. PTJ)'],
	    	['id' => '26', 'ciu' => 'LA PAZ', 'cod' => '20284', 'abre' => 'R. P. 110', 'lit' => 'RADIO PATRULLA 110'],
	    	['id' => '27', 'ciu' => 'LA PAZ', 'cod' => '20285', 'abre' => 'BOMB.', 'lit' => 'BOMBEROS'],
	    	['id' => '28', 'ciu' => 'LA PAZ', 'cod' => '20286', 'abre' => 'TR. EL ALT', 'lit' => 'TRANSITO EL ALTO'],
	    	['id' => '29', 'ciu' => 'COCHABAMBA', 'cod' => '30184', 'abre' => 'CDPN.', 'lit' => 'CMDO DPTAL COCHABAMBA'],
	    	['id' => '30', 'ciu' => 'COCHABAMBA', 'cod' => '30190', 'abre' => 'P. E.', 'lit' => 'POLICIA ECOLÓGICA'],
	    	['id' => '31', 'ciu' => 'COCHABAMBA', 'cod' => '30194', 'abre' => 'DCSP.', 'lit' => 'NARCOTICOS COCHABAMBA'],
	    	['id' => '32', 'ciu' => 'ORURO', 'cod' => '40182', 'abre' => 'CDPN.', 'lit' => 'CMDO DPTAL ORURO'],
	    	['id' => '33', 'ciu' => 'ORURO', 'cod' => '40194', 'abre' => 'DCSP.', 'lit' => 'NARCOTICOS ORURO'],
	    	['id' => '34', 'ciu' => 'POTOSI', 'cod' => '50182', 'abre' => 'CDPN.', 'lit' => 'CMDO. DPTAL. POTOSÍ'],
	    	['id' => '35', 'ciu' => 'POTOSI', 'cod' => '50194', 'abre' => 'DCSP.', 'lit' => 'NARCOTICOS POTOSÍ'],
	    	['id' => '36', 'ciu' => 'TUPIZA', 'cod' => '50882', 'abre' => 'JFPN', 'lit' => 'JEF. FRONT. TUPIZA'],
	    	['id' => '37', 'ciu' => 'VILLAZON', 'cod' => '51582', 'abre' => 'JFPN', 'lit' => 'JEF. FRONT. VILLAZON'],
	    	['id' => '38', 'ciu' => 'VILLAZON', 'cod' => '51594', 'abre' => 'DCSP.', 'lit' => 'NARCOTICOS VILLAZON'],
	    	['id' => '39', 'ciu' => 'TARIJA', 'cod' => '60182', 'abre' => 'CDPN.', 'lit' => 'CMDO. DPTAL. TARIJA'],
	    	['id' => '40', 'ciu' => 'TARIJA', 'cod' => '60194', 'abre' => 'DCSP.', 'lit' => 'NARCOTICOS TARIJA'],
	    	['id' => '41', 'ciu' => 'YACUIBA', 'cod' => '60294', 'abre' => 'FELCC', 'lit' => 'FUERZ ESP. DE LUCHA C. EL CRIMEN YACUIBA'],
	    	['id' => '42', 'ciu' => 'YACUIBA', 'cod' => '60382', 'abre' => 'JFPN.', 'lit' => 'JEF. FRONT. YACUIBA'],
	    	['id' => '43', 'ciu' => 'VILLAMONTES', 'cod' => '60482', 'abre' => 'JFPN.', 'lit' => 'JEF. FRONT. VILLAMONTES'],
	    	['id' => '44', 'ciu' => 'BERMEJO', 'cod' => '60582', 'abre' => 'JFPN.', 'lit' => 'JEF. FRONT. BERMEJO'],
	    	['id' => '45', 'ciu' => 'SANTA CRUZ', 'cod' => '70182', 'abre' => 'CDPN.', 'lit' => 'CMDO. DPTAL. SANTA CRUZ'],
	    	['id' => '46', 'ciu' => 'SANTA CRUZ', 'cod' => '70194', 'abre' => 'DCSP.', 'lit' => 'NARCÓTICOS SANTA CRUZ'],
	    	['id' => '47', 'ciu' => 'SAN MATIAS', 'cod' => '70294', 'abre' => 'FELCC', 'lit' => 'FUERZ. ESP. DE LUCHA C. EL CRIMEN'],
	    	['id' => '48', 'ciu' => 'S. I. VELASCO', 'cod' => '70382', 'abre' => 'JFPN', 'lit' => 'JEF. FRONT. S. I. DE VELASCO'],
	    	['id' => '49', 'ciu' => 'S. I. VELASCO', 'cod' => '70394', 'abre' => 'FELCC', 'lit' => 'FUERZ. ESP. DE LUCHA C. EL CRIMEN'],
	    	['id' => '50', 'ciu' => 'SAN MATIAS', 'cod' => '70482', 'abre' => 'JFPN.', 'lit' => 'JEF. FRONT. S. MATIAS'],
	    	['id' => '51', 'ciu' => 'PTO. SUAREZ', 'cod' => '70582', 'abre' => 'JFPN.', 'lit' => 'JEF. FRONT. PTO. SUAREZ'],
	    	['id' => '52', 'ciu' => 'BENI', 'cod' => '80182', 'abre' => 'CDPN.', 'lit' => 'CMDO. DPTAL. BENI'],
	    	['id' => '53', 'ciu' => 'RIBERALTA', 'cod' => '80186', 'abre' => 'JFPN.', 'lit' => 'JEF. FRONT. RIBERALTA'],
	    	['id' => '54', 'ciu' => 'BENI', 'cod' => '80194', 'abre' => 'DCSP.', 'lit' => 'NARCOTICOS BENI'],
	    	['id' => '55', 'ciu' => 'GUAYARAMERIN', 'cod' => '80282', 'abre' => 'JFPN.', 'lit' => 'JEF. FRONT. GUAYARAMERIN'],
	    	['id' => '56', 'ciu' => 'PANDO', 'cod' => '90182', 'abre' => 'CDPN.', 'lit' => 'CMDO. DPTAL. PANDO'],
	    	['id' => '57', 'ciu' => 'PANDO', 'cod' => '90194', 'abre' => 'DCSP.', 'lit' => 'NARCÓTICOS PANDO']  	
    	];

        foreach ($statuses as $status) {

                Muserpol\Unidad::create($status);
            
        }
    }
}
