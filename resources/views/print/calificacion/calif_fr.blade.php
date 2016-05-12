<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Calificación</title>
    <link rel="stylesheet" href="assets/css/style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      {{-- <div id="logo">
          <img src="assets/images/logo.jpg">
      </div> --}}
      <table class="tableh">
            <tr>
              <th style="width: 25%;border: 0px;">
                <div id="logo">
                  <img src="assets/images/logo.jpg">
                </div>
              </th>
              <th style="width: 50%;border: 0px">
                <h3>MUTUAL DE SERVICIOS AL POLICÍA<br>
                    DIRECCIÓN DE BENEFICIOS ECONÓMICOS<br>
                    UNIDAD DE FONDO DE RETIRO POLICIAL INDIVIDUAL<br>
                    GESTIÓN 2016</h3>
              </th>
              <th style="width: 25%;border: 0px">
                <div id="logo2">
                  <img src="assets/images/escudo.png">
                </div>
              </th>
            </tr>
      </table>
      <h1>FICHA TÉCNICA DE CALIFICACIÓN<br>FONDO DE RETIRO POLICIAL INDIVIDUAL</h1>
    
      <div class="title">I. INFORMACIÓN DE AFILIADO</div>
      <div id="project">
          <table>
            <tr>
              <th colspan="2" class="grand service">A) DATOS DE TITULAR</th>
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
              <th colspan="2" class="grand service">B) DATOS INSTITUCIONALES</th>
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
              <th colspan="2" class="grand service">C) DATOS DE CONYUGE</th>
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
              <td class="info">{!! $titular->getFullNametoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">PARENTESCO CON TITULAR</th>
              <td class="info">{!! $titular->paren !!}</td>
            </tr>
            <tr>
              <th class="service">CARNET DE IDENTIDAD</th>
              <td class="info">{!! $titular->ci !!}</td>
            </tr>
            <tr>
              <th class="service">DIRECCIÓN DE DOMICILIO</th>
              <td class="info">{!! $titular->getFullDireccDomitoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">DIRECCIÓN DE TRABAJO</th>
              <td class="info">{!! $titular->getFullDireccTrabtoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">TELEFONO CELULAR Y/O DOMICILIO</th>
              <td class="info">{!! $titular->getFullNumber() !!}</td>
            </tr>
          </table>
      </div>
      
      <div class="title">II. INFORMACIÓN TÉCNICA</div>
      <table>
          <tr>
            <th colspan="2" class="grand service">A) ESTADO DE LA CUENTA INDIVIDUAL</th>
          </tr>
          <tr>
            <th class="service">PERIODO DE APORTES</th>
            <td class="info">{!! $calificacion->fech_ini_pcot ? "Desde " . $calificacion->getFull_fech_ini_pcot() . " - Hasta " . $calificacion->getFull_fech_fin_pcot() : '' !!}</td>
          </tr>       
          <tr>
            <th class="service">TIEMPO COTIZABLE</th>
            <td class="info">{!! $calificacion->fech_ini_pcot ? $calificacion->getYearsAndMonths_fech_pcot() : '' !!}</td>
          </tr>
          <tr>
            <th class="service">TOTAL DE MESES COTIZABLES</th>
            <td class="info">{!! $calificacion->fech_ini_pcot ? $calificacion->getMonths_fech_pcot() : '' !!}</td>
          </tr>
      </table>

      <table>
          <tr>
            <th colspan="2" class="grand service">B) DATOS ECONÓMICOS DEL AFILIADO</th>
          </tr>
          <tr>
            <th class="service">TOTAL COTIZABLE</th>
            <td class="total">{!! $cotizable !!}</td>
          </tr>
          <tr>
            <th class="service">TOTAL COTIZABLE ADICIONAL (ITEM "0")</th>
            <td class="total">0.00</td>
          </tr>
          <tr>
            <th class="service">TOTAL GENERAL COTIZABLE</th>
            <td class="grand total">{!! $cotizable !!}</td>
          </tr>
          <tr>
            <th class="service">TOTAL FONDO DE RETIRO (1,85%)</th>
            <td class="total">{!! $fon !!}</td>
          </tr>
          <tr>
            <th class="service">RENDIMIENTO OBTENIDO</th>
            <td class="total">0.00</td>
          </tr>
          <tr>
            <th class="service">TOTAL FONDO DE RETIRO</th>
            <td class="grand total">{!! $fon !!}</td>
          </tr>
      </table>
      {{-- <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div> --}}
    </header>
    <footer>
      MUTUAL DE SERVICIOS AL POLICIA
    </footer>
  </body>
</html>