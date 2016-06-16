@extends('print.layoutPrint')

@section('title')
<h3>
  <b>
    ARCHIVO DE BENEFICIOS ECONÓMICOS<br>
  </b>
</h3>
@endsection

@section('content')

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
@endsection