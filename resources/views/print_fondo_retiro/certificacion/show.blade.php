@extends('print_fondo_retiro.layoutPrint')

@section('title')
  ARCHIVO DE BENEFICIOS ECONÓMICOS
@endsection

@section('title2')
  CERTIFICACIÓN
@endsection

@section('content')

      <p>El suscrito Encargado de  Archivo de Beneficios Económicos:</p>
      <p>CERTIFICA QUE:</p>
      <p>A  requerimiento  de la Hoja de trámite N° {{ $fondoTramite->getNumberTram() }} de  Ventanilla de Beneficios Económicos,  se realiza  la  revisión manual de los datos que  figuran en el expediente presentado  en  favor del titular señor(a):</p>
      </table>

      <table class="tablet1">
        <tr>
            <td class="cert">{!! $afiliado->nom !!}</td>
            <td class="cert">{!! $afiliado->pat !!}</td>
            <td class="cert">{!! $afiliado->mat !!}</td>
            @if ($afiliado->ap_esp)
            <td class="cert">{!! $afiliado->ap_esp !!}</td>
            @endif
        </tr>
        <tr>
            <td class="certitle" style="width: 30%">NOMBRES</td>
            <td class="certitle" style="width: 23%">PATERNO</td>
            <td class="certitle" style="width: 23%">MATERNO</td>
            @if ($afiliado->ap_esp)
            <td class="certitle" style="width: 23%">APELLIDO MATRIMONIO</td>
            @endif
        </tr>    
      </table>
      <table class="tablet1">
        <tr>
              <td class="cert">{!! $afiliado->ci !!}</td>
              <td class="cert"></td>
              <td class="certitle2"></td>
              <td class="cert">{!! $afiliado->matri !!}</td>
              <td class="certitle2"></td>
              <td class="cert">{!! $afiliado->grado->abre !!}</td>
              
        </tr>
        <tr>
              <td class="certitle" style="width: 25%">CI.</td>
              <td class="certitle" style="width: 10%">EXPEDIDO</td>
              <td class="certitle" style="width: 12%"></td>
              <td class="certitle" style="width: 16%">MATRICULA</td>
              <td class="certitle" style="width: 12%"></td>
              <td class="certitle" style="width: 25%">GRADO</td>
        </tr>
      </table>
      <br>
      <div class="title"><b>I. ANTECEDENTE DE CARPETA </b></div>
      <p>Estableciendo que SI /  NO   existe expediente del referido<br>Tipo de tramite cancelado.</p>

      <div id="project">
          <table>
             <tr>
              <th class="grand service"><center>TIPO DE PRESTACIÓN</center></th>
              <th class="grand service"><center>SIGLA</center></th>
              <th class="grand service"><center>ESTADO</center></th>
             </tr>             
              @foreach ($antecedentes as $item)
              <tr>              
                <td style="width: 80%" class="info">{!! $item->prestacion->name !!}</td>
                <td style="width: 20%" class="info">{!! $item->prestacion->sigla !!}</td>
                @if ($item->est == 1)
                  <td class="info"><center><img class="circle" src="{!! asset('assets/images/check.png') !!}" style="width:70%" alt="icon"></center></td>
                @else
                <td class="info"> </td>
                @endif
                
              </tr>              
              @endforeach           
          </table>
      </div>
      <br>
      <div class="title"><b>II. CARPETA ACTUAL</b></div>
        <div id="project">
            <table>
              <tr>
                  <th class="grand service"><center>FECHA ALTA</center></th>
                  <th class="grand service"><center>FECHA BAJA</center></th>
                  <th class="grand service"><center>MOTIVO BAJA</center></th>
                  <th class="grand service"><center>FECHA FALLECIMIENTO</center></th>
                  <th class="grand service"><center>N° FOJAS DEL EXPEDIENTE</center></th>
                
              </tr>
              <tr>
                  <td class="info"><center>{!! $afiliado->getDataEdit_fech_ing() !!}</center></td>
                  <td class="info"><center>{!! $afiliado->getData_fech_baja() !!}</center></td>
                  <td class="info"><center>{!! $afiliado->motivo_baja !!}</center></td>
                  <td class="info"><center>{!! $afiliado->getDataEdit() !!}</center></td>
                  <td class="info"> </td>
              </tr>
            </table>
        </div>
        <br>
        <div class="title"><b>TRÁMITE ACTUAL PRESENTADO  POR   FRP – FALL. SOLICITADO POR:</b></div>
        <div id="project">
            <table>
              <tr>
                  <th class="grand service"><center>NOMBRES</center></th>
                  <th class="grand service"><center>APELLIDO PATERNO</center></th>
                  <th class="grand service"><center>APELLIDO MATERNO</center></th>
                  <th class="grand service"><center>APELLIDO MATRIMONIO</center></th>
                  <th class="grand service"><center>VINCULO CON TITULAR</center></th>                
              </tr>                     
              <tr>
                    
                    <td class="info">{!! $solicitante->nom !!}</td>
                    <td class="info">{!! $solicitante->pat !!}</td>
                    <td class="info">{!! $solicitante->mat !!}</td>
                    <td class="info"></td>
                    <td class="info">{!! $solicitante->paren !!}</td>
              </tr>               
            </table>
        </div>
        <br>
        <b>Es cuanto certifico para fines consiguientes.</b>
@endsection