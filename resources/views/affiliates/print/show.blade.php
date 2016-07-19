@extends('affiliates.print.layoutPrint')


@section('content')
      <div class="title"><b>I. INFORMACIÓN DE PERSONAL</b></div>
      <div id="project">
          <table>
            <tr>
              <th colspan="2" class="grand service">DATOS DE TITULAR</th>
            </tr>
            <tr>
              <th class="service">NOMBRE DEL BENEFICIARIO</th>
              <td class="info" style="width: 60%">{!! $affiliate->getFullNametoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">CARNET DE IDENTIDAD</th>
              <td class="info">{!! $affiliate->identity_card !!}</td>
            </tr>
            <tr>
              <th class="service">FECHA DE NACIMIENTO</th>
              <td class="info">{!! $affiliate->getFullDateNactoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">NÚMERO DE MATRÍCULA</th>
              <td class="info">{!! $affiliate->registration !!}</td>
            </tr>
            <tr>
              <th class="service">NÚMERO ÚNICO DE AFILIADO-AFP</th>
              <td class="info">{!! $affiliate->nua !!}</td>
            </tr>
            <tr>
              <th class="service">ESTADO CIVIL</th>
              <td class="info">{!! $affiliate->getCivilStatus() !!}</td>
            </tr>
            <tr>
              <th class="service">EDAD</th>
              <td class="info">{!! $affiliate->getHowOld() !!}</td>
            </tr>
            <tr>
              <th class="service">DIRECCIÓN DOMICILIO</th>
              <td class="info">{!! $affiliate->getFullDirecctoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">FECHA DE FALLECIMIENTO</th>
              <td class="info">{!! $affiliate->getFull_fech_decetoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">CAUSA DE FALLECIMIENTO</th>
              <td class="info">{!! $affiliate->reason_decommissioned !!}</td>
            </tr>
          </table>
      </div>

      <div id="project">
        <table>
            <tr>
              <th colspan="2" class="grand service">DATOS INSTITUCIONALES</th>
            </tr>
            <tr>
              <th class="service">GRADO</th>
              <td class="info" style="width: 60%">{!! $affiliate->degree->name !!}</td>
            </tr>
            <tr>
              <th class="service">FECHA DE ALTA</th>
              <td class="info">{!! $affiliate->getFullDateIngtoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">FECHA DE BAJA</th>
              <td class="info">{!! $affiliate->getData_fech_bajatoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">MOTIVO DE BAJA</th>
              <td class="info">{!! $affiliate->reason_decommissioned !!}</td>
            </tr>
            <tr>
              <th class="service">PERIODO DE APORTE</th>
              <td class="info">{!! $affiliate->fech_ini_apor ? "DESDE " . $affiliate->getFull_fech_ini_apor() . " - HASTA " . $afiliado->getFull_fech_fin_apor() . "<br>TOTAL " . $afiliado->getYearsAndMonths_fech_ini_apor() : '' !!}</td>
            </tr>
            <tr>
              <th class="service">PERIODO DE SERVICIO</th>
              <td class="info">{!! $affiliate->fech_ini_serv ? "DESDE " . $affiliate->getFull_fech_ini_serv() . " - HASTA " . $afiliado->getFull_fech_fin_serv() . "<br>TOTAL " . $afiliado->getYearsAndMonths_fech_fin_serv() : '' !!}</td>
            </tr>
            <tr>
              <th class="service">PERIODO ADICIONAL</th>
              <td class="info">{!! $affiliate->fech_ini_anti ? "DESDE " . $affiliate->getFull_fech_ini_anti() . " - HASTA " . $afiliado->getFull_fech_fin_anti() . "<br>TOTAL " . $afiliado->getYearsAndMonths_fech_ini_anti() : '' !!}</td>
            </tr>
            <tr>
              <th class="service">PERIODO DE RECONOCIMIENTO</th>
              <td class="info">{!! $affiliate->fech_ini_reco ? "DESDE " . $affiliate->getFull_fech_ini_reco() . " - HASTA " . $afiliado->getFull_fech_fin_reco() . "<br>TOTAL " . $afiliado->getYearsAndMonths_fech_ini_reco() : '' !!}</td>
            </tr>
          </table>
      </div>
      
      
@endsection