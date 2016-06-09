@extends('layout')

@section('content')
<div class="container-fluid">
    {!! Breadcrumbs::render('show_afiliado', $afiliado) !!}
    <div class="row">
        <div class="col-md-12">

                <div class="row"> 

                    <div class="col-md-12 text-right">  

                        <a href="{!! url('tramite_fondo_retiro/' . $afiliado->id) !!}" style="margin:-6px 1px 12px;" class="btn btn-raised btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Fondo Retiro">
                            &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-piggy-bank"></span>&nbsp;&nbsp;&nbsp;
                        </a>

                        <a href="{!! url('viewaporte/' . $afiliado->id) !!}" style="margin:-6px 1px 12px;" class="btn btn-raised btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Aportes">
                            &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;&nbsp;
                        </a>

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
                                            <td style="border-top:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Carnet Identidad
                                                    </div>
                                                    <div class="col-md-6">
                                                         {!! $afiliado->ci !!} {!! $afiliado->depa_exp !!}
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
                                        @if($afiliado->fech_dece)
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Fecha de Deceso
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $afiliado->getFull_fech_dece() !!}
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
                                            <td style="border-top:1px solid #d4e4cd;">
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
                                        @if($afiliado->motivo_dece)
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Motivo de Deceso
                                                        </div>
                                                        <div class="col-md-6" data-toggle="tooltip" data-placement="bottom" data-original-title="{!! $afiliado->unidad->lit !!}">
                                                            {!! $afiliado->motivo_dece !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif

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
                                @if($info_dom)
                                    <div class="col-md-1 text-right" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                                        <div data-toggle="modal" data-target="#myModal-domicilio"> 
                                            <span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="panel-body" style="font-size: 14px">
                            <div class="row" style="margin-bottom:0px;">

                                @if($info_dom)

                                    <div class="col-md-6">

                                        <table class="table" style="width:100%;">
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;">
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
                                                            Calle, Avenida
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
                                                <td style="border-top:1px solid #d4e4cd;">
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
                                                <img class="circle" src="{!! asset('assets/images/home.png') !!}" width="40px" alt="icon">                                                                          
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
                                @if($info_cony)
                                    <div class="col-md-1 text-right" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                                        <div data-toggle="modal" data-target="#myModal-conyuge"> 
                                            <span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="panel-body" style="font-size: 14px">
                            <div class="row" style="margin-bottom:0px;">

                                @if($info_cony)

                                    <div class="col-md-6">

                                        <table class="table" style="width:100%;">
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;">
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
                                                <td style="border-top:1px solid #d4e4cd;">
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
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Fecha Deceso
                                                        </div>
                                                        <div class="col-md-6">
                                                             {!! $conyuge->getFullDateDece() !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>


                                    </div>

                                    <div class="col-md-6">

                                        <table class="table" style="width:100%;">
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Fecha Nacimiento
                                                        </div>
                                                        <div class="col-md-6">
                                                             {!! $conyuge->getFullDateNac() !!}
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
                                                            {!! $conyuge->nom !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            <tr>
                                            </tr>
                                                <td style="border-top:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Segundo Nombre
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $conyuge->nom2 !!}
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
                                                <img class="circle" src="{!! asset('assets/images/people.png') !!}" width="45px" alt="icon">                                                                          
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
                                                    <div class="col-md-6" data-toggle="tooltip" data-placement="bottom" data-original-title="{!! $afiliado->afi_state->afi_type->name !!}">{!! $afiliado->afi_state->name !!}
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
                                            <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
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
                                        @if($afiliado->motivo_baja)
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Motivo Baja
                                                        </div>
                                                        <div class="col-md-6" data-toggle="tooltip" data-placement="bottom" data-original-title="{!! $afiliado->unidad->lit !!}">
                                                            {!! $afiliado->motivo_baja !!}
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
                                            <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
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
                                        @if($afiliado->fech_baja)
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Fecha de Baja
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $afiliado->getData_fech_baja() !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif

                                    </table>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">  
                                <div class="col-md-11">
                                    <h3 class="panel-title">Aportes</h3>
                                </div>
                                    <div class="col-md-1 text-right" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                                        <div data-toggle="modal" data-target="#myModal-periodo-aportes"> 
                                            <span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="panel-body" style="font-size: 14px">
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <h5 class="modal-title">Años de Aportes</h5>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:0px;">                       
                                <div class="col-md-4">
                                    <table class="table" style="width:100%;">
                                        <tr>
                                            <td style="border-top:0;border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Desde
                                                    </div>
                                                    <div class="col-md-8">
                                                        {!! $afiliado->getFull_fech_ini_apor() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table" style="width:100%;">
                                        <tr>
                                            <td style="border-top:0;border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Hasta
                                                    </div>
                                                    <div class="col-md-8">
                                                        {!! $afiliado->getFull_fech_fin_apor() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <table class="table" style="width:100%;">
                                        <tr>
                                            <td style="border-top:0;border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        Total
                                                    </div>
                                                    <div class="col-md-9">
                                                        {!! $afiliado->getYearsAndMonths_fech_ini_apor() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            @if($afiliado->fech_ini_serv)
                                <br>
                                <div class="row text-center"> 
                                    <div class="col-md-12">
                                        <h5 class="modal-title">Años de Servicio</h5>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:0px;">                       
                                    <div class="col-md-4">
                                        <table class="table" style="width:100%;">
                                            <tr>
                                                <td style="border-top:0;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            Desde
                                                        </div>
                                                        <div class="col-md-8">
                                                            {!! $afiliado->getFull_fech_ini_serv() !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-4">
                                        <table class="table" style="width:100%;">
                                            <tr>
                                                <td style="border-top:0;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            Hasta
                                                        </div>
                                                        <div class="col-md-8">
                                                            {!! $afiliado->getFull_fech_fin_serv() !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-4">
                                        <table class="table" style="width:100%;">
                                            <tr>
                                                <td style="border-top:0;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            Total
                                                        </div>
                                                        <div class="col-md-9">
                                                            {!! $afiliado->getYearsAndMonths_fech_fin_serv() !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            @endif
                            
                            @if($afiliado->fech_ini_anti)
                                <br>
                                <div class="row text-center"> 
                                    <div class="col-md-12">
                                        <h5 class="modal-title">Periodo Adicional en Caso de Anticipo</h5>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:0px;">                       
                                    <div class="col-md-4">
                                        <table class="table" style="width:100%;">
                                            <tr>
                                                <td style="border-top:0;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            Desde
                                                        </div>
                                                        <div class="col-md-8">
                                                            {!! $afiliado->getFull_fech_ini_anti() !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-4">
                                        <table class="table" style="width:100%;">
                                            <tr>
                                                <td style="border-top:0;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            Hasta
                                                        </div>
                                                        <div class="col-md-8">
                                                            {!! $afiliado->getFull_fech_fin_anti() !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-4">
                                        <table class="table" style="width:100%;">
                                            <tr>
                                                <td style="border-top:0;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            Total
                                                        </div>
                                                        <div class="col-md-9">
                                                            {!! $afiliado->getYearsAndMonths_fech_ini_anti() !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            @endif

                            @if($afiliado->fech_ini_reco)
                                <br>
                                <div class="row text-center"> 
                                    <div class="col-md-12">
                                        <h5 class="modal-title">Periodo de Aportes Reconocidos</h5>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom:0px;">                       
                                    <div class="col-md-4">
                                        <table class="table" style="width:100%;">
                                            <tr>
                                                <td style="border-top:0;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            Desde
                                                        </div>
                                                        <div class="col-md-8">
                                                            {!! $afiliado->getFull_fech_ini_reco() !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-4">
                                        <table class="table" style="width:100%;">
                                            <tr>
                                                <td style="border-top:0;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            Hasta
                                                        </div>
                                                        <div class="col-md-8">
                                                            {!! $afiliado->getFull_fech_fin_reco() !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-4">
                                        <table class="table" style="width:100%;">
                                            <tr>
                                                <td style="border-top:0;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            Total
                                                        </div>
                                                        <div class="col-md-9">
                                                            {!! $afiliado->getYearsAndMonths_fech_ini_reco() !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>   
                            @endif                      
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
                                            <td style="text-align: right">{{ $totalCotizable }}</td>
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

<div id="myModal-personal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
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
                                {!! Form::label('ci', 'Carnet de Identidad', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-5">
                                {!! Form::text('ci', $afiliado->ci, ['class'=> 'form-control', 'required']) !!}
                                <span class="help-block">Número de CI</span>
                            </div>
                                {!! Form::select('depa_exp', $list_depas_abre, $afiliado->departamento_exp_id, ['class' => 'col-md-2 combobox form-control']) !!}
                        </div>
                        <div class="form-group">
                                {!! Form::label('pat', 'Apellido Paterno', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('pat', $afiliado->pat, ['class'=> 'form-control', 'required', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Escriba el Apellido Paterno</span>
                            </div>
                        </div>  
                        <div class="form-group">
                                {!! Form::label('mat', 'Apellido Materno', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('mat', $afiliado->mat, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Escriba el Apellido Materno</span>
                            </div>
                        </div>                              
                        <div class="form-group">
                                {!! Form::label('nom', 'Primer Nombre', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('nom', $afiliado->nom, ['class'=> 'form-control','required', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Escriba el  Primer Nombre</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('nom2', 'Segundo Nombre', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('nom2', $afiliado->nom2, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Escriba el Segundo Nombre</span>
                            </div>
                        </div>
                        @if ($afiliado->sex == 'F')
                            <div class="form-group">
                                    {!! Form::label('ap_esp', 'Apellido de Esposo', ['class' => 'col-md-5 control-label']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('ap_esp', $afiliado->ap_esp, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                    <span class="help-block">Escriba el Apellido de Esposo (Opcional)</span>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                                {!! Form::label('fech_nac', 'Fecha de Nacimiento', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                    			<div class="input-group">
                                    <input type="text" class="form-control datepicker" name="fech_nac" value="{!! $afiliado->getDataEdit() !!}">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                                    {!! Form::label('est_civ', 'Estado Civil', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::select('est_civ', $list_est_civ, $afiliado->est_civ, ['class' => 'combobox form-control', 'required']) !!}
                                <span class="help-block">Seleccione el Estado Civil</span>
                            </div>
                        </div>
                        <div class="form-group">
                                    {!! Form::label('depa_nat', 'Lugar de Nacimiento', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::select('depa_nat', $list_depas, $afiliado->departamento_nat_id, ['class' => 'combobox form-control']) !!}
                                <span class="help-block">Seleccione Departamento</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-offset-5 col-md-4">
                                <div class="form-group">
                                    <div class="togglebutton">
                                      <label>
                                        <input type="checkbox" data-bind="checked: fallecidoValue" name="fallecidoCheck"> Fallecido
                                      </label>
                                  </div>
                                </div>
                            </div>
                        </div>

                        <div data-bind='fadeVisible: fallecidoValue, valueUpdate: "afterkeydown"'>

                            <div class="form-group">
                                    {!! Form::label('fech_dece', 'Fecha Deceso', ['class' => 'col-md-5 control-label']) !!}
                                <div class="col-md-7">
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker" name="fech_dece" value="{!! $afiliado->getData_fech_dece() !!}">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                    {!! Form::label('motivo_dece', 'Causa Deceso', ['class' => 'col-md-5 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::textarea('motivo_dece', $afiliado->motivo_dece, ['class'=> 'form-control', 'rows' => '2']) !!}
                                    <span class="help-block">Escriba el Motivo de fallecimiento</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{!! url('afiliado/' . $afiliado->id) !!}" data-target="#" class="btn btn-raised btn-warning">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;&nbsp;</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-raised btn-primary">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;</button>
                        </div>
                    </div>
                </div>

            {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>

<div id="myModal-domicilio" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
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
                                    {!! Form::label('depa_dir', 'Departamento', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::select('depa_dir', $list_depas, $afiliado->departamento_dir_id, ['class' => 'combobox form-control']) !!}
                                <span class="help-block">Seleccione Departamento</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('zona', 'Zona', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('zona', $afiliado->zona, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Escriba la Zona</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('calle', 'Calle, Avenida', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('calle', $afiliado->calle, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Escriba la Calle y/o Avenida</span>
                            </div>
                        </div>
                                                          
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                                {!! Form::label('num_domi', 'Número de Domicilio', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('num_domi', $afiliado->num_domi, ['class'=> 'form-control',  'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Escriba el Número de Domicilio</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('tele', 'Teléfono fijo', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('tele', $afiliado->tele, ['class'=> 'form-control', 'numeric', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Escriba el Teléfono fijo</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('celu', 'Teléfono Celular', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('celu', $afiliado->celu, ['class'=> 'form-control', 'numeric', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Escriba el Teléfono Celular</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{!! url('afiliado/' . $afiliado->id) !!}" data-target="#" class="btn btn-raised btn-warning">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;&nbsp;</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-raised btn-primary">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;</button>
                        </div>
                    </div>
                </div>

            {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>

<div id="myModal-conyuge" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
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
                                {!! Form::label('ci', ' Carnet de Identidad', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('ci', $conyuge->ci, ['class'=> 'form-control', 'required']) !!}
                                <span class="help-block">Escriba el Carnet de Identidad</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('pat', 'Apellido Paterno', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('pat', $conyuge->pat, ['class'=> 'form-control','required', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Escriba el Apellido Paterno</span>
                            </div>
                        </div>  
                        <div class="form-group">
                                {!! Form::label('mat', 'Apellido Materno', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('mat', $conyuge->mat, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Escriba el  Apellido Materno</span>
                            </div>
                        </div>  
                        <div class="form-group">
                                {!! Form::label('nom', 'Primer Nombre', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('nom', $conyuge->nom, ['class'=> 'form-control', 'required','onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Escriba el Primer Nombre</span>
                            </div>
                        </div>  
                        <div class="form-group">
                                {!! Form::label('nom2', 'Segundo Nombre', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('nom2', $conyuge->nom2, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Escriba el Segundo Nombre</span>
                            </div>
                        </div>                          
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                                {!! Form::label('fech_nac', 'FECHA NACIMIENTO', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker" name="fech_nac" value="{!! $conyuge->getDataEdit_fech_nac() !!}">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-offset-5 col-md-4">
                                <div class="form-group">
                                    <div class="togglebutton">
                                      <label>
                                        <input type="checkbox" data-bind="checked: fallecidoConyuValue" name="fallecidoConyuCheck"> Fallecido
                                      </label>
                                  </div>
                                </div>
                            </div>
                        </div>

                        <div data-bind='fadeVisible: fallecidoConyuValue, valueUpdate: "afterkeydown"'>

                            <div class="form-group">
                                    {!! Form::label('fech_dece', 'Fecha Deceso', ['class' => 'col-md-5 control-label']) !!}
                                <div class="col-md-7">
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker" name="fech_dece" value="{!! $conyuge->getDataEdit_fech_dece() !!}">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                    {!! Form::label('motivo_dece', 'Causa Deceso', ['class' => 'col-md-5 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::textarea('motivo_dece', $conyuge->motivo_dece, ['class'=> 'form-control', 'rows' => '2']) !!}
                                    <span class="help-block">Escriba el Motivo de fallecimiento</span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="row text-center">
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{!! url('afiliado/' . $afiliado->id) !!}" data-target="#" class="btn btn-raised btn-warning">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;&nbsp;</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-raised btn-primary">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;</button>
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
                                <div class="form-group">
                                    {!! Form::label('motivo_baja', 'MOTIVO DE BAJA', ['class' => 'col-md-2 control-label']) !!}
                                    <div class="col-md-10">
                                        {!! Form::textarea('motivo_baja', $afiliado->motivo_baja, ['class'=> 'form-control', 'rows' => '2']) !!}
                                        <span class="help-block">Motivo de fallecimiento</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    {!! Form::label('fech_baja', 'FECHA DE BAJA', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control datepicker" name="fech_baja" value="{!! $afiliado->getData_fech_baja() !!}">
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

<div id="myModal-periodo-aportes" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content panel-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Editar Periodos</h4>
            </div>
            <div class="modal-body">

                {!! Form::model($afiliado, ['method' => 'PATCH', 'route' => ['afiliado.update', $afiliado->id], 'class' => 'form-horizontal']) !!}
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                <input type="hidden" name="type" value="periods"/>
                <div class="row">
                    <h5 class="modal-title">Años de Aportes</h5>
                    <div class="row" style="margin-bottom:0px;">                       
                        <div class="col-md-4">
                            <table class="table" style="width:100%;">
                                <tr>
                                    <td style="border-top:0;border-bottom:1px solid #d4e4cd;">
                                        <div class="row">
                                            <div class="col-md-4">
                                                Desde
                                            </div>
                                            <div class="col-md-8">
                                                {!! $afiliado->getFull_fech_ini_apor() !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table class="table" style="width:100%;">
                                <tr>
                                    <td style="border-top:0;border-bottom:1px solid #d4e4cd;">
                                        <div class="row">
                                            <div class="col-md-4">
                                                Hasta
                                            </div>
                                            <div class="col-md-8">
                                                {!! $afiliado->getFull_fech_fin_apor() !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table class="table" style="width:100%;">
                                <tr>
                                    <td style="border-top:0;border-bottom:1px solid #d4e4cd;">
                                        <div class="row">
                                            <div class="col-md-3">
                                                Total
                                            </div>
                                            <div class="col-md-9">
                                                {!! $afiliado->getYearsAndMonths_fech_ini_apor() !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <h5 class="modal-title">Años de Servicio</h5>
                    <div class="col-md-12">
                        <div class="form-group">                            
                            <div class="input-daterange input-group" id="datepicker">
                                <div class="col-md-6">
                                    {!! Form::label('fech_ini_serv', 'DESDE', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="fech_ini_serv" value="{!! $afiliado->getData_fech_ini_serv() !!}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('fech_fin_serv', 'HASTA', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="fech_fin_serv" value="{!! $afiliado->getData_fech_fin_serv() !!}"/>
                                    </div>
                                </div>
                            </div>
                        </div>                                                     
                    </div>
                </div>
                
                <div class="row text-center">
                    <div class="form-group">
                        <div class="togglebutton">
                          <label>
                            <input type="checkbox" data-bind="checked: periodoValue"> Modificar Periodo
                          </label>
                      </div>
                    </div>
                </div>

                <div class="row" data-bind='fadeVisible: periodoValue, valueUpdate: "afterkeydown"'>
                    <h5 class="modal-title">Periodo adicional en Caso de Anticipo</h5>
                    <div class="col-md-12">
                        <div class="form-group">                            
                            <div class="input-daterange input-group" id="datepicker">
                                <div class="col-md-6">
                                    {!! Form::label('fech_ini_anti', 'DESDE', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="fech_ini_anti" value="{!! $afiliado->getData_fech_ini_anti() !!}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('fech_fin_anti', 'HASTA', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="fech_fin_anti" value="{!! $afiliado->getData_fech_fin_anti() !!}"/>
                                    </div>
                                </div>
                            </div>
                        </div>                                                     
                    </div>
                </div>
                <div class="row" data-bind='fadeVisible: periodoValue, valueUpdate: "afterkeydown"'>
                    <h5 class="modal-title">Periodo de Reconocimiento de Aportes</h5>
                    <div class="col-md-12">
                        <div class="form-group">                            
                            <div class="input-daterange input-group" id="datepicker">
                                <div class="col-md-6">
                                    {!! Form::label('fech_ini_reco', 'DESDE', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="fech_ini_reco" value="{!! $afiliado->getData_fech_ini_reco() !!}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('fech_fin_reco', 'HASTA', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="fech_fin_reco" value="{!! $afiliado->getData_fech_fin_reco() !!}"/>
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

    $('.input-daterange').datepicker({
        format: "mm/yyyy",
        viewMode: "months", 
        minViewMode: "months",
        language: "es",
        orientation: "bottom right",
        autoclose: true
    });

    var titular = {!! $afiliado !!};
    var conyuge = {!! $conyuge !!};

    var Model = function() {

        this.selectedOptionValueEst = ko.observable();
        this.selectedOptionValueGra = ko.observable();
        this.selectedOptionValueUni = ko.observable(); 
        this.periodoValue = ko.observable(titular.fech_ini_reco ? true : false);     
        this.fallecidoValue = ko.observable(titular.fech_dece ? true : false);     
        this.fallecidoConyuValue = ko.observable(conyuge.fech_dece ? true : false);     
    };

    ko.bindingHandlers.fadeVisible = {
        init: function(element, valueAccessor) {
            var value = valueAccessor();
            $(element).toggle(ko.unwrap(value));
        },
        update: function(element, valueAccessor) {
            var value = valueAccessor();
            ko.unwrap(value) ? $(element).fadeIn() : $(element).fadeOut();
        }
    };

    ko.applyBindings(new Model());

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