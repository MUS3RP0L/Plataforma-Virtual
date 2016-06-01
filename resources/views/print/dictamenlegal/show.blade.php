<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Dictamen Legal</title>
    <link rel="stylesheet" href="assets/css/style.css" media="all" />
  </head>
  <body>
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
                    GESTIÓN 2016</b></h3>
              </th>
              <th style="width: 25%;border: 0px">
                <div id="logo2">
                  <img src="assets/images/escudo.jpg">
                </div>
              </th>
            </tr>
      </table>

       <h1><b>FONDO DE RETIRO<br>DICTAMEN LEGAL AFILIACIÓN</b></h1>
      <table class="tablet">
        <tr>
          <td style="width: 60%;border: 0px;">
            <div class="title"><b>I. INFORMACIÓN DE AFILIADO</b></div>
          </td>
          <td style="width: 40%;border: 0px;text-align:right;">
            <div class="title">Fecha de Emisión: La Paz, {!! $date !!}</div>
          </td>
        </tr>
      </table>

      <div id="project">
          <table>
            <tr>
              <th colspan="2" class="grand service">A) DATOS DEL SOLICITANTE</th>
            </tr>
            <tr>
              <th class="service">NOMBRE DEL BENEFICIARIO</th>
              <td class="info">{!! $solicitante->getFullNametoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">CARNET DE IDENTIDAD</th>
              <td class="info">{!! $solicitante->ci !!}</td>
            </tr>
          </table>
      </div>

      
                                            
      <div id="project">
          <table>
            <tr>
              <th colspan="2" class="grand service">C)DOCUMENTACIÓN PRESENTADA</th>
            </tr>
            <?php $i=1; ?>
             @foreach ($documentos as $item)
            <tr>
              <td class="info">{!! $i !!}</td>  
              <td class="info">{!! $item->requisito->name !!}</td>
           
            </tr>
            <?php $i++; ?>
            @endforeach

            
          </table>
      </div>

      

    </header>
    <footer>
      MUTUAL DE SERVICIOS AL POLICIA
    </footer>
  </body>
</html>