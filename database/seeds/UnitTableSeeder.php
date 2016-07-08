<?php

use Illuminate\Database\Seeder;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->createUnits();

        Eloquent::reguard();
    }

    private function createUnits()
    {
        $statuses = [
	    	['id' => '1', 'breakdown_id' => '8', 'district' => 'CHUQUISACA', 'code' => '10182', 'shortened' => 'C.D.PN.CH.', 'name' => 'COMANDO DEPARTAMENTAL CHUQUISACA'],
	    	['id' => '2', 'breakdown_id' => '4', 'district' => 'CHUQUISACA', 'code' => '10182', 'shortened' => 'BAT.SEG.FP.CH.', 'name' => 'BAT. SEG. FISICA PRIVADA CH. (SERVICIOS)'],

	    	['id' => '3', 'breakdown_id' => '8', 'district' => 'CHUQUISACA', 'code' => '10194', 'shortened' => 'F.E.L.C.N.CH.', 'name' => 'F.E.L.C.N. CHUQUISACA'],

	    	['id' => '4', 'breakdown_id' => '8', 'district' => 'LA PAZ', 'code' => '20181', 'shortened' => 'S.F.E.', 'name' => 'SEGURIDAD FISICA ESTATAL'],
	    	['id' => '5', 'breakdown_id' => '3', 'district' => 'LA PAZ', 'code' => '20181', 'shortened' => 'S.F.E.IT.0', 'name' => 'SEG. FIS. ESTATAL - ITEM CERO'],

	    	['id' => '6', 'breakdown_id' => '8', 'district' => 'LA PAZ', 'code' => '20182', 'shortened' => 'C.D.PN.', 'name' => 'COMANDO DEPARTAMENTAL LA PAZ '],
	    	['id' => '7', 'breakdown_id' => '4', 'district' => 'LA PAZ', 'code' => '20182', 'shortened' => 'BAT.SEG.FP.LP.', 'name' => 'BAT. SEG. FISICA PRIVADA LP. (SERVICIOS)'],
	    	['id' => '8', 'breakdown_id' => '5', 'district' => 'LA PAZ', 'code' => '20182', 'shortened' => 'J.P.C.C.F.', 'name' => 'JUZGADOS POLICIALES - C.C. Y FAMILIAR'],
	    	['id' => '9', 'breakdown_id' => '6', 'district' => 'LA PAZ', 'code' => '20182', 'shortened' => 'ESC.SEG.PU.', 'name' => 'ESCUADRON DE SEG. LOS PUMAS'],
	        ['id' => '10', 'breakdown_id' => '7', 'district' => 'LA PAZ', 'code' => '20182', 'shortened' => 'DIR.NAL.SEG.PEN.', 'name' => 'DIR NAL SEG. PENITENCIARIA'],

	        ['id' => '11', 'breakdown_id' => '8', 'district' => 'LA PAZ', 'code' => '20183', 'shortened' => 'ANAPOL', 'name' => 'ACADEMIA NACIONAL DE POLICIA'],

	    	['id' => '12', 'breakdown_id' => '8', 'district' => 'LA PAZ', 'code' => '20184', 'shortened' => 'D.P.2', 'name' => 'districtRITO POLICIAL Nº 2'],

	    	['id' => '13', 'breakdown_id' => '8', 'district' => 'LA PAZ', 'code' => '20185', 'shortened' => 'D.P.5', 'name' => 'districtRITO POLICIAL Nº 5'],

	    	['id' => '14', 'breakdown_id' => '8', 'district' => 'EL ALTO', 'code' => '20186', 'shortened' => 'C.R.EA.', 'name' => 'COMANDO REGIONAL EL ALTO'],
	    	['id' => '15', 'breakdown_id' => '4', 'district' => 'EL ALTO', 'code' => '20186', 'shortened' => 'BAT.SEG.FP.EA.', 'name' => 'BAT. SEG. FISICA PRIVADA EL ALTO (SERVICIOS)'],

	    	['id' => '16', 'breakdown_id' => '8', 'district' => 'LA PAZ', 'code' => '20187', 'shortened' => 'D.P.1', 'name' => 'districtRITO POLICIAL Nº 1'],

	    	['id' => '17', 'breakdown_id' => '8', 'district' => 'LA PAZ', 'code' => '20188', 'shortened' => 'D.P.3', 'name' => 'districtRITO POLICIAL Nº 3'],

	    	['id' => '18', 'breakdown_id' => '8', 'district' => 'ZONA SUR', 'code' => '20189', 'shortened' => 'D.P.4', 'name' => 'districtRITO POLICIAL Nº 4'],

	    	['id' => '19', 'breakdown_id' => '8', 'district' => 'LA PAZ', 'code' => '20190', 'shortened' => 'C.G.PN.', 'name' => 'COMANDO GENERAL'],

	    	['id' => '20', 'breakdown_id' => '1', 'district' => 'LA PAZ', 'code' => '20190', 'shortened' => 'DISP.', 'name' => 'DISPONIBILIDAD'],

	    	['id' => '21', 'breakdown_id' => '2', 'district' => 'LA PAZ', 'code' => '20190', 'shortened' => 'DIR.NAL.POFOMA', 'name' => 'DIRECCION NACIONAL POFOMA'],
	    	['id' => '22', 'breakdown_id' => '3', 'district' => 'LA PAZ', 'code' => '20190', 'shortened' => 'COM.IT.0', 'name' => 'COMISION ITEM CERO'],

	    	['id' => '23', 'breakdown_id' => '8', 'district' => 'LA PAZ', 'code' => '20191', 'shortened' => 'POLIV.', 'name' => 'POLIVALENTES DE SEG. CIUDADANA'],

	    	['id' => '24', 'breakdown_id' => '8', 'district' => 'LA PAZ', 'code' => '20192', 'shortened' => 'U.P.R.F.', 'name' => 'POL. RURAL Y FRONTERIZA'],

	    	['id' => '25', 'breakdown_id' => '8', 'district' => 'ZONA SUR', 'code' => '20193', 'shortened' => 'CANES', 'name' => 'CENTRO DE ADIESTRAMIENTO DE CANES'],

	    	['id' => '26', 'breakdown_id' => '8', 'district' => 'LA PAZ', 'code' => '20194', 'shortened' => 'F.E.L.C.N.LP.', 'name' => 'F.E.L.C.N. LA PAZ'],

	    	['id' => '27', 'breakdown_id' => '8', 'district' => 'ZONA SUR', 'code' => '20195', 'shortened' => 'C.R.ZS.', 'name' => 'COMANDO REGIONAL ZONA SUR'],

	    	['id' => '28', 'breakdown_id' => '8', 'district' => 'LA PAZ', 'code' => '20196', 'shortened' => 'DIR.NAL.IDENTIF.', 'name' => 'DIRECION NACIONAL IDENTIFICACION PERSONAL'],

	    	['id' => '29', 'breakdown_id' => '8', 'district' => 'LA PAZ', 'code' => '20197', 'shortened' => 'DIR.NAL.RECA.', 'name' => 'DIRECION NACIONAL DE FISC. Y RECAUDACIONES'],

	    	['id' => '30', 'breakdown_id' => '8', 'district' => 'LA PAZ', 'code' => '20210', 'shortened' => 'DIPROVE', 'name' => 'DIRECION NACIONAL PREVENC. ROBO DE VEHICULOS'],

	    	['id' => '31', 'breakdown_id' => '8', 'district' => 'LA PAZ', 'code' => '20220', 'shortened' => 'DIR.NAL.SALUD', 'name' => 'DIRECION NACIONAL SALUD BIENESTAR SOCIAL'],

	    	['id' => '32', 'breakdown_id' => '8', 'district' => 'LA PAZ', 'code' => '20230', 'shortened' => 'DIR.NAL.INS.ENS.', 'name' => 'DIRECION NACIONAL DE INSTRUC. Y ENSEÑANZA'],

	    	['id' => '33', 'breakdown_id' => '8', 'district' => 'LA PAZ', 'code' => '20280', 'shortened' => 'UTOP', 'name' => 'TACTICA DE OPERACIONES POLICIALES'],

	    	['id' => '34', 'breakdown_id' => '8', 'district' => 'LA PAZ', 'code' => '20282', 'shortened' => 'TRANS', 'name' => 'ORG. OP. DE TRANSITO'],

	    	['id' => '35', 'breakdown_id' => '8', 'district' => 'LA PAZ', 'code' => '20283', 'shortened' => 'F.E.L.C.C.', 'name' => 'DIRECION NACIONAL F.E.L.C.- C'],

	    	['id' => '36', 'breakdown_id' => '8', 'district' => 'LA PAZ', 'code' => '20284', 'shortened' => 'R.P.110', 'name' => 'RADIO PATRULLAS 110'],

	    	['id' => '37', 'breakdown_id' => '8', 'district' => 'LA PAZ', 'code' => '20285', 'shortened' => 'BOMB.', 'name' => 'BOMBEROS'],

	    	['id' => '38', 'breakdown_id' => '8', 'district' => 'EL ALTO', 'code' => '20286', 'shortened' => 'ORG.OP.TRANS.EA.', 'name' => 'ORG. OP. DE TRANSITO EL ALTO'],

	    	['id' => '39', 'breakdown_id' => '8', 'district' => 'COCHABAMBA', 'code' => '30184', 'shortened' => 'CDPN.CBBA.', 'name' => 'COMANDO DEPARTAMENTAL COCHABAMBA'],
	    	['id' => '40', 'breakdown_id' => '4', 'district' => 'COCHABAMBA', 'code' => '30184', 'shortened' => 'BAT.SEG.FP.CBBA.', 'name' => 'BAT. SEG. FISICA PRIVADA CBBA. (SERVICIOS)'],

	    	['id' => '41', 'breakdown_id' => '8', 'district' => 'COCHABAMBA', 'code' => '30190', 'shortened' => 'P.E.CBBA.', 'name' => 'POLICIA ECOLÓGICA CBBA.'],

	    	['id' => '42', 'breakdown_id' => '8', 'district' => 'COCHABAMBA', 'code' => '30194', 'shortened' => 'F.E.L.C.N.CBBA.', 'name' => 'F.E.L.C.N. COCHABAMBA'],

	    	['id' => '43', 'breakdown_id' => '8', 'district' => 'ORURO', 'code' => '40182', 'shortened' => 'C.D.PN.OR.', 'name' => 'COMANDO DEPARTAMENTAL ORURO'],
	    	['id' => '44', 'breakdown_id' => '4', 'district' => 'ORURO', 'code' => '40182', 'shortened' => 'BAT.SEG.FP.OR.', 'name' => 'BAT. SEG. FISICA PRIVADA OR. (SERVICIOS)'],

	    	['id' => '45', 'breakdown_id' => '8', 'district' => 'ORURO', 'code' => '40194', 'shortened' => 'F.E.L.C.N.OR.', 'name' => 'F.E.L.C.N. ORURO'],

	    	['id' => '46', 'breakdown_id' => '8', 'district' => 'POTOSI', 'code' => '50182', 'shortened' => 'C.D.PN.PT.', 'name' => 'COMANDO DEPARTAMENTAL POTOSI'],
	    	['id' => '47', 'breakdown_id' => '4', 'district' => 'POTOSI', 'code' => '50182', 'shortened' => 'BAT.SEG.FP.PT.', 'name' => 'BAT. SEG. FISICA PRIVADA PT. (SERVICIOS)'],

	    	['id' => '48', 'breakdown_id' => '8', 'district' => 'POTOSI', 'code' => '50194', 'shortened' => 'F.E.L.C.N.PT.', 'name' => 'F.E.L.C.N. POTOSÍ'],

	    	['id' => '49', 'breakdown_id' => '8', 'district' => 'TUPIZA', 'code' => '50882', 'shortened' => 'J.F.PN.TZA.', 'name' => 'JEFATURA FRONTERIZA TUPIZA'],
	    	['id' => '50', 'breakdown_id' => '4', 'district' => 'TUPIZA', 'code' => '50882', 'shortened' => 'BAT.SEG.FPF.TZA.', 'name' => 'BAT. SEG. FISICA PRIVADA FRONT. TUPIZA'],

	    	/* BUSCAR */
	    	['id' => '51', 'breakdown_id' => '8', 'district' => 'TUPIZA', 'code' => '51194', 'shortened' => 'F.E.L.C.N.TZA.', 'name' => 'F.E.L.C.N. TUPIZA'],
	    	/* BUSCAR */

	    	['id' => '52', 'breakdown_id' => '8', 'district' => 'VILLAZON', 'code' => '51582', 'shortened' => 'J.F.PN.VIZN.', 'name' => 'JEFATURA FRONTERIZA VILLAZON'],
	    	['id' => '53', 'breakdown_id' => '4', 'district' => 'VILLAZON', 'code' => '51582', 'shortened' => 'BAT.SEG.FPF.VIZN.', 'name' => 'BAT. SEG. FISICA PRIVADA FRONT. VILLAZON'],

	    	['id' => '54', 'breakdown_id' => '8', 'district' => 'VILLAZON', 'code' => '51594', 'shortened' => 'F.E.L.C.N.VI.', 'name' => 'F.E.L.C.N. VILLAZON'],

	    	['id' => '55', 'breakdown_id' => '8', 'district' => 'TARIJA', 'code' => '60182', 'shortened' => 'C.D.PN.TJA.', 'name' => 'COMANDO DEPARTAMENTAL TARIJA'],
	    	['id' => '56', 'breakdown_id' => '4', 'district' => 'TARIJA', 'code' => '60182', 'shortened' => 'BAT.SEG.FP.TJA.', 'name' => 'BAT. SEG. FISICA PRIVADA TJA. (SERVICIOS)'],

	    	['id' => '57', 'breakdown_id' => '8', 'district' => 'TARIJA', 'code' => '60194', 'shortened' => 'F.E.L.C.N.TJA.', 'name' => 'F.E.L.C.N. TARIJA'],

	    	['id' => '58', 'breakdown_id' => '8', 'district' => 'YACUIBA', 'code' => '60294', 'shortened' => 'F.E.L.C.N.YA.', 'name' => 'F.E.L.C.N. YACUIBA'],

	    	['id' => '59', 'breakdown_id' => '8', 'district' => 'YACUIBA', 'code' => '60382', 'shortened' => 'J.F.PN.YA.', 'name' => 'JEFATURA FRONTERIZA YACUIBA'],
	    	['id' => '60', 'breakdown_id' => '4', 'district' => 'YACUIBA', 'code' => '60382', 'shortened' => 'BAT.SEG.FP.YA.', 'name' => 'BAT. SEG. FISICA PRIVADA FRONT. YACUIBA'],

	    	['id' => '61', 'breakdown_id' => '8', 'district' => 'VILLAMONTES', 'code' => '60482', 'shortened' => 'J.F.PN.VITS.', 'name' => 'JEFATURA PROVINCIAL VILLAMONTES'],
	    	['id' => '62', 'breakdown_id' => '4', 'district' => 'VILLAMONTES', 'code' => '60482', 'shortened' => 'BAT.SEG.FP.VITS.', 'name' => 'BAT. SEG. FISICA PRIVADA FRONT. VILLAMONTES'],

	    	['id' => '63', 'breakdown_id' => '8', 'district' => 'BERMEJO', 'code' => '60582', 'shortened' => 'J.F.PN.BMJO.', 'name' => 'JEFATURA FRONTERIZA BERMEJO'],
	    	['id' => '64', 'breakdown_id' => '4', 'district' => 'BERMEJO', 'code' => '60582', 'shortened' => 'BAT.SEG.FP.BMJO.', 'name' => 'BAT. SEG. FISICA PRIVADA FRONT. BERMEJO'],

	    	['id' => '65', 'breakdown_id' => '8', 'district' => 'SANTA CRUZ', 'code' => '70182', 'shortened' => 'C.D.PN.SC.', 'name' => 'COMANDO DEPARTAMENTAL SANTA CRUZ'],
	    	['id' => '66', 'breakdown_id' => '3', 'district' => 'SANTA CRUZ', 'code' => '70182', 'shortened' => 'C.D.PN.SC.IT.0', 'name' => 'COMANDO DEPARTAMENTAL SANTA CRUZ - IT CERO '],
	    	['id' => '67', 'breakdown_id' => '4', 'district' => 'SANTA CRUZ', 'code' => '70182', 'shortened' => 'BAT.SEG.FP.SC.', 'name' => 'BAT. SEG. FISICA PRIVADA SC. (SERVICIOS)'],

	    	['id' => '68', 'breakdown_id' => '8', 'district' => 'SANTA CRUZ', 'code' => '70194', 'shortened' => 'F.E.L.C.N.SC.', 'name' => 'F.E.L.C.N. SANTA CRUZ'],

	    	['id' => '69', 'breakdown_id' => '8', 'district' => 'SAN MATIAS', 'code' => '70294', 'shortened' => 'F.E.L.C.N.SM.', 'name' => 'F.E.L.C.N. SAN MATIAS'],

	    	['id' => '70', 'breakdown_id' => '8', 'district' => 'S. I. VELASCO', 'code' => '70382', 'shortened' => 'J.F.PN.SAIGVE.', 'name' => 'JEFATURA PROVINCIAL SAN IGNACIO DE VELASCO'],

	    	['id' => '71', 'breakdown_id' => '8', 'district' => 'S. I. VELASCO', 'code' => '70394', 'shortened' => 'F.E.L.C.N.SAIGVE.', 'name' => 'F.E.L.C.N. SAN IGNACIO DE VELASCO'],

	    	['id' => '72', 'breakdown_id' => '8', 'district' => 'SAN MATIAS', 'code' => '70482', 'shortened' => 'J.F.PN.SAMA.', 'name' => 'JEFATURA FRONTERIZA SAN MATIAS'],

	    	['id' => '73', 'breakdown_id' => '8', 'district' => 'PTO. SUAREZ', 'code' => '70582', 'shortened' => 'J.F.PN.PTOSUA.', 'name' => 'JEFATURA FRONTERIZA PUERTO SUAREZ'],
	    	['id' => '74', 'breakdown_id' => '4', 'district' => 'PTO. SUAREZ', 'code' => '70582', 'shortened' => 'BAT.SEG.FP.PTOSUA.', 'name' => 'BAT. SEG. FISICA PRIVADA FRONT. PUERTO SUAREZ'],
	    	
	    	/* BUSCAR */
	    	['id' => '75', 'breakdown_id' => '4', 'district' => 'PTO. SUAREZ', 'code' => '70594', 'shortened' => 'F.E.L.C.N.PTOSUA.', 'name' => 'F.E.L.C.N. PUERTO SUAREZ'],
			/* BUSCAR */

	    	['id' => '76', 'breakdown_id' => '8', 'district' => 'BENI', 'code' => '80182', 'shortened' => 'C.D.PN.BN.', 'name' => 'CCOMANDO DEPARTAMENTAL BENI'],
	    	['id' => '77', 'breakdown_id' => '4', 'district' => 'BENI', 'code' => '80182', 'shortened' => 'BAT.SEG.FP.BN.', 'name' => 'BAT. SEG. FISICA PRIVADA BN. (SERVICIOS)'],

	    	['id' => '78', 'breakdown_id' => '8', 'district' => 'RIBERALTA', 'code' => '80186', 'shortened' => 'J.F.PN.RIBE.', 'name' => 'JEFATURA PROVINCIAL RIBERALTA'],
	    	['id' => '79', 'breakdown_id' => '4', 'district' => 'RIBERALTA', 'code' => '80186', 'shortened' => 'BAT.SEG.FP.RIBE.', 'name' => 'BAT. SEG. FISICA PRIVADA FRONT. RIBERALTA'],

	    	['id' => '80', 'breakdown_id' => '8', 'district' => 'BENI', 'code' => '80194', 'shortened' => 'F.E.L.C.N.BN.', 'name' => 'F.E.L.C.N. BENI'],

	    	['id' => '81', 'breakdown_id' => '8', 'district' => 'GUAYARAMERIN', 'code' => '80282', 'shortened' => 'J.F.PN.GUAY.', 'name' => 'JEFATURA FRONTERIZA GUAYARAMERIN'],
	    	['id' => '82', 'breakdown_id' => '4', 'district' => 'GUAYARAMERIN', 'code' => '80282', 'shortened' => 'BAT.SEG.FP.GUAY.', 'name' => 'BAT. SEG. FISICA PRIVADA FRONT. GUAYARAMERIN'],

	    	['id' => '83', 'breakdown_id' => '8', 'district' => 'PANDO', 'code' => '90182', 'shortened' => 'C.D.PN.PD.', 'name' => 'COMANDO DEPARTAMENTAL PANDO'],
	    	['id' => '84', 'breakdown_id' => '4', 'district' => 'PANDO', 'code' => '90182', 'shortened' => 'BAT.SEG.FP.PD.', 'name' => 'BAT. SEG. FISICA PRIVADA PDO. (SERVICIOS)'],

	    	['id' => '85', 'breakdown_id' => '8', 'district' => 'PANDO', 'code' => '90194', 'shortened' => 'F.E.L.C.N.PD.', 'name' => 'F.E.L.C.N. PANDO']  	
    	];

        foreach ($statuses as $status) {

                Muserpol\Unit::create($status);
            
        }
    }
}
