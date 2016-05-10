<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Calificación</title>
    <link rel="stylesheet" href="assets/css/style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
          <img src="assets/images/logo.jpg">
      </div>
      <h1>FICHA TÉCNICA DE CALIFICACIÓN<br>FONDO DE RETIRO POLICIAL INDIVIDUAL</h1>

      <div class="title">I. INFORMACIÓN DE AFILIADO</div>
      <div id="project">
          <table>
            <tr>
              <th colspan="2" class="service">A) DATOS DEL TITULAR</th>
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
              <td class="grand">{!! $afiliado->getCivil() !!}</td>
            </tr>
            <tr>
              <th class="service">EDAD</th>
              <td class="grand">{!! $afiliado->getHowOld() !!}</td>
            </tr>
            <tr>
              <th class="service">DIRECCIÓN DOMICILIO</th>
              <td class="grand">{!! $afiliado->getFullDirecctoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">FECHA DE FALLECIMIENTO</th>
              <td class="grand">{!! $afiliado->getFull_fech_decetoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">CAUSA DE FALLECIMIENTO</th>
              <td class="grand">{!! $afiliado->motivo_dece !!}</td>
            </tr>
          </table>
      </div>
      <div id="project">
        <table>
            <tr>
              <th colspan="2" class="service">B) DATOS INSTITUCIONALES</th>
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
              <td class="grand">{!! $afiliado->fech_ini_serv ? "DESDE " . $afiliado->getFull_fech_ini_serv() . " - HASTA " . $afiliado->getFull_fech_fin_serv() . "<br>TOTAL " . $afiliado->getYearsAndMonths_fech_fin_serv() : '' !!}</td>
            </tr>
            <tr>
              <th class="service">PERIODO ADICIONAL</th>
              <td class="grand">{!! $afiliado->fech_ini_anti ? "DESDE " . $afiliado->getFull_fech_ini_anti() . " - HASTA " . $afiliado->getFull_fech_fin_anti() . "<br>TOTAL " . $afiliado->getYearsAndMonths_fech_ini_anti() : '' !!}</td>
            </tr>
            <tr>
              <th class="service">PERIODO DE RECONOCIMIENTO</th>
              <td class="grand">{!! $afiliado->fech_ini_reco ? "DESDE " . $afiliado->getFull_fech_ini_reco() . " - HASTA " . $afiliado->getFull_fech_fin_reco() . "<br>TOTAL " . $afiliado->getYearsAndMonths_fech_ini_reco() : '' !!}</td>
            </tr>
          </table>
      </div>
      <br>
      <div class="title">C) DATOS DEL CONYUGE</div>
      <div id="project">
        <div><span>NOMBRE DE CONYUGE</span>{!! $conyuge->getFullNametoPrint() !!}</div>
        <div><span>FECHA DE NACIMIENTO</span>{!! $conyuge->getFullDateNactoPrint() !!}</div>
        <div><span>CARNET DE IDENTIDAD</span>{!! $conyuge->ci !!}</div>
        <div><span>FECHA DE FALLECIMIENTO</span>{!! $conyuge->getFull_fech_decetoPrint() !!}</div>
        <div><span>CAUSA DE FALLECIMIENTO</span>{!! $conyuge->motivo_dece !!}</div>
      </div>
      <br>
      <div class="title">D) SOLICITANTE</div>
      {{-- <div id="project">
        <div><span>NOMBRE DE SOLICITANTE</span>{!! $titular->getFullNametoPrint() !!}</div>
        <div><span>PARENTESCO CON TITULAR</span>{!! $titular->paren !!}</div>
        <div><span>CARNET DE IDENTIDAD</span>{!! $titular->ci !!}</div>
        <div><span>DIRECCIÓN DE DOMICILIO</span>{!! $titular->getFullDireccDomitoPrint() !!}</div>
        <div><span>DIRECCIÓN DE TRABAJO</span>{!! $titular->getFullDireccTrabtoPrint() !!}</div>
        <div><span>TELEFONO CELULAR Y/O DOMICILIO</span>{!! $titular->getFullNumber() !!}</div>
      </div> --}}
    </header>
    <main>
      {{-- <table>
          <tr>
            <th colspan="2" class="service">ESTADO DE LA CUENTA INDIVIDUAL</th>
          </tr>
          <tr>
            <th class="service">PERIODO DE APORTES</th>
            <td class="total">{!! "Desde " . $afiliado->getFull_fech_ini_reco() . " Hasta " . $afiliado->getFull_fech_fin_reco() !!}</td>
          </tr>       
          <tr>
            <th class="service">TOTAL COTIZABLE</th>
            <td class="total">{!! " Total " . $afiliado->getYearsAndMonths_fech_ini_reco() !!}</td>
          </tr>
          <tr>
            <th class="service">TOTAL DE MESES COTIZABLES</th>
            <td class="grand total">Developing</td>
          </tr>
      </table>

      <table>
          <tr>
            <th colspan="2" class="service">DATOS ECONÓMICOS DEL AFILIADO</th>
          </tr>
          <tr>
            <th class="service">TOTAL COTIZABLE</th>
            <td class="total"></td>
          </tr>
          <tr>
            <th class="service">TOTAL COTIZABLE ADICIONAL (ITEM "0")</th>
            <td class="total"></td>
          </tr>
          <tr>
            <th class="service">TOTAL GENERAL COTIZABLE</th>
            <td class="grand total"></td>
          </tr>
          <tr>
            <th class="service">TOTAL FONDO DE RETIRO (1,85%)</th>
            <td class="total"></td>
          </tr>
          <tr>
            <th class="service">RENDIMIENTO OBTENIDO</th>
            <td class="total"></td>
          </tr>
          <tr>
            <th class="service">TOTAL FONDO DE RETIRO</th>
            <td class="grand"></td>
          </tr>
      </table> --}}
      {{-- <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div> --}}
    </main>
    <footer>
      MUTUAL DE SERVICIOS AL POLICIA "MUSERPOL"
    </footer>
  </body>
</html>