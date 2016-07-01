@extends('print.layoutPrint2')

@section('title')

  VENTANILLA DE ATENCIÓN AL AFILIADO

@endsection

@section('title2')

  RECEPCIÓN

@endsection

@section('content')
      <div id="project">
        <table>
            <tr>
                <td style="width: 30%;border: 0px;">
                <div class="title"><b>I. DATOS GENERALES</b></div>
                </td>
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
            </table>
        </div>
        <br>
        <div id="notices">
          <div><b>Nota:</b></div>
          <div class="notice">Una vez presentada la documentación no sera devuelta.</div>
        </div>

@endsection