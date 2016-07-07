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
	    	['id' => '1', 'desglose_id' => '8', 'dist' => 'CHUQUISACA', 'cod' => '10182', 'abre' => 'C.D.PN.CH.', 'lit' => 'COMANDO DEPARTAMENTAL CHUQUISACA'],
	    	['id' => '2', 'desglose_id' => '4', 'dist' => 'CHUQUISACA', 'cod' => '10182', 'abre' => 'BAT.SEG.FP.CH.', 'lit' => 'BAT. SEG. FISICA PRIVADA CH. (SERVICIOS)'],

	    	['id' => '3', 'desglose_id' => '8', 'dist' => 'CHUQUISACA', 'cod' => '10194', 'abre' => 'F.E.L.C.N.CH.', 'lit' => 'F.E.L.C.N. CHUQUISACA'],

	    	['id' => '4', 'desglose_id' => '8', 'dist' => 'LA PAZ', 'cod' => '20181', 'abre' => 'S.F.E.', 'lit' => 'SEGURIDAD FISICA ESTATAL'],
	    	['id' => '5', 'desglose_id' => '3', 'dist' => 'LA PAZ', 'cod' => '20181', 'abre' => 'S.F.E.IT.0', 'lit' => 'SEG. FIS. ESTATAL - ITEM CERO'],

	    	['id' => '6', 'desglose_id' => '8', 'dist' => 'LA PAZ', 'cod' => '20182', 'abre' => 'C.D.PN.', 'lit' => 'COMANDO DEPARTAMENTAL LA PAZ '],
	    	['id' => '7', 'desglose_id' => '4', 'dist' => 'LA PAZ', 'cod' => '20182', 'abre' => 'BAT.SEG.FP.LP.', 'lit' => 'BAT. SEG. FISICA PRIVADA LP. (SERVICIOS)'],
	    	['id' => '8', 'desglose_id' => '5', 'dist' => 'LA PAZ', 'cod' => '20182', 'abre' => 'J.P.C.C.F.', 'lit' => 'JUZGADOS POLICIALES - C.C. Y FAMILIAR'],
	    	['id' => '9', 'desglose_id' => '6', 'dist' => 'LA PAZ', 'cod' => '20182', 'abre' => 'ESC.SEG.PU.', 'lit' => 'ESCUADRON DE SEG. LOS PUMAS'],
	        ['id' => '10', 'desglose_id' => '7', 'dist' => 'LA PAZ', 'cod' => '20182', 'abre' => 'DIR.NAL.SEG.PEN.', 'lit' => 'DIR NAL SEG. PENITENCIARIA'],

	        ['id' => '11', 'desglose_id' => '8', 'dist' => 'LA PAZ', 'cod' => '20183', 'abre' => 'ANAPOL', 'lit' => 'ACADEMIA NACIONAL DE POLICIA'],

	    	['id' => '12', 'desglose_id' => '8', 'dist' => 'LA PAZ', 'cod' => '20184', 'abre' => 'D.P.2', 'lit' => 'DISTRITO POLICIAL Nº 2'],

	    	['id' => '13', 'desglose_id' => '8', 'dist' => 'LA PAZ', 'cod' => '20185', 'abre' => 'D.P.5', 'lit' => 'DISTRITO POLICIAL Nº 5'],

	    	['id' => '14', 'desglose_id' => '8', 'dist' => 'EL ALTO', 'cod' => '20186', 'abre' => 'C.R.EA.', 'lit' => 'COMANDO REGIONAL EL ALTO'],
	    	['id' => '15', 'desglose_id' => '4', 'dist' => 'EL ALTO', 'cod' => '20186', 'abre' => 'BAT.SEG.FP.EA.', 'lit' => 'BAT. SEG. FISICA PRIVADA EL ALTO (SERVICIOS)'],

	    	['id' => '16', 'desglose_id' => '8', 'dist' => 'LA PAZ', 'cod' => '20187', 'abre' => 'D.P.1', 'lit' => 'DISTRITO POLICIAL Nº 1'],

	    	['id' => '17', 'desglose_id' => '8', 'dist' => 'LA PAZ', 'cod' => '20188', 'abre' => 'D.P.3', 'lit' => 'DISTRITO POLICIAL Nº 3'],

	    	['id' => '18', 'desglose_id' => '8', 'dist' => 'ZONA SUR', 'cod' => '20189', 'abre' => 'D.P.4', 'lit' => 'DISTRITO POLICIAL Nº 4'],

	    	['id' => '19', 'desglose_id' => '8', 'dist' => 'LA PAZ', 'cod' => '20190', 'abre' => 'C.G.PN.', 'lit' => 'COMANDO GENERAL'],

	    	['id' => '20', 'desglose_id' => '1', 'dist' => 'LA PAZ', 'cod' => '20190', 'abre' => 'DISP.', 'lit' => 'DISPONIBILIDAD'],

	    	['id' => '21', 'desglose_id' => '2', 'dist' => 'LA PAZ', 'cod' => '20190', 'abre' => 'DIR.NAL.POFOMA', 'lit' => 'DIRECCION NACIONAL POFOMA'],
	    	['id' => '22', 'desglose_id' => '3', 'dist' => 'LA PAZ', 'cod' => '20190', 'abre' => 'COM.IT.0', 'lit' => 'COMISION ITEM CERO'],

	    	['id' => '23', 'desglose_id' => '8', 'dist' => 'LA PAZ', 'cod' => '20191', 'abre' => 'POLIV.', 'lit' => 'POLIVALENTES DE SEG. CIUDADANA'],

	    	['id' => '24', 'desglose_id' => '8', 'dist' => 'LA PAZ', 'cod' => '20192', 'abre' => 'U.P.R.F.', 'lit' => 'POL. RURAL Y FRONTERIZA'],

	    	['id' => '25', 'desglose_id' => '8', 'dist' => 'ZONA SUR', 'cod' => '20193', 'abre' => 'CANES', 'lit' => 'CENTRO DE ADIESTRAMIENTO DE CANES'],

	    	['id' => '26', 'desglose_id' => '8', 'dist' => 'LA PAZ', 'cod' => '20194', 'abre' => 'F.E.L.C.N.LP.', 'lit' => 'F.E.L.C.N. LA PAZ'],

	    	['id' => '27', 'desglose_id' => '8', 'dist' => 'ZONA SUR', 'cod' => '20195', 'abre' => 'C.R.ZS.', 'lit' => 'COMANDO REGIONAL ZONA SUR'],

	    	['id' => '28', 'desglose_id' => '8', 'dist' => 'LA PAZ', 'cod' => '20196', 'abre' => 'DIR.NAL.IDENTIF.', 'lit' => 'DIRECION NACIONAL IDENTIFICACION PERSONAL'],

	    	['id' => '29', 'desglose_id' => '8', 'dist' => 'LA PAZ', 'cod' => '20197', 'abre' => 'DIR.NAL.RECA.', 'lit' => 'DIRECION NACIONAL DE FISC. Y RECAUDACIONES'],

	    	['id' => '30', 'desglose_id' => '8', 'dist' => 'LA PAZ', 'cod' => '20210', 'abre' => 'DIPROVE', 'lit' => 'DIRECION NACIONAL PREVENC. ROBO DE VEHICULOS'],

	    	['id' => '31', 'desglose_id' => '8', 'dist' => 'LA PAZ', 'cod' => '20220', 'abre' => 'DIR.NAL.SALUD', 'lit' => 'DIRECION NACIONAL SALUD BIENESTAR SOCIAL'],

	    	['id' => '32', 'desglose_id' => '8', 'dist' => 'LA PAZ', 'cod' => '20230', 'abre' => 'DIR.NAL.INS.ENS.', 'lit' => 'DIRECION NACIONAL DE INSTRUC. Y ENSEÑANZA'],

	    	['id' => '33', 'desglose_id' => '8', 'dist' => 'LA PAZ', 'cod' => '20280', 'abre' => 'UTOP', 'lit' => 'TACTICA DE OPERACIONES POLICIALES'],

	    	['id' => '34', 'desglose_id' => '8', 'dist' => 'LA PAZ', 'cod' => '20282', 'abre' => 'TRANS', 'lit' => 'ORG. OP. DE TRANSITO'],

	    	['id' => '35', 'desglose_id' => '8', 'dist' => 'LA PAZ', 'cod' => '20283', 'abre' => 'F.E.L.C.C.', 'lit' => 'DIRECION NACIONAL F.E.L.C.- C'],

	    	['id' => '36', 'desglose_id' => '8', 'dist' => 'LA PAZ', 'cod' => '20284', 'abre' => 'R.P.110', 'lit' => 'RADIO PATRULLAS 110'],

	    	['id' => '37', 'desglose_id' => '8', 'dist' => 'LA PAZ', 'cod' => '20285', 'abre' => 'BOMB.', 'lit' => 'BOMBEROS'],

	    	['id' => '38', 'desglose_id' => '8', 'dist' => 'EL ALTO', 'cod' => '20286', 'abre' => 'ORG.OP.TRANS.EA.', 'lit' => 'ORG. OP. DE TRANSITO EL ALTO'],

	    	['id' => '39', 'desglose_id' => '8', 'dist' => 'COCHABAMBA', 'cod' => '30184', 'abre' => 'CDPN.CBBA.', 'lit' => 'COMANDO DEPARTAMENTAL COCHABAMBA'],
	    	['id' => '40', 'desglose_id' => '4', 'dist' => 'COCHABAMBA', 'cod' => '30184', 'abre' => 'BAT.SEG.FP.CBBA.', 'lit' => 'BAT. SEG. FISICA PRIVADA CBBA. (SERVICIOS)'],

	    	['id' => '41', 'desglose_id' => '8', 'dist' => 'COCHABAMBA', 'cod' => '30190', 'abre' => 'P.E.CBBA.', 'lit' => 'POLICIA ECOLÓGICA CBBA.'],

	    	['id' => '42', 'desglose_id' => '8', 'dist' => 'COCHABAMBA', 'cod' => '30194', 'abre' => 'F.E.L.C.N.CBBA.', 'lit' => 'F.E.L.C.N. COCHABAMBA'],

	    	['id' => '43', 'desglose_id' => '8', 'dist' => 'ORURO', 'cod' => '40182', 'abre' => 'C.D.PN.OR.', 'lit' => 'COMANDO DEPARTAMENTAL ORURO'],
	    	['id' => '44', 'desglose_id' => '4', 'dist' => 'ORURO', 'cod' => '40182', 'abre' => 'BAT.SEG.FP.OR.', 'lit' => 'BAT. SEG. FISICA PRIVADA OR. (SERVICIOS)'],

	    	['id' => '45', 'desglose_id' => '8', 'dist' => 'ORURO', 'cod' => '40194', 'abre' => 'F.E.L.C.N.OR.', 'lit' => 'F.E.L.C.N. ORURO'],

	    	['id' => '46', 'desglose_id' => '8', 'dist' => 'POTOSI', 'cod' => '50182', 'abre' => 'C.D.PN.PT.', 'lit' => 'COMANDO DEPARTAMENTAL POTOSI'],
	    	['id' => '47', 'desglose_id' => '4', 'dist' => 'POTOSI', 'cod' => '50182', 'abre' => 'BAT.SEG.FP.PT.', 'lit' => 'BAT. SEG. FISICA PRIVADA PT. (SERVICIOS)'],

	    	['id' => '48', 'desglose_id' => '8', 'dist' => 'POTOSI', 'cod' => '50194', 'abre' => 'F.E.L.C.N.PT.', 'lit' => 'F.E.L.C.N. POTOSÍ'],

	    	['id' => '49', 'desglose_id' => '8', 'dist' => 'TUPIZA', 'cod' => '50882', 'abre' => 'J.F.PN.TZA.', 'lit' => 'JEFATURA FRONTERIZA TUPIZA'],
	    	['id' => '50', 'desglose_id' => '4', 'dist' => 'TUPIZA', 'cod' => '50882', 'abre' => 'BAT.SEG.FPF.TZA.', 'lit' => 'BAT. SEG. FISICA PRIVADA FRONT. TUPIZA'],

	    	/* BUSCAR */
	    	['id' => '51', 'desglose_id' => '8', 'dist' => 'TUPIZA', 'cod' => '51194', 'abre' => 'F.E.L.C.N.TZA.', 'lit' => 'F.E.L.C.N. TUPIZA'],
	    	/* BUSCAR */

	    	['id' => '52', 'desglose_id' => '8', 'dist' => 'VILLAZON', 'cod' => '51582', 'abre' => 'J.F.PN.VIZN.', 'lit' => 'JEFATURA FRONTERIZA VILLAZON'],
	    	['id' => '53', 'desglose_id' => '4', 'dist' => 'VILLAZON', 'cod' => '51582', 'abre' => 'BAT.SEG.FPF.VIZN.', 'lit' => 'BAT. SEG. FISICA PRIVADA FRONT. VILLAZON'],

	    	['id' => '54', 'desglose_id' => '8', 'dist' => 'VILLAZON', 'cod' => '51594', 'abre' => 'F.E.L.C.N.VI.', 'lit' => 'F.E.L.C.N. VILLAZON'],

	    	['id' => '55', 'desglose_id' => '8', 'dist' => 'TARIJA', 'cod' => '60182', 'abre' => 'C.D.PN.TJA.', 'lit' => 'COMANDO DEPARTAMENTAL TARIJA'],
	    	['id' => '56', 'desglose_id' => '4', 'dist' => 'TARIJA', 'cod' => '60182', 'abre' => 'BAT.SEG.FP.TJA.', 'lit' => 'BAT. SEG. FISICA PRIVADA TJA. (SERVICIOS)'],

	    	['id' => '57', 'desglose_id' => '8', 'dist' => 'TARIJA', 'cod' => '60194', 'abre' => 'F.E.L.C.N.TJA.', 'lit' => 'F.E.L.C.N. TARIJA'],

	    	['id' => '58', 'desglose_id' => '8', 'dist' => 'YACUIBA', 'cod' => '60294', 'abre' => 'F.E.L.C.N.YA.', 'lit' => 'F.E.L.C.N. YACUIBA'],

	    	['id' => '59', 'desglose_id' => '8', 'dist' => 'YACUIBA', 'cod' => '60382', 'abre' => 'J.F.PN.YA.', 'lit' => 'JEFATURA FRONTERIZA YACUIBA'],
	    	['id' => '60', 'desglose_id' => '4', 'dist' => 'YACUIBA', 'cod' => '60382', 'abre' => 'BAT.SEG.FP.YA.', 'lit' => 'BAT. SEG. FISICA PRIVADA FRONT. YACUIBA'],

	    	['id' => '61', 'desglose_id' => '8', 'dist' => 'VILLAMONTES', 'cod' => '60482', 'abre' => 'J.F.PN.VITS.', 'lit' => 'JEFATURA PROVINCIAL VILLAMONTES'],
	    	['id' => '62', 'desglose_id' => '4', 'dist' => 'VILLAMONTES', 'cod' => '60482', 'abre' => 'BAT.SEG.FP.VITS.', 'lit' => 'BAT. SEG. FISICA PRIVADA FRONT. VILLAMONTES'],

	    	['id' => '63', 'desglose_id' => '8', 'dist' => 'BERMEJO', 'cod' => '60582', 'abre' => 'J.F.PN.BMJO.', 'lit' => 'JEFATURA FRONTERIZA BERMEJO'],
	    	['id' => '64', 'desglose_id' => '4', 'dist' => 'BERMEJO', 'cod' => '60582', 'abre' => 'BAT.SEG.FP.BMJO.', 'lit' => 'BAT. SEG. FISICA PRIVADA FRONT. BERMEJO'],

	    	['id' => '65', 'desglose_id' => '8', 'dist' => 'SANTA CRUZ', 'cod' => '70182', 'abre' => 'C.D.PN.SC.', 'lit' => 'COMANDO DEPARTAMENTAL SANTA CRUZ'],
	    	['id' => '66', 'desglose_id' => '3', 'dist' => 'SANTA CRUZ', 'cod' => '70182', 'abre' => 'C.D.PN.SC.IT.0', 'lit' => 'COMANDO DEPARTAMENTAL SANTA CRUZ - IT CERO '],
	    	['id' => '67', 'desglose_id' => '4', 'dist' => 'SANTA CRUZ', 'cod' => '70182', 'abre' => 'BAT.SEG.FP.SC.', 'lit' => 'BAT. SEG. FISICA PRIVADA SC. (SERVICIOS)'],

	    	['id' => '68', 'desglose_id' => '8', 'dist' => 'SANTA CRUZ', 'cod' => '70194', 'abre' => 'F.E.L.C.N.SC.', 'lit' => 'F.E.L.C.N. SANTA CRUZ'],

	    	['id' => '69', 'desglose_id' => '8', 'dist' => 'SAN MATIAS', 'cod' => '70294', 'abre' => 'F.E.L.C.N.SM.', 'lit' => 'F.E.L.C.N. SAN MATIAS'],

	    	['id' => '70', 'desglose_id' => '8', 'dist' => 'S. I. VELASCO', 'cod' => '70382', 'abre' => 'J.F.PN.SAIGVE.', 'lit' => 'JEFATURA PROVINCIAL SAN IGNACIO DE VELASCO'],

	    	['id' => '71', 'desglose_id' => '8', 'dist' => 'S. I. VELASCO', 'cod' => '70394', 'abre' => 'F.E.L.C.N.SAIGVE.', 'lit' => 'F.E.L.C.N. SAN IGNACIO DE VELASCO'],

	    	['id' => '72', 'desglose_id' => '8', 'dist' => 'SAN MATIAS', 'cod' => '70482', 'abre' => 'J.F.PN.SAMA.', 'lit' => 'JEFATURA FRONTERIZA SAN MATIAS'],

	    	['id' => '73', 'desglose_id' => '8', 'dist' => 'PTO. SUAREZ', 'cod' => '70582', 'abre' => 'J.F.PN.PTOSUA.', 'lit' => 'JEFATURA FRONTERIZA PUERTO SUAREZ'],
	    	['id' => '74', 'desglose_id' => '4', 'dist' => 'PTO. SUAREZ', 'cod' => '70582', 'abre' => 'BAT.SEG.FP.PTOSUA.', 'lit' => 'BAT. SEG. FISICA PRIVADA FRONT. PUERTO SUAREZ'],
	    	
	    	/* BUSCAR */
	    	['id' => '75', 'desglose_id' => '4', 'dist' => 'PTO. SUAREZ', 'cod' => '70594', 'abre' => 'F.E.L.C.N.PTOSUA.', 'lit' => 'F.E.L.C.N. PUERTO SUAREZ'],
			/* BUSCAR */

	    	['id' => '76', 'desglose_id' => '8', 'dist' => 'BENI', 'cod' => '80182', 'abre' => 'C.D.PN.BN.', 'lit' => 'CCOMANDO DEPARTAMENTAL BENI'],
	    	['id' => '77', 'desglose_id' => '4', 'dist' => 'BENI', 'cod' => '80182', 'abre' => 'BAT.SEG.FP.BN.', 'lit' => 'BAT. SEG. FISICA PRIVADA BN. (SERVICIOS)'],

	    	['id' => '78', 'desglose_id' => '8', 'dist' => 'RIBERALTA', 'cod' => '80186', 'abre' => 'J.F.PN.RIBE.', 'lit' => 'JEFATURA PROVINCIAL RIBERALTA'],
	    	['id' => '79', 'desglose_id' => '4', 'dist' => 'RIBERALTA', 'cod' => '80186', 'abre' => 'BAT.SEG.FP.RIBE.', 'lit' => 'BAT. SEG. FISICA PRIVADA FRONT. RIBERALTA'],

	    	['id' => '80', 'desglose_id' => '8', 'dist' => 'BENI', 'cod' => '80194', 'abre' => 'F.E.L.C.N.BN.', 'lit' => 'F.E.L.C.N. BENI'],

	    	['id' => '81', 'desglose_id' => '8', 'dist' => 'GUAYARAMERIN', 'cod' => '80282', 'abre' => 'J.F.PN.GUAY.', 'lit' => 'JEFATURA FRONTERIZA GUAYARAMERIN'],
	    	['id' => '82', 'desglose_id' => '4', 'dist' => 'GUAYARAMERIN', 'cod' => '80282', 'abre' => 'BAT.SEG.FP.GUAY.', 'lit' => 'BAT. SEG. FISICA PRIVADA FRONT. GUAYARAMERIN'],

	    	['id' => '83', 'desglose_id' => '8', 'dist' => 'PANDO', 'cod' => '90182', 'abre' => 'C.D.PN.PD.', 'lit' => 'COMANDO DEPARTAMENTAL PANDO'],
	    	['id' => '84', 'desglose_id' => '4', 'dist' => 'PANDO', 'cod' => '90182', 'abre' => 'BAT.SEG.FP.PD.', 'lit' => 'BAT. SEG. FISICA PRIVADA PDO. (SERVICIOS)'],

	    	['id' => '85', 'desglose_id' => '8', 'dist' => 'PANDO', 'cod' => '90194', 'abre' => 'F.E.L.C.N.PD.', 'lit' => 'F.E.L.C.N. PANDO']  	
    	];

        foreach ($statuses as $status) {

                Muserpol\Unit::create($status);
            
        }
    }
}
