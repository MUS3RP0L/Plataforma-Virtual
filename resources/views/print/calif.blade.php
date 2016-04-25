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
      <div class="title">A) DATOS DEL TITULAR</div>
      <div id="project">
        <div><span>NOMBRE DEL BENEFICIARIO</span>{!! $afiliado->getFullNametoPrint() !!}</div>
        <div><span>FECHA DE NACIMIENTO</span>{!! $afiliado->getFullDateNactoPrint() !!}</div>
        <div><span>NÚMERO DE MATRÍCULA</span>{!! $afiliado->matri !!}</div>
        <div><span>NÚMERO ÚNICO DE AFILIADO-AFPs</span>{!! $afiliado->nua !!}</div>
        <div><span>CARNET DE IDENTIDAD</span>{!! $afiliado->ci !!}</div>
        <div><span>ESTADO CIVIL</span>{!! $afiliado->getCivil() !!}</div>
        <div><span>EDAD</span>{!! $afiliado->getHowOld() !!}</div>
        <div><span>DIRECCIÓN DOMICILIO</span>{!! $afiliado->getFullDirecctoPrint() !!}</div>
        <div><span>FECHA DE FALLECIMIENTO</span>{!! $afiliado->getFull_fech_decetoPrint() !!}</div>
        <div><span>CAUSA DE FALLECIMIENTO</span>{!! $afiliado->motivo_dece !!}</div>
      </div>
      <br>
      <div class="title">B) DATOS INSTITUCIONALES</div>
      <div id="project">
        <div><span>GRADO</span>{!! $afiliado->grado->lit !!}</div>
        <div><span>FECHA DE ALTA</span>{!! $afiliado->getFullDateIngtoPrint() !!}</div>
        <div><span>FECHA DE BAJA</span>{!! $afiliado->getData_fech_bajatoPrint() !!}</div>
        <div><span>MOTIVO DE BAJA</span>{!! $afiliado->motivo_baja !!}</div>
        <div><span>PERIODO DE APORTE (S/g Cta. Individual)</span>{!! "Desde " . $afiliado->getFull_fech_ini_apor() . " Hasta " . $afiliado->getFull_fech_fin_apor() . " Total " . $afiliado->getYearsAndMonths_fech_ini_apor() !!}</div>
        <div><span>PERIODO DE SERVICIO (S/g Cmdo.)</span>{!! "Desde " . $afiliado->getFull_fech_ini_serv() . " Hasta " . $afiliado->getFull_fech_fin_serv() . " Total " . $afiliado->getYearsAndMonths_fech_fin_serv() !!}</div>
        <div><span>PERIODO ADICIONAL (En caso de anticipo)</span>{!! "Desde " . $afiliado->getFull_fech_ini_anti() . " Hasta " . $afiliado->getFull_fech_fin_anti() . " Total " . $afiliado->getYearsAndMonths_fech_ini_anti() !!}</div>
        <div><span>PERIODO RECONOCIMIENTO DE APORTES</span>{!! "Desde " . $afiliado->getFull_fech_ini_reco() . " Hasta " . $afiliado->getFull_fech_fin_reco() . " Total " . $afiliado->getYearsAndMonths_fech_ini_reco() !!}</div>
      </div>
      <br>
      {{-- <div class="title">C) DATOS DEL CONYUGE</div>
      <div id="project">
        <div><span>NOMBRE DE CONYUGE</span>{!! $conyuge->getFullNametoPrint() !!}</div>
        <div><span>FECHA DE NACIMIENTO</span>{!! $conyuge->getFullDateNactoPrint() !!}</div>
        <div><span>CARNET DE IDENTIDAD</span>{!! $conyuge->ci !!}</div>
        <div><span>FECHA DE FALLECIMIENTO</span>{!! $conyuge->getFull_fech_decetoPrint() !!}</div>
        <div><span>CAUSA DE FALLECIMIENTO</span>{!! $conyuge->motivo_dece !!}</div>
      </div>
      <br>
      <div class="title">D) SOLICITANTE</div>
      <div id="project">
        <div><span>NOMBRE DE SOLICITANTE</span>{!! $titular->getFullNametoPrint() !!}</div>
        <div><span>PARENTESCO CON TITULAR</span>{!! $titular->paren !!}</div>
        <div><span>CARNET DE IDENTIDAD</span>{!! $titular->ci !!}</div>
        <div><span>DIRECCIÓN DE DOMICILIO</span>{!! $titular->getFullDireccDomitoPrint() !!}</div>
        <div><span>DIRECCIÓN DE TRABAJO</span>{!! $titular->getFullDireccTrabtoPrint() !!}</div>
        <div><span>TELEFONO CELULAR Y/O DOMICILIO</span>{!! $titular->getFullNumber() !!}</div>
      </div> --}}
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">PERIODO DE APORTES</th>
            <th class="desc">DESCRIPTION</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service">Design</td>
            <td class="service">Creating a recognizable design solution based on the company's existing visual identity</td>

          </tr>
          <tr>
            <td class="service">Development</td>
            <td class="desc">Developing a Content Management System-based Website</td>
          </tr>
          {{-- <tr>
            <td colspan="4">SUBTOTAL</td>
            <td class="total">$5,200.00</td>
          </tr>
          <tr>
            <td colspan="4">TAX 25%</td>
            <td class="total">$1,300.00</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">$6,500.00</td>
          </tr> --}}
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      MUTUAL DE SERVICIOS AL POLICIA "MUSERPOL"
    </footer>
  </body>
</html>