@extends('print.layoutPrint')

@section('title')
<h1>
  <b>
  VENTANILLA DE ATENCIÓN AL AFILIADO<br>
  </b>
</h1>
@endsection

@section('content')
      
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
          MODALIDAD: {!! $fondoTramite->modalidad->name !!}
        </b>
      </h1>
      <br>
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
       <br> 
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
                <th class="grand">N°</th>
                <th class="grand">REQUISITO</th>
                <th class="grand">ESTADO</th>
                <th class="grand">FECHA</th>
              </tr>
              <?php $i=1;?>
               @foreach ($documentos as $item)
              <tr>
                <td style="width:1%" class="info">{!! $i !!}</td>  
                <td style="width:80%" class="info">{!! $item->requisito->name !!}</td>
                @if ($item->est == 1)
                  <td class="info"><center><img class="circle" src="{!! asset('assets/images/check.png') !!}" style="width:70%" alt="icon"></center></td>
                @else
                  <td class="info"> </td>
                @endif
                <td style="width:20%" class="info"><center>{!! $item->getData_fech_requi() !!}</center></td>
              </tr>
              <?php $i++;?>
              @endforeach         
            </table>
        </div>
        <br>
        <div id="notices">
          <div><b>Nota:</b></div>
          <div class="notice">Una vez presentada la documentación no sera devuelta.</div>
        </div>

@endsection