@extends('contribution_payments.print.header')

@section('content')

<br>
<table class="table">
    <tr>
        <th style="border: 0px;text-align:left;">
            Titular: {{ $affiliate->getTittleName() }}
        </th>
        <th style="border: 0px">
          Matrícula: {{ $affiliate->registration }}
        </th>
        <th style="border: 0px">
          Tipo: {{ $affiliate->affiliate_state->name }}
        </th>
    </tr>
    <tr>
      <th style="border: 0px;text-align:left;">
        Titular: {{ $affiliate->degree->name }}
      </th>
    </tr>
</table>

<div id="project">
    <table>
      <tr>
        <th colspan="2" class="grand service" style="text-align:left;">Periodo:</th>
      </tr>
    </table>
</div>

<div id="project">
    <table>
      <tr>
        <td class="grand service" style="text-align:center;" >Cotizable</td>
        <td class="grand service" style="text-align:center;">Aporte
        <td class="grand service" style="text-align:center;">F.R.P.</td></td>
        <td class="grand service" style="text-align:center;">Cuota Mortuoria</td>
        <td class="grand service" style="text-align:center;">Ajuste IPC</td>
        <td class="grand service" style="text-align:center;">Total Aporte</td>
      </tr>
      <tr>
        <th class="info" style="text-align:center;" >{{ $ContributionPayment->quotable }}</th>
        <th class="info" style="text-align:center;">{{ $ContributionPayment->subtotal }}</th>
        <th class="info" style="text-align:center;">{{ $ContributionPayment->retirement_fund }}</th>
        <th class="info" style="text-align:center;">{{ $ContributionPayment->mortuary_quota }}</th>
        <th class="info" style="text-align:center;">{{ $ContributionPayment->ipc }}</th>
        <th class="info" style="text-align:center;">{{ $ContributionPayment->total }}</th>
      </tr>

    </table>
    <br>
    <br>
    <br>
    <br>
    <table>
          <tr>
              <th class="info" style="border: 0px;text-align:center;">--------------------------------</th>
              <th class="info" style="border: 0px;text-align:center;">--------------------------------</th>
              <th class="info" style="border: 0px;text-align:center;">--------------------------------</th>
          </tr>
          <tr>
              <th class="info" style="border: 0px;text-align:center;" >ELABORADO POR</th>
              <th class="info" style="border: 0px;text-align:center;" >PAGADO POR</th>
              <th class="info" style="border: 0px;text-align:center;" >COBRADO POR</th>
          </tr>
    </table>
    <p>***Esta liquidación no es válida sin el Refrendo y Sello de Tesorería***
</div>




@endsection
