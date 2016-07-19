@extends('affiliates.print.layoutPrint')


@section('content')
      <div class="title"><b>I. INFORMACIÓN DE PERSONAL</b></div>
      <div id="project">
          <table>
            <tr>
              <th colspan="2" class="grand service">DATOS DE TITULAR</th>
            </tr>
            <tr>
              <th class="service">NOMBRE DEL BENEFICIARIO</th>
              <td class="info" style="width: 60%">{!! $affiliate->getFullNametoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">CARNET DE IDENTIDAD</th>
              <td class="info">{!! $affiliate->identity_card !!}</td>
            </tr>
            <tr>
              <th class="service">FECHA DE NACIMIENTO</th>
              <td class="info">{!! $affiliate->getFullDateNactoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">NÚMERO ÚNICO DE AFILIADO-AFP</th>
              <td class="info">{!! $affiliate->nua !!}</td>
            </tr>
            <tr>
              <th class="service">ESTADO CIVIL</th>
              <td class="info">{!! $affiliate->getCivilStatus() !!}</td>
            </tr>
            <tr>
              <th class="service">EDAD</th>
              <td class="info">{!! $affiliate->getHowOld() !!}</td>
            </tr>
            <tr>
              <th class="service">DIRECCIÓN DOMICILIO</th>
              <td class="info">{!! $affiliate->getFullDirecctoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">FECHA DE FALLECIMIENTO</th>
              <td class="info">{!! $affiliate->getFull_fech_decetoPrint() !!}</td>
            </tr>
            <tr>
              <th class="service">CAUSA DE FALLECIMIENTO</th>
              <td class="info">{!! $affiliate->reason_decommissioned !!}</td>
            </tr>
          </table>
      </div>
      <div class="title"><b>II. INFORMACIÓN INSTITUCIONAL</b></div>
      <div id="project">
        <table>
            <tr>
              <th colspan="2" class="grand service">DATOS INSTITUCIONALES</th>
            </tr>
            <tr>
              <th class="service">MATRICULA</th>
              <td class="info" style="width: 60%">{!! $affiliate->registration !!}</td>
            </tr>
            <tr>
              <th class="service">ESTADO</th>
              <td class="info" style="width: 60%">{!! $affiliate->affiliate_state->name !!}</td>
            </tr>
            <tr>
              <th class="service">GRADO</th>
              <td class="info" style="width: 60%">{!! $affiliate->degree->name !!}</td>
            </tr>
            <tr>
              <th class="service">UNIDAD</th>
              <td class="info" style="width: 60%">{!! $affiliate->unit->shortened !!}</td>
            </tr>
            <tr>
              <th class="service">TIPO</th>
              <td class="info" style="width: 60%">{!! $affiliate->affiliate_type->name !!}</td>
            </tr>
            <tr>
              <th class="service">NRO. ITEM</th>
              <td class="info" style="width: 60%">{!! $affiliate->item !!}</td>
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
      
      
@endsection