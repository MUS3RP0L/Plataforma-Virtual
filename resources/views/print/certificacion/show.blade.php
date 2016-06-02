<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Certificación</title>
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

      <h1><b>ARCHIVO<br>CERTIFICACIÓN</b></h1>

      <table class="tablet">
        <tr>
          <td style="width: 60%;border: 0px;">
            <div class="title"></div>
          </td>
          <td style="width: 40%;border: 0px;text-align:right;">
            <div class="title">Fecha de Emisión: La Paz, {!! $date !!}</div>
          </td>
        </tr>
      </table><br>

      <p>El suscrito Encargado de  Archivo de Beneficios Económicos:</p>
      <p>CERTIFICA QUE:</p>
      <p>A  requerimiento  de la Hoja de trámite N° {!! $fondoTramite->id !!} /2016 de  Ventanilla I de Beneficios Económicos,  se realiza  la  revisión manual de los datos que  figuran en el expediente presentado  en  favor del titular señor(a):</p>
      </table>
      <br>

      <table class="tablet1">

        <tr>
              <th class="service">TITULAR</th>
              <td class="info">{!! $afiliado->nom !!}</td>
              <td class="info">{!! $afiliado->pat !!}</td>
              <td class="info">{!! $afiliado->mat !!}</td>
              <td class="info">{!! $afiliado->ap_esp !!}</td>
        </tr>
        <tr>
              <td class="info"></td>
              <td class="info">NOMBRES</td>
              <td class="info">PATERNO</td>
              <td class="info">MATERNO</td>
              <td class="info">APELLIDO MATRIMONIO</td>
        </tr>

        <tr>
              <td class="info"></td>
              <td class="info">{!! $afiliado->ci !!}</td>
              <td class="info"> </td>
              <td class="info">{!! $afiliado->nua !!}</td>
              <td class="info">{!! $afiliado->grado->abre !!}</td>
              
        </tr>
        <tr>
              <td class="info"></td>
              <td class="info">CI.</td>
              <td class="info">EXPEDIDO</td>
              <td class="info">MATRICULA</td>
              <td class="info">GRADO</td>
              
        </tr>
      </table>
      <br>
      <div class="title"><b>I. ANTECEDENTE DE CARPETA </b></div>
              <P>Estableciendo que SI /  NO   existe expediente del referido</p>
              <P>Tipo de tramite cancelado.</P> <br>

      <div id="project">
          <table>
             <tr>
              <th class="grand service"><center>TIPO DE PRESTACIÓN</center></th>
              <th class="grand service"><center>SIGLA</center></th>
              <th class="grand service"><center>EXISTE</center></th>
              
             </tr>
              
              @foreach ($antecedentes as $item)
              <tr>
              
                <td style="width: 80%";class="info">{!! $item->prestacion->name !!}</td>
                <td style="width: 20%";class="info">{!! $item->prestacion->sigla !!}</td>
                @if ($item->est == 1)
                <td class="info"><center><img class="circle" src="{!! asset('assets/images/check.png') !!}"  alt="icon"></center></td>


                @else
                <td class="info"> </td>
                @endif
                
              </tr>
              
              @endforeach
            
          </table>
      </div>
      <br>
      
      <div class="title"><b>II. CARPETA ACTUAL</b></div><br>

      <div id="project">
          <table>
            <tr>
                <th class="grand service"><center>FECHA ALTA</center></th>
                <th class="grand service"><center>FECHA BAJA</center></th>
                <th class="grand service"><center>MOTIVO BAJA</center></th>
                <th class="grand service"><center>FECHA NACIMIENTO</center></th>
                <th class="grand service"><center>N° FOJAS DEL EXPEDIENTE</center></th>
              
            </tr>
            <tr>
                <td class="info">{!! $afiliado->getDataEdit_fech_ing() !!}</td>
                <td class="info">{!! $afiliado->getData_fech_baja() !!}</td>
                <td class="info">{!! $afiliado->motivo_baja !!}</td>
                <td class="info">{!! $afiliado->getDataEdit() !!}</td>
                <td class="info"> </td>
                  
            </tr>
                        
          </table>
      </div>
      
      <div class="title"><b>TRÁMITE  ACTUAL PRESENTADO  POR   FRP – FALL. SOLICITADO POR:</b></div><br>
      
      <div id="project">
          <table>
            <tr>
                
                <th class="grand service"><center>NOMBRES</center></th>
                <th class="grand service"><center>APELLIDO PATERNO</center></th>
                <th class="grand service"><center>APELLIDO MATERNO</center></th>
                <th class="grand service"><center>APELLIDO MATRIMONIO</center></th>
                <th class="grand service"><center>VINCULO CON EL TITULAR</center></th>
              
            </tr>
            
            
            <tr>
                  
                  <td class="info">{!! $solicitante->nom !!}</td>
                  <td class="info">{!! $solicitante->pat !!}</td>
                  <td class="info">{!! $solicitante->mat !!}</td>
                  <td class="info"></td>
                  <td class="info">{!! $solicitante->paren !!}</td>
            </tr>
                                   
          </table>
      </div><br>
      <b>Es cuanto certifico para fines consiguientes.</b>

    </header>
    <footer>
      MUTUAL DE SERVICIOS AL POLICIA
    </footer>
  </body>
</html>