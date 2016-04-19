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

                    <div class="col-md-6 text-right">  

                        <div class="btn-group">
                            <a href="javascript:void(0)" class="btn btn-raised btn-success">&nbsp;&nbsp;Aportes&nbsp;&nbsp;</span>
                            </a>
                            <a href="bootstrap-elements.html" data-target="#" class="btn btn-primary btn-raised btn-success dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{!! url('viewaporte/' . $afiliado->id) !!}">Mostrar Aportes&nbsp;<span class="glyphicon glyphicon-menu-hamburger"  aria-hidden="true"></span></a></li>
                                <li><a href="{!! url('regaportegest/' . $afiliado->id) !!}">Registrar Aporte&nbsp;<span class="glyphicon glyphicon-edit"  aria-hidden="true"></span></a></li>
                            </ul>
                        </div>

                        {{-- <a href="{!! url('afiliadoreporte/' . $afiliado->id) !!}" class="btn btn-raised btn-success">
                                Reporte de prestamo&nbsp;&nbsp;<span class="glyphicon glyphicon-edit"  aria-hidden="true"></span>
                        </a> --}}
                    </div>

                </div>
            

            <div class="row">
                <div class="col-md-6">


                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">  
                                <div class="col-md-11">
                                    <h3 class="panel-title">Información Personal</h3>
                                </div>
                                <div class="col-md-1 text-right" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                                    <div data-toggle="modal" data-target="#myModal-personal"> 
                                        <span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body" style="font-size: 14px">
                            <div class="row">
                                <div class="col-md-6">
                                    
                                    <table class="table table-responsive" style="width:100%;">
                                        <tr>
                                            <td style="border-top:0;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Carnet Identidad
                                                    </div>
                                                    <div class="col-md-6">
                                                         {!! $afiliado->ci !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-top:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Apellido Paterno
                                                    </div>
                                                    <div class="col-md-6">
                                                         {!! $afiliado->pat !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-top:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Apellido Materno
                                                    </div>
                                                    <div class="col-md-6">
                                                         {!! $afiliado->mat !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-top:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Primer Nombre
                                                    </div>
                                                    <div class="col-md-6">
                                                        {!! $afiliado->nom !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Segundo Nombre
                                                    </div>
                                                    <div class="col-md-6">
                                                        {!! $afiliado->nom2 !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @if ($afiliado->ap_esp)
                                        <tr>
                                            <td style="border-top:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Apellido de Esposo
                                                    </div>
                                                    <div class="col-md-6">
                                                        {!! $afiliado->ap_esp !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
                                    </table>

                                </div>

                                <div class="col-md-6">

                                    <table class="table" style="width:100%;">
                                        <tr>
                                            <td style="border-top:0;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Fecha Nacimiento
                                                    </div>
                                                    <div class="col-md-6">
                                                         {!! $afiliado->getFullDateNac() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-top:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Edad
                                                    </div>
                                                    <div class="col-md-6">
                                                        {!! $afiliado->getHowOld() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-top:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Sexo
                                                    </div>
                                                    <div class="col-md-6">
                                                        {!! $afiliado->getSex() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-top:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Estado Civil
                                                    </div>
                                                    <div class="col-md-6">
                                                        {!! $afiliado->getCivil() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Lugar Nacimiento
                                                    </div>
                                                    <div class="col-md-6">
                                                         {!! $afiliado->depa_nat !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    </table>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">  
                                <div class="col-md-11">
                                    <h3 class="panel-title">Información de Domicilio</h3>
                                </div>
                                <div class="col-md-1 text-right" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                                    <div data-toggle="modal" data-target="#myModal-domicilio"> 
                                        <span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body" style="font-size: 14px">
                            <div class="row" style="margin-bottom:0px;">

                                @if($info_dom == 1)

                                    <div class="col-md-6">

                                        <table class="table" style="width:100%;">
                                            <tr>
                                                <td style="border-top:0;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Departamento
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $afiliado->depa_dir !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Zona
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $afiliado->zona !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Calle
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $afiliado->calle !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>


                                    </div>

                                    <div class="col-md-6">

                                        <table class="table" style="width:100%;">
                                            <tr>
                                                <td style="border-top:0;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Núm Domicilio
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $afiliado->num_domi !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Teléfono
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $afiliado->tele !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Celular
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $afiliado->celu !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>

                                    </div>

                                @else
                                    <div class="row text-center">
                                        <div data-toggle="modal" data-target="#myModal-domicilio"> 
                                            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Adicionar Domicilio">
                                                <img class="circle" src="{!! asset('images/home.png') !!}" width="40px" alt="icon">                                                                          
                                            </button>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>


                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">  
                                <div class="col-md-11">
                                    <h3 class="panel-title">Información de Conyuge</h3>
                                </div>
                                <div class="col-md-1 text-right" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                                    <div data-toggle="modal" data-target="#myModal-conyuge"> 
                                        <span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body" style="font-size: 14px">
                            <div class="row" style="margin-bottom:0px;">

                                @if($info_cony == 1)

                                    <div class="col-md-6">

                                        <table class="table" style="width:100%;">
                                            <tr>
                                                <td style="border-top:0;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Carnet Identidad
                                                        </div>
                                                        <div class="col-md-6">
                                                             {!! $conyuge->ci !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Apellido Paterno
                                                        </div>
                                                        <div class="col-md-6">
                                                             {!! $conyuge->pat !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Apellido Materno
                                                        </div>
                                                        <div class="col-md-6">
                                                             {!! $conyuge->mat !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            

                                        </table>


                                    </div>

                                    <div class="col-md-6">

                                        <table class="table" style="width:100%;">
                                            <tr>
                                                <td style="border-top:0;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Nombre(s)
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $conyuge->nom !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Fecha Deceso
                                                        </div>
                                                        <div class="col-md-6">
                                                             {!! $conyuge->getFullDateNac() !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Motivo Deceso
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $conyuge->motivo_dece !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                        </table>

                                    </div>
                                    
                                @else
                                    <div class="row text-center">
                                        <div data-toggle="modal" data-target="#myModal-conyuge"> 
                                            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Adicionar Conyuge">
                                                <img class="circle" src="{!! asset('images/people.png') !!}" width="45px" alt="icon">                                                                          
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">  
                                <div class="col-md-11">
                                    <h3 class="panel-title">Información de Solicitante</h3>
                                </div>
                                <div class="col-md-1 text-right" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                                    <div data-toggle="modal" data-target="#myModal-titular"> 
                                        <span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body" style="font-size: 14px">
                            <div class="row" style="margin-bottom:0px;">

                                @if($info_titu == 1)

                                    <div class="col-md-6">

                                        <table class="table" style="width:100%;">
                                            <tr>
                                                <td style="border-top:0;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Carnet Identidad
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $titular->ci !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Paterno
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $titular->pat !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Materno
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $titular->mat !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Nombre(s)
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $titular->nom !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Parentesco
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $titular->paren !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                        </table>


                                    </div>

                                    <div class="col-md-6">

                                        <table class="table" style="width:100%;">
                                            <tr>
                                                <td style="border-top:0;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Zona Domicilio
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $titular->zona_domi !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Calle Domicilio
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $titular->calle_domi !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Núm Domicilio
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $titular->num_domi !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Teléfono Domicilio
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $titular->tele_domi !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Celular Electrónico
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $titular->celu_domi !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                        </table>

                                    </div>
                                    
                                @else
                                    <div class="row text-center">
                                        <div data-toggle="modal" data-target="#myModal-titular"> 
                                            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Adicionar Titular">
                                                <img class="circle" src="{!! asset('images/person.png') !!}" width="45px" alt="icon">                                                                          
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">  
                                <div class="col-md-10">
                                    <h3 class="panel-title">Información Policial</h3>
                                </div>
                                <div class="col-md-1 text-right" data-toggle="tooltip" data-placement="top" data-original-title="Historial">
                                    <div  data-toggle="modal" data-target="#myModal-record"> 
                                        <span class="glyphicon glyphicon-hourglass"  aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="col-md-1 text-right" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                                    <div  data-toggle="modal" data-target="#myModal-policial"> 
                                        <span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="panel-body" style="font-size: 14px">
                            <div class="row">
                                <div class="col-md-6">

                                    <table class="table" style="width:100%;">
                                        <tr>
                                            <td style="border-top:0;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Estado
                                                    </div>
                                                    <div class="col-md-6">
                                                         {!! $afiliado->afi_state->afi_type->name ." - ". $afiliado->afi_state->name !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-top:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Grado
                                                    </div>
                                                    <div class="col-md-6" data-toggle="tooltip" data-placement="bottom" data-original-title="{!! $afiliado->grado->lit !!}"> {!! $afiliado->grado->abre !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-top:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Unidad
                                                    </div>
                                                    <div class="col-md-6" data-toggle="tooltip" data-placement="bottom" data-original-title="{!! $afiliado->unidad->lit !!}">
                                                        {!! $afiliado->unidad->abre !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    </table>

                                </div>

                                <div class="col-md-6">

                                    <table class="table" style="width:100%;">
                                        <tr>
                                            <td style="border-top:0;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Núm. de Matrícula
                                                    </div>
                                                    <div class="col-md-6">
                                                        {!! $afiliado->matri !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-top:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Núm. de Ítem
                                                    </div>
                                                    <div class="col-md-6">
                                                        {!! $afiliado->item !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-top:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Fecha de Ingreso
                                                    </div>
                                                    <div class="col-md-6">
                                                        {!! $afiliado->getFullDateIng() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                    </table>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">                     
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="panel-title">Totales</h3>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="panel-title"style="text-align: right">Bolivianos</h3>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-hover" style="width:100%;font-size: 14px">
                                        <tr>
                                            <td>Ganado</td>
                                            <td style="text-align: right">{{ $totalGanado }}</td>
                                        </tr>
                                        <tr>
                                            <td>Bono de Seguridad Ciudadana</td>
                                            <td style="text-align: right">{{ $totalSegCiu }}</td>
                                        </tr>
                                        <tr class="active">
                                            <td>Cotizable</td>
                                            <td style="text-align: right">{{ $totalCotizableAd }}</td>
                                        </tr>
                                    </table>

                                    <table class="table table-bordered table-hover" style="width:100%;font-size: 14px">
                                        <tr>
                                            <td>Aporte Fondo de Retiro</td>
                                            <td style="text-align: right">{{ $totalFon }}</td>
                                        </tr>
                                        <tr>
                                            <td>Aporte Seguro de Vida</td>
                                            <td style="text-align: right">{{ $totalSegVid }}</td>
                                        </tr>
                                        <tr class="active">
                                            <td>Aporte Muserpol</td>
                                            <td style="text-align: right">{{ $totalMuserpol }}</td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                            
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<div id="myModal-personal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content panel-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Editar Información Personal</h4>
            </div>
            <div class="modal-body">

                {!! Form::model($afiliado, ['method' => 'PATCH', 'route' => ['afiliado.update', $afiliado->id], 'class' => 'form-horizontal']) !!}
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                <input type="hidden" name="type" value="per"/>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                                {!! Form::label('ci', 'CARNET IDENTIDAD', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('ci', $afiliado->ci, ['class'=> 'form-control', 'required']) !!}
                                <span class="help-block">Núm. Carnet de Identidad</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('pat', 'APELLIDO PATERNO', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('pat', $afiliado->pat, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Apellido Paterno</span>
                            </div>
                        </div>  
                        <div class="form-group">
                                {!! Form::label('mat', 'APELLIDO MATERNO', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('mat', $afiliado->mat, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Apellido Materno</span>
                            </div>
                        </div>                              
                        <div class="form-group">
                                {!! Form::label('nom', 'PRIMER NOMBRE', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('nom', $afiliado->nom, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Primer Nombre</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('nom2', 'SEGUNDO NOMBRE', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('nom2', $afiliado->nom2, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Segundo Nombre</span>
                            </div>
                        </div>
                        @if ($afiliado->sex == 'F')
                            <div class="form-group">
                                    {!! Form::label('ap_esp', 'APELLIDO ESPOSO', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::text('ap_esp', $afiliado->ap_esp, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                    <span class="help-block">Apellido de Esposo (Opcional)</span>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                                {!! Form::label('fech_nac', 'FECHA NACIMIENTO', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                    			<div class="input-group">
                                    <input type="text" class="form-control datepicker" name="fech_nac" value="{!! $afiliado->getDataEdit() !!}">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('sex', 'SEXO', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('sex', $afiliado->getSex(), ['class'=> 'form-control', 'disabled'=> '']) !!}
                                <span class="help-block">Sexo</span>
                            </div>
                        </div>
                        <div class="form-group">
                                    {!! Form::label('est_civ', 'ESTADO CIVIL', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::select('est_civ', $list_est_civ, $afiliado->est_civ, ['class' => 'combobox form-control', 'required']) !!}
                                <span class="help-block">Seleccione el estado civil</span>
                            </div>
                        </div>
                        <div class="form-group">
                                    {!! Form::label('depa_nat', 'LUGAR NACIMIENTO', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::select('depa_nat', $list_depas, $afiliado->depa_nat_id, ['class' => 'combobox form-control']) !!}
                                <span class="help-block">Seleccione Departamento</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{!! url('afiliado/' . $afiliado->id) !!}" data-target="#" class="btn btn-raised btn-warning">Cancelar&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span></a>
                            &nbsp;&nbsp;<button type="submit" class="btn btn-raised btn-primary">Actualizar&nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>

<div id="myModal-domicilio" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content panel-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Editar Información Domicilio</h4>
            </div>
            <div class="modal-body">

                {!! Form::model($afiliado, ['method' => 'PATCH', 'route' => ['afiliado.update', $afiliado->id], 'class' => 'form-horizontal']) !!}
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                <input type="hidden" name="type" value="dom"/>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                                    {!! Form::label('depa_dir', 'DEPARTA MENTO', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::select('depa_dir', $list_depas, $afiliado->depa_dir_id, ['class' => 'combobox form-control']) !!}
                                <span class="help-block">Seleccione Departamento</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('zona', 'ZONA', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('zona', $afiliado->zona, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Zona</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('calle', 'CALLE', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('calle', $afiliado->calle, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Calle</span>
                            </div>
                        </div>
                                                          
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                                {!! Form::label('num_domi', 'NÚMERO DOMICILIO', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('num_domi', $afiliado->num_domi, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Número de Domicilio</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('tele', 'TELÉFONO', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('tele', $afiliado->tele, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Teléfono fijo</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('celu', 'CELULAR', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('celu', $afiliado->celu, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Teléfono Celular</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{!! url('afiliado/' . $afiliado->id) !!}" data-target="#" class="btn btn-raised btn-warning">Cancelar&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span></a>
                            &nbsp;&nbsp;<button type="submit" class="btn btn-raised btn-primary">Actualizar&nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>

<div id="myModal-conyuge" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content panel-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Editar Información de Conyuge</h4>
            </div>
            <div class="modal-body">

                {!! Form::model($conyuge, ['method' => 'PATCH', 'route' => ['conyuge.update', $afiliado->id], 'class' => 'form-horizontal']) !!}
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                <input type="hidden" name="type" value="cony"/>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                                {!! Form::label('ci', 'CARNET IDENTIDAD', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('ci', $conyuge->ci, ['class'=> 'form-control', 'required']) !!}
                                <span class="help-block">Núm. Carnet de Identidad</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('pat', 'APELLIDO PATERNO', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('pat', $conyuge->pat, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Apellido Paterno</span>
                            </div>
                        </div>  
                        <div class="form-group">
                                {!! Form::label('mat', 'APELLIDO MATERNO', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('mat', $conyuge->mat, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Apellido Materno</span>
                            </div>
                        </div>  
                        <div class="form-group">
                                {!! Form::label('nom', 'NOMBRE(S)', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('nom', $conyuge->nom, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Nombre(s)</span>
                            </div>
                        </div>                            
                    </div>

                    <div class="col-md-6">
                        
                        <div class="form-group">
                                {!! Form::label('fech_dece', 'FECHA FALLECIMIENTO', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker" name="fech_dece" value="{!! $conyuge->getDataEdit() !!}">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('motivo_dece', 'CAUSA FALLECIMIENTO', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::textarea('motivo_dece', $conyuge->motivo_dece, ['class'=> 'form-control', 'cols' => '5', 'rows' => '4']) !!}
                                <span class="help-block">Motivo de fallecimiento</span>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="row text-center">
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{!! url('afiliado/' . $afiliado->id) !!}" data-target="#" class="btn btn-raised btn-warning">Cancelar&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span></a>
                            &nbsp;&nbsp;<button type="submit" class="btn btn-raised btn-primary">Actualizar&nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>

<div id="myModal-titular" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content panel-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Editar Información de Soli</h4>
            </div>
            <div class="modal-body">

                {!! Form::model($titular, ['method' => 'PATCH', 'route' => ['titular.update', $afiliado->id], 'class' => 'form-horizontal']) !!}
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                <input type="hidden" name="type" value="titu"/>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                                {!! Form::label('ci', 'CARNET IDENTIDAD', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('ci', $titular->ci, ['class'=> 'form-control', 'required']) !!}
                                <span class="help-block">Núm. Carnet de Identidad</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('pat', 'APELLIDO PATERNO', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('pat', $titular->pat, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Apellido Paterno</span>
                            </div>
                        </div>  
                        <div class="form-group">
                                {!! Form::label('mat', 'APELLIDO MATERNO', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('mat', $titular->mat, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Apellido Materno</span>
                            </div>
                        </div>  
                        <div class="form-group">
                                {!! Form::label('nom', 'NOMBRE(S)', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('nom', $titular->nom, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Nombre(s)</span>
                            </div>
                        </div> 
                        <div class="form-group">
                                {!! Form::label('titu', 'PARENTESCO', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('titu', $titular->titu, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Parentesco</span>
                            </div>
                        </div>                            
                    </div>

                    <div class="col-md-6">
                        
                        <div class="form-group">
                                {!! Form::label('zona', 'ZONA', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('zona', $titular->zona, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Zona</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('calle', 'CALLE', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('calle', $titular->calle, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Calle</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('num_domi', 'NÚMERO DOMICILIO', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('num_domi', $titular->num_domi, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Número de Domicilio</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('tele', 'TELÉFONO', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('tele', $titular->tele, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Teléfono fijo</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('celu', 'CELULAR', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('celu', $titular->celu, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Teléfono Celular</span>
                            </div>
                        </div>
                    </div>
                        
                    </div>
                </div>

                <div class="row text-center">
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{!! url('afiliado/' . $afiliado->id) !!}" data-target="#" class="btn btn-raised btn-warning">Cancelar&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span></a>
                            &nbsp;&nbsp;<button type="submit" class="btn btn-raised btn-primary">Actualizar&nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>

<div id="myModal-policial" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content panel-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Editar Información Policial</h4>
            </div>
            <div class="modal-body">

                {!! Form::model($afiliado, ['method' => 'PATCH', 'route' => ['afiliado.update', $afiliado->id], 'class' => 'form-horizontal']) !!}
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                <input type="hidden" name="type" value="pol"/>
                <div class="row">
                    <div class="col-md-12">
                        
						<div class="row">
                        	<div class="col-md-7">
                        		<table class="table" style="width:100%; margin-bottom:-16px;">
                                        <tr>
                                            <td style="border-top:0;">
					                        	<div class="row">
					                                <div class="form-group">
					                                    {!! Form::label('afi_state_date', 'ESTADO ACTUAL', ['class' => 'col-md-2 control-label']) !!}
					                                
						                                <div class="col-md-10">
						                                	{!! Form::text('afi_type_name', $afiliado->afi_state->afi_type->name ." - ". $afiliado->afi_state->name, ['class'=> 'form-control', 'disabled' => '']) !!}
						                                </div>
						                            </div>
					                            </div>
					                        </td>
					                    </tr>
					            </table>
	                       	</div>
                        	<div class="col-md-5">
		                        <div class="form-group">
	                                {!! Form::label('afi_state_date', 'FECHA DE REGISTRO', ['class' => 'col-md-4 control-label']) !!}
	                            
	                                <div class="col-md-8">
	                                	{!! Form::text('getDataEditEst', $afiliado->getDataEditEst(), ['class'=> 'form-control', 'disabled' => '']) !!}
	                                </div>
	                            </div>
	                        </div>
	                    </div>
                        <div class="row">
                        	<div class="col-md-7">
                        		<table class="table" style="width:100%;margin-bottom:-10px;">
                                        <tr>
                                            <td style="border-top:0;">
					                        	<div class="row">
					                                <div class="form-group">
							                            {!! Form::label('afi_state_id', 'NUEVO ESTADO', ['class' => 'col-md-2 control-label']) !!}
							                            <div class="col-md-10">
							                                {!! Form::select('afi_state_id', $list_afi_states, '',['class' => 'combobox form-control', 'data-bind' => 'value: selectedOptionValueEst']) !!}
							                                <span class="help-block"></span>
							                            </div>
							                        </div>
					                            </div>
					                        </td>
					                    </tr>
					            </table>
	                       	</div>
                        	<div class="col-md-5">
		                        <div class="form-group" data-bind='visible: selectedOptionValueEst, valueUpdate: "afterkeydown"'>
		                            {!! Form::label('fech_est', 'FECHA DE CAMBIO', ['class' => 'col-md-4 control-label']) !!}
		                            <div class="col-md-8">
		                                <div class="input-group">
		                                    <input type="text" class="form-control datepicker" name="fech_est">
		                                    <div class="input-group-addon">
		                                        <span class="glyphicon glyphicon-calendar"></span>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
	                        </div>
	                    </div>

                        {{-- <div class="form-group">
                            {!! Form::label('fech_dece', 'FECHA DECESO', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker" name="fech_dece">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="row">
                        	<div class="col-md-7">
                        		<table class="table" style="width:100%; margin-bottom:-16px;">
                                        <tr>
                                            <td style="border-top:0;">
					                        	<div class="row">
					                                <div class="form-group">
					                                    {!! Form::label('afi_state_date', 'GRADO ACTUAL', ['class' => 'col-md-2 control-label']) !!}
					                                
						                                <div class="col-md-10">
						                                	{!! Form::text('grado_abre', $afiliado->grado->lit, ['class'=> 'form-control', 'disabled' => '']) !!}
						                                </div>
						                            </div>
					                            </div>
					                        </td>
					                    </tr>
					            </table>
	                       	</div>
                        	<div class="col-md-5">
		                        <div class="form-group">
	                                {!! Form::label('afi_state_date', 'FECHA DE REGISTRO', ['class' => 'col-md-4 control-label']) !!}
	                            
	                                <div class="col-md-8">
	                                	{!! Form::text('getDataEditGra', $afiliado->getDataEditGra(), ['class'=> 'form-control', 'disabled' => '']) !!}
	                                </div>
	                            </div>
	                        </div>
	                    </div>
                        <div class="row">
                        	<div class="col-md-7">
                        		<table class="table" style="width:100%;margin-bottom:-10px;">
                                        <tr>
                                            <td style="border-top:0;">
					                        	<div class="row">
					                                <div class="form-group">
							                            {!! Form::label('grado_id', 'NUEVO GRADO', ['class' => 'col-md-2 control-label']) !!}
							                            <div class="col-md-10">
							                                {!! Form::select('grado_id', $list_grados, '',['class' => 'combobox form-control', 'data-bind' => 'value: selectedOptionValueGra']) !!}
							                                <span class="help-block"></span>
							                            </div>
							                        </div>
					                            </div>
					                        </td>
					                    </tr>
					            </table>
	                       	</div>
                        	<div class="col-md-5">
		                        <div class="form-group" data-bind='visible: selectedOptionValueGra, valueUpdate: "afterkeydown"'>
		                            {!! Form::label('fech_gra', 'FECHA DE CAMBIO', ['class' => 'col-md-4 control-label']) !!}
		                            <div class="col-md-8">
		                                <div class="input-group">
		                                    <input type="text" class="form-control datepicker" name="fech_gra">
		                                    <div class="input-group-addon">
		                                        <span class="glyphicon glyphicon-calendar"></span>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
	                        </div>
	                    </div> 


						<div class="row">
                        	<div class="col-md-7">
                        		<table class="table" style="width:100%; margin-bottom:-16px;">
                                        <tr>
                                            <td style="border-top:0;">
					                        	<div class="row">
					                                <div class="form-group">
					                                    {!! Form::label('unidad_lit', 'UNIDAD ACTUAL', ['class' => 'col-md-2 control-label']) !!}
					                                
						                                <div class="col-md-10">
						                                	{!! Form::text('unidad_lit', $afiliado->unidad->lit, ['class'=> 'form-control', 'disabled' => '']) !!}
						                                </div>
						                            </div>
					                            </div>
					                        </td>
					                    </tr>
					            </table>
	                       	</div>
                        	<div class="col-md-5">
		                        <div class="form-group">
	                                {!! Form::label('afi_state_date', 'FECHA DE REGISTRO', ['class' => 'col-md-4 control-label']) !!}
	                            
	                                <div class="col-md-8">
	                                	{!! Form::text('getDataEditEst', $afiliado->getDataEditEst(), ['class'=> 'form-control', 'disabled' => '']) !!}
	                                </div>
	                            </div>
	                        </div>
	                    </div>
                        <div class="row">
                        	<div class="col-md-7">
                        		<table class="table" style="width:100%;margin-bottom:-10px;">
                                        <tr>
                                            <td style="border-top:0;">
					                        	<div class="row">
					                                <div class="form-group">
							                            {!! Form::label('unidad_id', 'NUEVA UNIDAD', ['class' => 'col-md-2 control-label']) !!}
							                            <div class="col-md-10">
							                                {!! Form::select('unidad_id', $list_unidades, '',['class' => 'combobox form-control', 'data-bind' => 'value: selectedOptionValueUni']) !!}
							                                <span class="help-block"></span>
							                            </div>
							                        </div>
					                            </div>
					                        </td>
					                    </tr>
					            </table>
	                       	</div>
                        	<div class="col-md-5">
		                        <div class="form-group" data-bind='visible: selectedOptionValueUni, valueUpdate: "afterkeydown"'>
		                            {!! Form::label('fech_uni', 'FECHA DE CAMBIO', ['class' => 'col-md-4 control-label']) !!}
		                            <div class="col-md-8">
		                                <div class="input-group">
		                                    <input type="text" class="form-control datepicker" name="fech_uni">
		                                    <div class="input-group-addon">
		                                        <span class="glyphicon glyphicon-calendar"></span>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
	                        </div>
	                    </div>                            
                    </div>

                </div>

                <div class="row text-center">
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{!! url('afiliado/' . $afiliado->id) !!}" data-target="#" class="btn btn-raised btn-warning">Cancelar&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span></a>
                            &nbsp;&nbsp;<button type="submit" class="btn btn-raised btn-primary">Actualizar&nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>

<div id="myModal-record" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content panel-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Historial</h4>
            </div>
            <div class="modal-body">

                <table class="table table-striped table-hover" id="record-table">
                    <thead>
                        <tr class="success">
                            <th>Fecha</th>
                            <th>descripción</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">

    $(document).ready(function(){
        $('.combobox').combobox();
        $('[data-toggle="tooltip"]').tooltip();
    });

    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        orientation: "bottom right",
        daysOfWeekDisabled: "0,6",
        autoclose: true
    });

    var viewModel = {
        selectedOptionValueEst : ko.observable(),
        selectedOptionValueGra : ko.observable(),
        selectedOptionValueUni : ko.observable()
    };
    ko.applyBindings(viewModel);

    $(function() {
        $('#record-table').DataTable({
            "dom": '<"top">t<"bottom"p>',
            "order": [[ 0, "desc" ]],
            processing: true,
            serverSide: true,
            pageLength: 10,
            bFilter: false,
            ajax: {
                url: '{!! route('getNote') !!}',
                data: function (d) {
                    d.id = {{ $afiliado->id }};
                }
            },
            columns: [
                { data: 'fech', name: 'fech' },
                { data: 'message', name: 'message', bSortable: false }
            ]
        });
    });

</script>
@endpush