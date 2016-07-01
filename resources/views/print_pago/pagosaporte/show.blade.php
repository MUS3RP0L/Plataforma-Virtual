@extends('print_pago.layoutPrint')

@section('title')

  PAGO DE APORTES VOLUNTARIOS

@endsection

@section('title2')

  {{ $aportePago->getNumberTram() }}

@endsection

@section('content')

<div id="notices">
  <div><b>Nota:</b></div>
  <div class="notice">Esta liquidación no es válida sin el refrendo y sello de Tesorería.</div>
</div>

@endsection