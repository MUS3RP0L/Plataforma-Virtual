@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
    
            <div class="row"> 
                 
                <div class="col-md-6">
                    <h3>{!! $afiliado->pat !!} {!! $afiliado->mat !!}  {!! $afiliado->nom !!} {!! $afiliado->nom2 !!} {!! $afiliado->ap_esp !!}</h3>
                    <h4><b>{!! $afiliado->grado->lit !!}</b></h4>
                </div>
             </div>

             <div id="logo">
                <img src="assets/images/logo.jpg">
              </div>
              <h1>FICHA TÉCNICA DE CALIFICACIÓN<br>FONDO DE RETIRO POLICIAL INDIVIDUAL</h1>
              <div class="title">A) DATOS DEL TITULAR</div>
              <div id="project">
                <div><span>NOMBRE DEL BENEFICIARIO</span>{!! $afiliado->getFullNametoPrint() !!}</div>
                <div><span>FECHA DE NACIMIENTO</span>{!! $afiliado->getFullDateNactoPrint() !!}</div>
                <div><span>NÚMERO DE MATRÍCULA</span>{!! $afiliado->matri !!}</div>
                <div><span>NÚMERO ÚNICO DE AFILIADO-AFPs</span>{!! $afiliado->nua !!}</div>
                <div><span>CARNET DE IDENTIDAD</span>{!! $afiliado->ci !!}</div>
                <div><span>ESTADO CIVIL</span>{!! $afiliado->getCivil() !!}</div>
                <div><span>EDAD</span>{!! $afiliado->getHowOld() !!}</div>
                <div><span>DIRECCIÓN DOMICILIO</span>{!! $afiliado->getFullDirecctoPrint() !!}</div>
                <div><span>FECHA DE FALLECIMIENTO</span>{!! $afiliado->getFull_fech_decetoPrint() !!}</div>
                <div><span>CAUSA DE FALLECIMIENTO</span>{!! $afiliado->motivo_dece !!}</div>
              </div>
              <br>
              <div class="title">B) DATOS INSTITUCIONALES</div>
              <div id="project">
                <div><span>GRADO</span>{!! $afiliado->grado->lit !!}</div>
                <div><span>FECHA DE ALTA</span>{!! $afiliado->getFullDateIngtoPrint() !!}</div>
                <div><span>FECHA DE BAJA</span>{!! $afiliado->getData_fech_bajatoPrint() !!}</div>
                <div><span>MOTIVO DE BAJA</span>{!! $afiliado->motivo_baja !!}</div>
                <div><span>PERIODO DE APORTE (S/g Cta. Individual)</span>{!! "Desde " . $afiliado->getFull_fech_ini_apor() . " Hasta " . $afiliado->getFull_fech_fin_apor() . " Total " . $afiliado->getYearsAndMonths_fech_ini_apor() !!}</div>
                <div><span>PERIODO DE SERVICIO (S/g Cmdo.)</span>{!! "Desde " . $afiliado->getFull_fech_ini_serv() . " Hasta " . $afiliado->getFull_fech_fin_serv() . " Total " . $afiliado->getYearsAndMonths_fech_fin_serv() !!}</div>
                <div><span>PERIODO ADICIONAL (En caso de anticipo)</span>{!! "Desde " . $afiliado->getFull_fech_ini_anti() . " Hasta " . $afiliado->getFull_fech_fin_anti() . " Total " . $afiliado->getYearsAndMonths_fech_ini_anti() !!}</div>
                <div><span>PERIODO RECONOCIMIENTO DE APORTES</span>{!! "Desde " . $afiliado->getFull_fech_ini_reco() . " Hasta " . $afiliado->getFull_fech_fin_reco() . " Total " . $afiliado->getYearsAndMonths_fech_ini_reco() !!}</div>
              </div>
              <br>
              <div class="title">C) DATOS DEL CONYUGE</div>
              <div id="project">
                <div><span>NOMBRE DE CONYUGE</span>{!! $conyuge->getFullNametoPrint() !!}</div>
                <div><span>FECHA DE NACIMIENTO</span>{!! $conyuge->getFullDateNactoPrint() !!}</div>
                <div><span>CARNET DE IDENTIDAD</span>{!! $conyuge->ci !!}</div>
                <div><span>FECHA DE FALLECIMIENTO</span>{!! $conyuge->getFull_fech_decetoPrint() !!}</div>
                <div><span>CAUSA DE FALLECIMIENTO</span>{!! $conyuge->motivo_dece !!}</div>
              </div>
      


        </div>
    </div>
</div>



@endsection

