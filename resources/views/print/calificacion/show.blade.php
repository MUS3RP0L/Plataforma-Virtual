@extends('print.layoutPrint')

@section('title')
  FICHA TÉCNICA DE CALIFICACIÓN
@endsection

@section('title2')
  CERTIFICACIÓN
@endsection

@section('content')
      <div class="title"><b>I. INFORMACIÓN DE AFILIADO</b></div>
      <div id="project">
          <table>
            <tr>
              <th colspan="2" class="grand service">DATOS DE TITULAR</th>
            </tr>
            <tr>
              <th class="service">NOMBRE DEL BENEFICIARIO</th>
              <td class="info">{!! $afiliado->getFullNametoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">CARNET DE IDENTIDAD</th>
              <td class="info">{!! $afiliado->ci !!}</td>
            </tr>
            <tr>
              <th class="service">FECHA DE NACIMIENTO</th>
              <td class="info">{!! $afiliado->getFullDateNactoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">NÚMERO DE MATRÍCULA</th>
              <td class="info">{!! $afiliado->matri !!}</td>
            </tr>
            <tr>
              <th class="service">NÚMERO ÚNICO DE AFILIADO-AFP</th>
              <td class="info">{!! $afiliado->nua !!}</td>
            </tr>
            <tr>
              <th class="service">ESTADO CIVIL</th>
              <td class="info">{!! $afiliado->getCivil() !!}</td>
            </tr>
            <tr>
              <th class="service">EDAD</th>
              <td class="info">{!! $afiliado->getHowOld() !!}</td>
            </tr>
            <tr>
              <th class="service">DIRECCIÓN DOMICILIO</th>
              <td class="info">{!! $afiliado->getFullDirecctoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">FECHA DE FALLECIMIENTO</th>
              <td class="info">{!! $afiliado->getFull_fech_decetoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">CAUSA DE FALLECIMIENTO</th>
              <td class="info">{!! $afiliado->motivo_dece !!}</td>
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
              <td class="info">{!! $afiliado->grado->lit !!}</td>
            </tr>
            <tr>
              <th class="service">FECHA DE ALTA</th>
              <td class="info">{!! $afiliado->getFullDateIngtoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">FECHA DE BAJA</th>
              <td class="info">{!! $afiliado->getData_fech_bajatoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">MOTIVO DE BAJA</th>
              <td class="info">{!! $afiliado->motivo_baja !!}</td>
            </tr>
            <tr>
              <th class="service">PERIODO DE APORTE</th>
              <td class="info">{!! $afiliado->fech_ini_apor ? "DESDE " . $afiliado->getFull_fech_ini_apor() . " - HASTA " . $afiliado->getFull_fech_fin_apor() . "<br>TOTAL " . $afiliado->getYearsAndMonths_fech_ini_apor() : '' !!}</td>
            </tr>
            <tr>
              <th class="service">PERIODO DE SERVICIO</th>
              <td class="info">{!! $afiliado->fech_ini_serv ? "DESDE " . $afiliado->getFull_fech_ini_serv() . " - HASTA " . $afiliado->getFull_fech_fin_serv() . "<br>TOTAL " . $afiliado->getYearsAndMonths_fech_fin_serv() : '' !!}</td>
            </tr>
            <tr>
              <th class="service">PERIODO ADICIONAL</th>
              <td class="info">{!! $afiliado->fech_ini_anti ? "DESDE " . $afiliado->getFull_fech_ini_anti() . " - HASTA " . $afiliado->getFull_fech_fin_anti() . "<br>TOTAL " . $afiliado->getYearsAndMonths_fech_ini_anti() : '' !!}</td>
            </tr>
            <tr>
              <th class="service">PERIODO DE RECONOCIMIENTO</th>
              <td class="info">{!! $afiliado->fech_ini_reco ? "DESDE " . $afiliado->getFull_fech_ini_reco() . " - HASTA " . $afiliado->getFull_fech_fin_reco() . "<br>TOTAL " . $afiliado->getYearsAndMonths_fech_ini_reco() : '' !!}</td>
            </tr>
          </table>
      </div>
      <div id="project">
          <table>
            <tr>
              <th colspan="2" class="grand service">DATOS DE CONYUGE</th>
            </tr>
            <tr>
              <th class="service">NOMBRE DE CONYUGE</th>
              <td class="info">{!! $conyuge->getFullNametoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">FECHA DE NACIMIENTO</th>
              <td class="info">{!! $conyuge->getFullDateNactoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">CARNET DE IDENTIDAD</th>
              <td class="info">{!! $conyuge->ci !!}</td>
            </tr>
            <tr>
              <th class="service">FECHA DE FALLECIMIENTO</th>
              <td class="info">{!! $conyuge->getFull_fech_decetoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">CAUSA DE FALLECIMIENTO</th>
              <td class="info">{!! $conyuge->motivo_dece !!}</td>
            </tr>
          </table>
      </div>
      <div id="project">
          <table>
            <tr>
              <th colspan="2" class="grand service">D) DATOS DE SOLICITANTE</th>
            </tr>
            <tr>
              <th class="service">NOMBRE DE SOLICITANTE</th>
              <td class="info">{!! $solicitante->getFullNametoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">PARENTESCO CON TITULAR</th>
              <td class="info">{!! $solicitante->paren !!}</td>
            </tr>
            <tr>
              <th class="service">CARNET DE IDENTIDAD</th>
              <td class="info">{!! $solicitante->ci !!}</td>
            </tr>
            <tr>
              <th class="service">DIRECCIÓN DE DOMICILIO</th>
              <td class="info">{!! $solicitante->getFullDireccDomitoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">DIRECCIÓN DE TRABAJO</th>
              <td class="info">{!! $solicitante->getFullDireccTrabtoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">TELEFONO CELULAR Y/O DOMICILIO</th>
              <td class="info">{!! $solicitante->getFullNumber() !!}</td>
            </tr>
          </table>
      </div>
@endsection