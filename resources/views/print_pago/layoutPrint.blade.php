<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>PLATAFORMA VIRTUAL - MUSERPOL</title>
    <link rel="stylesheet" href="assets/css/style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">

      <table class="tableh">
            <tr>
              <th style="width: 25%;border: 0px;">
                <div id="logo">
                  <h2><b>MUTUAL DE SERVICIOS AL POLICÍA<br>
                    MUSERPOL
                    
                   </b></h2>
                </div>
              </th>
              <th style="width: 50%;border: 0px">
                <h2><b>Pago de Aportes Voluntarios<br>
                    APORTE DIRECTO DE VIUDAS<br>
                    EFECTIVO<br>
                    </b></h2>
              </th>
              <th style="width: 25%;border: 0px">
                <div id="logo2">
                  <h3><b>Fecha: {!! $aporte_pagos->fech_pago !!}<br>
                        Hora: <br>
                        Usuario: {!! $aporte_pagos->id !!}

                    </b></h3>
                </div>
              </th>
            </tr>
      </table>

      <table class="tablet">
        <tr>
          <td style="border: 0px;">
            <div class="title"><b>N° de Tramite: {{ $aportePago->getNumberTram() }}</b></div>
          </td>
          <td style="border: 0px;text-align:right;">
            <div class="title"><b>Fecha de Emisión: La Paz, {!! $aportePago->date !!}</b></div>
          </td>
        </tr>
      </table>

      <h1>
        <b>       
           @yield('title')<br>
          @yield('title2')
        </b>
      </h1>
      <br>

      @yield('content')

    </header>
    <footer>
      PLATAFORMA VIRUTAL - MUTUAL DE SERVICIOS AL POLICIA
    </footer>
  </body>
</html>