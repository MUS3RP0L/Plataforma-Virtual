@extends('print_pago.layoutPrint')

@section('title')

  PAGO DE APORTES VOLUNTARIOS

@endsection

@section('title2')

  {{ $aportePago->getNumberTram() }}

@endsection

@section('content')

<div id="content">
	<table class="tablet">
        <tr>
            <td style="border: 0px;">
              <div class="title"><b>Titular: {{ $afiliado->nom }}</b></div>
            </td>
            <td style="border: 0px;text-align:right;">
              <div class="title"><b>Matrícula: {!! $afiliado->matri !!}</b></div>
            </td>
            <td style="border: 0px;text-align:right;">
              <div class="title"><b>Tipo: {!! $afiliado->afi_state->state_type_id !!}</b></div>
            </td>
        </tr>
        <tr>
            <td style="border: 0px;">
            <div class="title"><b>Grado: {{ $afiliado->grado->lit }}</b></div>
            </td>
        </tr>
  </table>
  <hr>
  <p>Periodo: </P>
</div>

<div id="project">
            <table>
             <tr>
                <th class="grand">Cotizable</th>
                <th class="grand">Aporte</th>
                <th class="grand">F.R.P.</th>
                <th class="grand">Cuota Mortuaria</th>
                <th class="grand">Ajuste IPC</th>
                <th class="grand">Total Aporte</th>
              </tr>
              
              <tr>
                <td style="width:1%" class="info">{!! $aporte->cot !!}</td>  
                <td style="width:15%" class="info">{!! $aporte->mus !!}</td>
                <td style="width:15%" class="info">{!! $aporte->mus !!}</td>
                <td style="width:15%" class="info">{!! $aporte->mus !!}</td>
                <td style="width:15%" class="info">{!! $aporte->mus !!}</td>
                <td style="width:15%" class="info">{!! $aporte->mus !!}</td>
              </tr>
                   
            </table>
</div>


<div id="notices">
  <div><b>Nota:</b></div>
  <div class="notice">Esta liquidación no es válida sin el refrendo y sello de Tesorería.</div>
</div>

@endsection