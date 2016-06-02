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
            <div class="title"><b> </b></div>
          </td>
          <td style="width: 40%;border: 0px;text-align:right;">
            <div class="title">Fecha de Emisión: La Paz, {!! $date !!}</div>
          </td>
        </tr>
        <tr>
          <td style="width: 60%;border: 0px;">
            <div class="title"><b>REF: </b>FONDO DE RETIRO POLICIAL INDIVIDUAL</div>
          </td>
          <td style="width: 40%;border: 0px;text-align:right;">
            <div class="title"><b>MODALIDAD: </b>{!! $fondoTramite->modalidad->name !!}</div>
          </td>
        </tr>
      </table><br>

      <p align="justify"> En fecha {!! $date !!} mediante nota el Sr. {!! $solicitante->getFullNametoPrint() !!} 
        con CI. {!! $solicitante->ci !!} en calidad de BENEFICIARIO solicita la declaración de Fondo
        de Retiro policial {!! $fondoTramite->modalidad->name !!}, adjunto la documentación pertinente
        cumpliendo con los requisitos exigidos:
      </p>

      
                                            
      <div id="project">
          <table>
            <tr>
              <td style="width: 5%";class="info"><b>N°</b></td>
              <td class="info"><center><b>DOCUMENTACIÓN PRESENTADA</b><center></td>
            </tr>
            <?php $i=1; ?>
             @foreach ($documentos as $item)
            <tr>
              <td style="width: 5%";class="info">{!! $i !!}</td>  
              <td class="info">{!! $item->requisito->name !!}</td>
           
            </tr>
            <?php $i++; ?>
            @endforeach

            
          </table>
      </div><br>
      <p align="justify">
        Que, de acuerdo a la hoja de liquidacion <b>Nª {!! $fondoTramite->id !!}</b> y liquidacion FRP-556 de la fecha 8 de abril de 2015,
        correspondiente a abril de 1987 hasta marzo de 2013 años, realizado por el Calificador de la Direccion de
        Beneficios Economicos, por el periodo de 26 años y o meses, que en fecha 18 de abril de 2015, la Unidad
        de Recuperacion y Cobranza emite Certificacion de Prestamos con Garantia de Haberes, en el mismo certifica
        que no tiene deuda con la institucion.
      </p>

      <P>Reconociendoce el monto de TOTAL de Bs. ,a favor del beneficiario.</P>
      <p><b>Observación:</b> {!! $fondoTramite->obs !!}</p><br>

      <p align="justify">
        Por lo que, Acesoria Legal de la Direccion de Beneficios Económicos DICTAMINA, de acuerdo a los Arts. 3,
        5, 6, 19, 20, 21, 25, 30, y disposicion primera del Reglamento Fondo de Retiro Policial Individual de la 
        Mutual de Servicios al Polcia " MUSERPOL", Resolucion del Directorio Nª 01/ 2014 de la fecha 12 de marzo 
        de 2014, se reconosca los derechos y se otorgue el veneficio del Fondo de Retiro Policila Individual por 
        Jubilacion a favor de :
      </p>

      <p>
        <b>Sr. {!! $afiliado->getFullNametoPrint() !!}</b> con <b>CI. {!! $afiliado->ci !!}</b> en calidad de titular.
      </p>

    </header>
    <footer>
      MUTUAL DE SERVICIOS AL POLICIA
    </footer>
  </body>
</html>