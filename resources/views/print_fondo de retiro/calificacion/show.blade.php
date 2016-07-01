@extends('print.layoutPrint')

@section('title')
  FICHA TÉCNICA DE CALIFICACIÓN
@endsection

@section('title2')
  CALIFICACIÓN<br>
  <h3>(Página 1/2)</h3>
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
              <td class="info" style="width: 60%">{!! $afiliado->getFullNametoPrint() !!}</td>
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
              <td class="info" style="width: 60%">{!! $afiliado->grado->lit !!}</td>
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
              <td class="info" style="width: 60%">{!! $conyuge->getFullNametoPrint() !!}</td>
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
              <th colspan="2" class="grand service">DATOS DE SOLICITANTE</th>
            </tr>
            <tr>
              <th class="service">NOMBRE DE SOLICITANTE</th>
              <td class="info" style="width: 60%">{!! $solicitante->getFullNametoPrint() !!}</td>
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

      

<div class="page-break"></div>



    <header class="clearfix">
        <table class="tableh">
              <tr>
                <th style="width: 25%;border: 0px;">
                  <div id="logo">
                    <img src="assets/images/logo.jpg">
                  </div>
                </th>
                <th style="width: 50%;border: 0px">
                  <h3><b>MUTUAL DE SERVICIOS AL POLICÍA<br>
                      DIRECCIÓN DE BENEFICIOS ECONÓMICOS<br>
                      UNIDAD DE FONDO DE RETIRO POLICIAL INDIVIDUAL<br>
                      FICHA TÉCNICA DE CALIFICACIÓN
                      </b></h3>
                </th>
                <th style="width: 25%;border: 0px">
                  <div id="logo2">
                    <img src="assets/images/escudo.jpg">
                  </div>
                </th>
              </tr>
        </table>
        <table class="tablet">
          <tr>
            <td style="border: 0px;">
              <div class="title"><b>N° de Tramite: {{ $fondoTramite->getNumberTram() }}</b></div>
            </td>
            <td style="border: 0px;text-align:right;">
              <div class="title"><b>Fecha de Emisión: La Paz, {!! $date !!}</b></div>
            </td>
          </tr>
          <tr>
              <td  colspan="2" style="border: 0px;text-align:right;">
               <div class="title">Usuario: {{ Auth::user()->ape }} {{ Auth::user()->nom }}</div>
              </td>
          </tr>
        </table>
        <h1>
          <b>       
            FONDO DE RETIRO POLICIAL INDIVIDUAL<br>
            MODALIDAD: {!! $fondoTramite->modalidad->name !!}<br>
            CALIFICACIÓN
            <h3>(Página 2/2)</h3>
          </b>
        </h1>
        <br>

    </header>

      <table class="tablet">
        <tr>
          <td style="width: 60%;border: 0px;">
            <div class="title"><b>II. INFORMACIÓN TÉCNICA</b></div>
          </td>
        </tr>
      </table>
      <br>
      <table>
          <tr>
            <th colspan="2" class="grand service">A) ESTADO DE LA CUENTA INDIVIDUAL</th>
          </tr>
          <tr>
            <th class="service">PERIODO DE APORTES</th>
            <td class="total">{!! $fondoTramite->fech_ini_pcot ? "Desde " . $fondoTramite->getFull_fech_ini_pcot() . " - Hasta " . $fondoTramite->getFull_fech_fin_pcot() : '' !!}</td>
          </tr>       
          <tr>
            <th class="service">TIEMPO COTIZABLE</th>
            <td class="total">{!! $fondoTramite->fech_ini_pcot ? $fondoTramite->getYearsAndMonths_fech_pcot() : '' !!}</td>
          </tr>
          <tr>
            <th class="service">TOTAL DE MESES COTIZABLES</th>
            <td class="total">{!! $fondoTramite->fech_ini_pcot ? $fondoTramite->getMonths_fech_pcot() : '' !!}</td>
          </tr>
      </table>

      <table>
          <tr>
            <th colspan="2" class="grand service">B) DATOS ECONÓMICOS DEL AFILIADO</th>
          </tr>
          <tr>
            <th class="service">TOTAL COTIZABLE</th>
            <td class="total">0.00</td>
          </tr>
          <tr>
            <th class="service">TOTAL COTIZABLE ADICIONAL (ITEM "0")</th>
            <td class="total">0.00</td>
          </tr>
          <tr>
            <th class="service">TOTAL GENERAL COTIZABLE</th>
            <td class="grand total">0.00</td>
          </tr>
          <tr>
            <th class="service">TOTAL FONDO DE RETIRO (1,85%)</th>
            <td class="total">0.00</td>
          </tr>
          <tr>
            <th class="service">RENDIMIENTO OBTENIDO</th>
            <td class="total">0.00</td>
          </tr>
          <tr>
            <th class="service">TOTAL FONDO DE RETIRO</th>
            <td class="grand total">0.00</td>
          </tr>
      </table>

      
@endsection