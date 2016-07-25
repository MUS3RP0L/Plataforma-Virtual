@extends('affiliates.print.layoutPrint')
@section('title2')
    <h3>(Página 1/2)</h3>
@endsection
@section('content')
<table>
  <tr>
    <td>
      <div class="title"><b>I. INFORMACIÓN DE PERSONAL</b></div>
      <div id="project">
          <table>
            <tr>
              <th colspan="2" class="grand service">DATOS DE TITULAR</th>
            </tr>
            <tr>
              <th class="service">NOMBRE DEL BENEFICIARIO</th>
              <td class="info" >{!! $affiliate->getFullNametoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">CARNET DE IDENTIDAD</th>
              <td class="info" >{!! $affiliate->identity_card !!}</td>
            </tr>
            <tr>
              <th class="service">FECHA DE NACIMIENTO</th>
              <td class="info" >{!! $affiliate->getFullDateNactoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">NÚMERO ÚNICO DE AFILIADO-AFP</th>
              <td class="info" >{!! $affiliate->nua !!}</td>
            </tr>
            <tr>
              <th class="service">ESTADO CIVIL</th>
              <td class="info" >{!! $affiliate->getCivilStatus() !!}</td>
            </tr>
            <tr>
              <th class="service">EDAD</th>
              <td class="info" >{!! $affiliate->getHowOld() !!}</td>
            </tr>
            <tr>
              <th class="service">DIRECCIÓN DOMICILIO</th>
              <td class="info" >{!! $affiliate->getFullDirecctoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service" >FECHA DE FALLECIMIENTO</th>
              <td class="info">{!! $affiliate->getFull_fech_decetoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service" >CAUSA DE FALLECIMIENTO</th>
              <td class="info">{!! $affiliate->reason_decommissioned !!}</td>
            </tr>
          </table>
      </div>
    </td>

    <td>
      <div class="title"><b>II. INFORMACIÓN INSTITUCIONAL</b></div>
      <div id="project">
        <table>
            <tr>
              <th colspan="2" class="grand service">DATOS INSTITUCIONALES</th>
            </tr>
            <tr>
              <th class="service">MATRICULA</th>
              <td class="info" >{!! $affiliate->registration !!}</td>
            </tr>
            <tr>
              <th class="service">ESTADO</th>
              <td class="info" >{!! $affiliate->affiliate_state->name !!}</td>
            </tr>
            <tr>
              <th class="service">GRADO</th>
              <td class="info" >{!! $affiliate->degree->name !!}</td>
            </tr>
            <tr>
              <th class="service">UNIDAD</th>
              <td class="info" >{!! $affiliate->unit->shortened !!}</td>
            </tr>
            <tr>
              <th class="service">TIPO</th>
              <td class="info" >{!! $affiliate->affiliate_type->name !!}</td>
            </tr>
            <tr>
              <th class="service">NRO. ITEM</th>
              <td class="info" >{!! $affiliate->item !!}</td>
            </tr>
            <tr>
              <th class="service">FECHA DE ALTA</th>
              <td class="info">{!! $affiliate->getFullDateIngtoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">FECHA DE BAJA</th>
              <td class="info">{!! $affiliate->getData_fech_bajatoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">MOTIVO DE BAJA</th>
              <td class="info">{!! $affiliate->reason_decommissioned !!}</td>
            </tr>

          </table>
      </div>
    </td>
  </tr>
</table>

<div class="title"><b>III. RESUMEN DE APORTE</b></div>
      <div id="project">
        <table>
            <tr>
              <th colspan="2" class="grand service">DATOS DE APORTE</th>
            </tr>
            <tr>
              <th class="service">GANADO</th>
              <td class="info" style="width: 60%">{!! $total_gain !!}</td>
            </tr>
            <tr>
              <th class="service">BONO DE SEGURIDAD CIUDADANA</th>
              <td class="info" style="width: 60%">{!! $total_public_security_bonus !!}</td>
            </tr>
            <tr>
              <th class="service">COTIZABLE</th>
              <td class="info" style="width: 60%">{!! $total_quotable !!}</td>
            </tr>
            <tr>
              <th class="service">APORTE FONDO DE RETIRO</th>
              <td class="info" style="width: 60%">{!! $total_retirement_fund !!}</td>
            </tr>
            <tr>
              <th class="service">APORTE SEGURO DE VIDA</th>
              <td class="info" style="width: 60%">{!! $total_mortuary_quota !!}</td>
            </tr>
             <tr>
              <th class="service">APORTE MUSERPOL</th>
              <td class="info" style="width: 60%">{!! $total !!}</td>
            </tr>
          </table>
</div>
<div class="page-break"></div>
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
                      UNIDAD DE FONDO DE RETIRO POLICIAL INDIVIDUAL
                      </b></h3>
                </th>
                <th style="width: 25%;border: 0px">
                  <div id="logo2">
                    <img src="assets/images/escudo.jpg">
                  </div>
                </th>
              </tr>
        </table>
        <table class="tablet">
          <tr>
            <td style="border: 0px;">
              <div class="title"><b>N° de Afiliado: {{ $affiliate->id }}</b></div>
            </td>
            <td style="border: 0px;text-align:right;">
              <div class="title"><b>Fecha de Emisión: La Paz, {!! $date !!}</b></div>
            </td>
          </tr>
          <tr>
              <td  colspan="2" style="border: 0px;text-align:right;">
               <div class="title">Usuario: {{ Auth::user()->last_name }} {{ Auth::user()->first_name }}</div>
              </td>
          </tr>
        </table>
        <h1>
          <b>
            REPORTE DE APORTES<br>
            <h3>(Página 2/2)</h3>
          </b>
        </h1>
        <br>
</header>

<div class="title"><b>IV. LISTA DE APORTES</b></div>
      <div id="project">
        <table>
           <tr>
              <th class="grand">N°</th>
              <th class="grand">GESTION</th>
              <th class="grand">GRADO</th>
              <th class="grand">UNIDAD</th>
              <th class="grand">ITEM</th>
              <th class="grand">SUELDO</th>
              <th class="grand">B ANTIGUEDAD</th>
              <th class="grand">B ESTUDIO</th>
              <th class="grand">B CARGO</th>
              <th class="grand">B FRONTERA</th>
              <th class="grand">B ORIENTE</th>
              <th class="grand">B SEGURIDAD</th>
              <th class="grand">GANADO</th>
              <th class="grand">COTIZABLE</th>
              <th class="grand">F.R.</th>
              <th class="grand">S.V.</th>
              <th class="grand">APORTE</th>

           </tr>
           <?php $i=1;?>
            @foreach($contributions as $item)
            <tr>
              <td class="info">{!! $i !!}</td>
              <td class="info">{!! $item->month_year !!}</td>
              <td class="info">{!! $item->degree_id ? $item->degree->code_level . "-" . $item->degree->code_degree : '' !!}</td>
              <td class="info">{!! $item->unit->code !!}</td>
              <td class="info">{!! $item->item !!}</td>
              <td class="info">{!! Util::formatMoney($item->base_wage) !!}</td>
              <td class="info">{!! Util::formatMoney($item->seniority_bonus) !!}</td>
              <td class="info">{!! Util::formatMoney($item->study_bonus) !!}</td>
              <td class="info">{!! Util::formatMoney($item->position_bonus) !!}</td>
              <td class="info">{!! Util::formatMoney($item->border_bonus) !!}</td>
              <td class="info">{!! Util::formatMoney($item->east_bonus) !!}</td>
              <td class="info">{!! Util::formatMoney($item->public_security_bonus) !!}</td>
              <td class="info">{!! Util::formatMoney($item->gain) !!}</td>
              <td class="info">{!! Util::formatMoney($item->quotable) !!}</td>
              <td class="info">{!! Util::formatMoney($item->retirement_fund) !!}</td>
              <td class="info">{!! Util::formatMoney($item->mortuary_quota) !!}</td>
              <td class="info">{!! Util::formatMoney($item->total) !!}</td>
            </tr>
            <?php $i++;?>
            @endforeach
        </table>



      </div>
@endsection
