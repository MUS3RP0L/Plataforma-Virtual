@extends('print.layoutPrint')

@section('content')

      <h1><b>VENTANILLA DE ATENCIÓN AL AFILIADO<br>FONDO DE RETIRO POLICIAL INDIVIDUAL</b></h1>
      
      <table class="tablet">
        <tr>
          <td style="width: 60%;border: 0px;">
            <div class="title"><b>N° Tramite: {{ $fondoTramite->id }}</b></div>
          </td>

          <td style="width: 40%;border: 0px;text-align:right;">
            <div class="title">Fecha de Emisión: La Paz, {!! $date !!}</div>
          </td>
        </tr>
        <tr>
            <td style="width: 60%;border: 0px;">
             <div class="title"></div>
            </td>
            <td style="width: 40%;border: 0px;text-align:right;">
             <div class="title"><b>Usuario: {{ Auth::user()->ape }} {{ Auth::user()->nom }}</b></div>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="border: 0px;text-align:center;"><b>MODALIDAD:{!! $fondoTramite->modalidad->name !!}</td>
            
        </tr>
      </table>

      <div id="project">
        <table>
            <tr>
                <td style="width: 60%;border: 0px;">
                <div class="title"><b>I. DATOS GENERALES</b></div>
                </td>
            </tr>
            <tr>
              <th class="service">SOLICITANTE</th>
              <td class="info">{!! $solicitante->getFullNametoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">TITULAR</th>
              <td class="info">{!! $afiliado->getFullNametoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">PARENTESCO DEL TITULAR</th>
              <td class="info">{!! $solicitante->getParentesco() !!}</td>
            </tr>
            <tr>
              <th class="service">CARNET DE IDENTIDAD</th>
              <td class="info">{!! $solicitante->ci !!}</td>
            </tr>
            <tr>
              <th class="service">FECHA DE NACIMIENTO</th>
              <td class="info">{!! $solicitante->getFullDateNactoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">DIRECCIÓN DE DOMICILIO</th>
              <td class="info">{!! $solicitante->getFullDireccDomitoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">TELEFONO DOMICILIO</th>
              <td class="info">{!! $solicitante->tele_domi !!}</td>
            </tr>
            <tr>
              <th class="service">TELEFONO CELULAR</th>
              <td class="info">{!! $solicitante->celu_domi !!}</td>
            </tr>
            <tr>
              <th class="service">CIUDAD</th>
              <td class="info">{!! $fondoTramite->departamento->name !!}</td>
            </tr>
          </table>
      </div>

     <table class="tablet">
        <tr>
          <td style="width: 60%;border: 0px;">
            <div class="title"><b>II. REQUISITOS PRESENTADOS</b></div>
          </td>
         
        </tr>
      </table>

      <div id="project">
          <table>
           <tr>
              <th class="grand service"><center>NRO</center></th>
              <th class="grand service"><center>REQUISITO</center></th>
              <th class="grand service"><center>PRESENTADO</center></th>
              <th class="grand service"><center>FECHA</center></th>
            </tr>
            <?php $i=1; ?>
             @foreach ($documentos as $item)
            <tr>
              <td style="width: 5%";class="info">{!! $i !!}</td>  
              <td style="width: 90%";class="info">{!! $item->requisito->name !!}</td>
               @if ($item->est == 1)
                  <td class="info"><center><img class="circle" src="{!! asset('assets/images/check.png') !!}"  alt="icon"></center></td>


               @else
                  <td class="info"> </td>
               @endif
              <td style="width: 20%";class="info"><center>{!! $item->getDataEdit() !!}</center></td>
           
            </tr>
            <?php $i++; ?>
            @endforeach
            
          </table>
      </div>

@endsection