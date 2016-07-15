@extends('layout')

@section('content')
<div class="container-fluid">
    {!! Breadcrumbs::render('show_affiliate', $affiliate) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="row"> 
                <div class="col-md-4 col-md-offset-6"> 
                    <!-- <a href="{!! url('tramite_fondo_retiro/' . $affiliate->id) !!}" style="margin:-6px 1px 12px;" class="btn btn-raised btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Fondo Retiro">
                        &nbsp;<span class="glyphicon glyphicon-piggy-bank"></span>&nbsp;
                    </a> -->

                    <!-- <div class="btn-group" style="margin:-6px 1px 12px;" class="btn btn-raised btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Aportes">
                        <a href="" class="btn btn-success btn-raised dropdown-toggle" data-toggle="dropdown">
                            &nbsp;<span class="glyphicon glyphicon-th-list"></span>&nbsp;
                        </a>
                        <ul class="dropdown-menu"  role="menu">
                            <li>
                                <a href="{!! url('viewaporte/' . $affiliate->id) !!}" class="text-center">
                                    <span class="glyphicon glyphicon-eye-open"></span>
                                </a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{!! url('selectgestaporte/' . $affiliate->id) !!}" class="text-center">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </a>
                            </li>
                        </ul>
                    </div> -->
                </div>
                <div class="col-md-2 text-right">
                    <a href="{!! url('affiliate') !!}" style="margin:-6px 1px 12px;" class="btn btn-raised btn-warning" data-toggle="tooltip" data-placement="top" data-original-title="Atrás">
                        &nbsp;<span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                    </a>
                </div>
            </div>
        
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">  
                                <div class="col-md-11">
                                    <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Información Personal</h3>
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
                                                         {!! $affiliate->identity_card !!} {!! $affiliate->city_identity_card !!}
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
                                                         {!! $affiliate->last_name !!}
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
                                                         {!! $affiliate->mothers_last_name !!}
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
                                                        {!! $affiliate->first_name !!}
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
                                                        {!! $affiliate->second_name !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @if ($affiliate->surname_husband)
                                        <tr>
                                            <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Apellido de Esposo
                                                    </div>
                                                    <div class="col-md-6">
                                                        {!! $affiliate->surname_husband !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
                                        @if($affiliate->date_death)
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Fecha de Deceso
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $affiliate->getFullDateDeath() !!}
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
                                                         {!! $affiliate->getFullBirthDate() !!}
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
                                                        {!! $affiliate->getHowOld() !!}
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
                                                        {!! $affiliate->getFullGender() !!}
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
                                                        {!! $affiliate->getFullCivilStatus() !!}
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
                                                         {!! $affiliate->city_birth !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @if($affiliate->reason_death)
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Motivo de Deceso
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $affiliate->reason_death !!}
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
                                    <h3 class="panel-title"><span class="glyphicon glyphicon-home"></span> Información de Domicilio</h3>
                                </div>
                                @if($info_address)
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

                                @if($info_address)

                                    <div class="col-md-6">

                                        <table class="table" style="width:100%;">
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Departamento
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $affiliate->city_address !!}
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
                                                            {!! $affiliate->zone !!}
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
                                                            {!! $affiliate->Street !!}
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
                                                            {!! $affiliate->number_address !!}
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
                                                            {!! $affiliate->phone !!}
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
                                                            {!! $affiliate->cell_phone !!}
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
                                    <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Información de Conyuge</h3>
                                </div>
                                @if($info_spouse)
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

                                @if($info_spouse)

                                    <div class="col-md-6">

                                        <table class="table" style="width:100%;">
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Carnet Identidad
                                                        </div>
                                                        <div class="col-md-6">
                                                             {!! $conyuge->identity_card !!}
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
                                                             {!! $conyuge->last_name !!}
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
                                                             {!! $conyuge->mothers_last_name !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @if($conyuge->date_death)
                                                <tr>
                                                    <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                Fecha Deceso
                                                            </div>
                                                            <div class="col-md-6">
                                                                 {!! $conyuge->getFullDateDeath() !!}
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
                                                             {!! $conyuge->getFullBirthDate() !!}
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
                                                            {!! $conyuge->first_name !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            <tr>
                                            </tr>
                                                <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Segundo Nombre
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $conyuge->second_name !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @if($conyuge->reason_death)
                                                <tr>
                                                    <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                Motivo Deceso
                                                            </div>
                                                            <div class="col-md-6">
                                                                {!! $conyuge->reason_death !!}
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
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
                                <div class="col-md-11">
                                    <h3 class="panel-title"><span class="glyphicon glyphicon-briefcase"></span> Información Policial Actual</h3>
                                </div>
                                <div class="col-md-1 text-right" data-toggle="tooltip" data-placement="top" data-original-title="Historial">
                                    <div  data-toggle="modal" data-target="#myModal-record"> 
                                        <span class="glyphicon glyphicon-hourglass"  aria-hidden="true"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body" style="font-size: 14px">
                            <div class="row">
                                <div class="col-md-6">

                                    <table class="table" style="width:100%;">
                                        <tr>
                                            <td style="border-top:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Estado
                                                    </div>
                                                    <div class="col-md-6" data-toggle="tooltip" data-placement="bottom" data-original-title="{!! $affiliate->affiliate_state->state_type->name !!}">
                                                        {!! $affiliate->affiliate_state->name !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-top:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Tipo
                                                    </div>
                                                    <div class="col-md-6">{!! $affiliate->affiliate_type->name !!}
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
                                                    <div class="col-md-6" data-toggle="tooltip" data-placement="bottom" data-original-title="{!! $affiliate->degree->name !!}"> {!! $affiliate->degree->shortened !!}
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
                                                    <div class="col-md-6" data-toggle="tooltip" data-placement="bottom" data-original-title="{!! $affiliate->unit->name !!}">
                                                        {!! $affiliate->unit->shortened !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @if($affiliate->date_decommissioned)
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Fecha de Baja
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $affiliate->getFullDateDecommissioned() !!}
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
                                                        Fecha de Ingreso
                                                    </div>
                                                    <div class="col-md-6">
                                                        {!! $affiliate->getFullDateEntry() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-top:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Núm. de Matrícula
                                                    </div>
                                                    <div class="col-md-6">
                                                        {!! $affiliate->registration !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Núm. de Ítem
                                                    </div>
                                                    <div class="col-md-6">
                                                        {!! $affiliate->item !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @if($affiliate->reason_decommissioned)
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Motivo Baja
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $affiliate->reason_decommissioned !!}
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
                                <div class="col-md-6">
                                    <h3 class="panel-title"><span class="glyphicon glyphicon-usd"></span> Totales</h3>
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
                                            <td style="text-align: right">{{ $total_gain }}</td>
                                        </tr>
                                        <tr>
                                            <td>Bono de Seguridad Ciudadana</td>
                                            <td style="text-align: right">{{ $total_public_security_bonus }}</td>
                                        </tr>
                                        <tr class="active">
                                            <td>Cotizable</td>
                                            <td style="text-align: right">{{ $total_quotable }}</td>
                                        </tr>
                                    </table>

                                    <table class="table table-bordered table-hover" style="width:100%;font-size: 14px">
                                        <tr>
                                            <td>Aporte Fondo de Retiro</td>
                                            <td style="text-align: right">{{ $total_retirement_fund }}</td>
                                        </tr>
                                        <tr>
                                            <td>Aporte Seguro de Vida</td>
                                            <td style="text-align: right">{{ $total_mortuary_quota }}</td>
                                        </tr>
                                        <tr class="active">
                                            <td>Aporte Muserpol</td>
                                            <td style="text-align: right">{{ $total }}</td>
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

                {!! Form::model($affiliate, ['method' => 'PATCH', 'route' => ['affiliate.update', $affiliate->id], 'class' => 'form-horizontal']) !!}
                <input type="hidden" name="type" value="per"/>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group"> 
                                {!! Form::label('identity_card', 'Carnet de Identidad', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-5">
                                {!! Form::text('identity_card', $affiliate->identity_card, ['class'=> 'form-control', 'required']) !!}
                                <span class="help-block">Número de CI</span>
                            </div>
                                {!! Form::select('depa_exp', $cities_list_short, $affiliate->city_identity_card_id, ['class' => 'col-md-2 combobox form-control']) !!}
                        </div>
                        <div class="form-group">
                                {!! Form::label('last_name', 'Apellido Paterno', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('last_name', $affiliate->last_name, ['class'=> 'form-control', 'required', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Escriba el Apellido Paterno</span>
                            </div>
                        </div>  
                        <div class="form-group">
                                {!! Form::label('mothers_last_name', 'Apellido Materno', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('mothers_last_name', $affiliate->mothers_last_name, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Escriba el Apellido Materno</span>
                            </div>
                        </div>                              
                        <div class="form-group">
                                {!! Form::label('first_name', 'Primer Nombre', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('first_name', $affiliate->first_name, ['class'=> 'form-control','required', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Escriba el  Primer Nombre</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('second_name', 'Segundo Nombre', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('second_name', $affiliate->second_name, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Escriba el Segundo Nombre</span>
                            </div>
                        </div>
                        @if ($affiliate->sex == 'F')
                            <div class="form-group">
                                    {!! Form::label('surname_husband', 'Apellido de Esposo', ['class' => 'col-md-5 control-label']) !!}
                                <div class="col-md-7">
                                    {!! Form::text('surname_husband', $affiliate->surname_husband, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                    <span class="help-block">Escriba el Apellido de Esposo (Opcional)</span>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                                {!! Form::label('birth_date', 'Fecha de Nacimiento', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                    			<div class="input-group">
                                    <input type="text" class="form-control datepicker" name="birth_date" value="{!! $affiliate->getEditBirthDate() !!}">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                                    {!! Form::label('civil_status', 'Estado Civil', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::select('civil_status', $gender_list, $affiliate->civil_status, ['class' => 'combobox form-control', 'required']) !!}
                                <span class="help-block">Seleccione el Estado Civil</span>
                            </div>
                        </div>
                        <div class="form-group">
                                    {!! Form::label('city_birth_id', 'Lugar de Nacimiento', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::select('city_birth_id', $cities_list, $affiliate->city_birth_id, ['class' => 'combobox form-control']) !!}
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
                                        <input type="text" class="form-control datepicker" name="date_death" value="{!! $affiliate->getEditDateDeath() !!}">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                    {!! Form::label('reason_death', 'Causa Deceso', ['class' => 'col-md-5 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::textarea('reason_death', $affiliate->reason_death, ['class'=> 'form-control', 'rows' => '2']) !!}
                                    <span class="help-block">Escriba el Motivo de fallecimiento</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{!! url('affiliate/' . $affiliate->id) !!}" data-target="#" class="btn btn-raised btn-warning">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;&nbsp;</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-raised btn-success">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;</button>
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

                {!! Form::model($affiliate, ['method' => 'PATCH', 'route' => ['affiliate.update', $affiliate->id], 'class' => 'form-horizontal']) !!}
                <input type="hidden" name="type" value="dom"/>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                                    {!! Form::label('city_address_id', 'Departamento', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::select('city_address_id', $cities_list, $affiliate->city_address_id, ['class' => 'combobox form-control']) !!}
                                <span class="help-block">Seleccione Departamento</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('zone', 'Zona', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('zone', $affiliate->zone, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Escriba la Zona</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('street', 'Calle, Avenida', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('street', $affiliate->street, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Escriba la Calle y/o Avenida</span>
                            </div>
                        </div>
                                                          
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                                {!! Form::label('num_domi', 'Número de Domicilio', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('num_domi', $affiliate->num_domi, ['class'=> 'form-control',  'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Escriba el Número de Domicilio</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('phone', 'Teléfono fijo', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('phone', $affiliate->phone, ['class'=> 'form-control', 'numeric', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Escriba el Teléfono fijo</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('cell_phone', 'Teléfono Celular', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('cell_phone', $affiliate->cell_phone, ['class'=> 'form-control', 'numeric', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Escriba el Teléfono Celular</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row text-center">
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{!! url('affiliate/' . $affiliate->id) !!}" data-target="#" class="btn btn-raised btn-warning">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;&nbsp;</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-raised btn-success">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;</button>
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

                {!! Form::model($conyuge, ['method' => 'PATCH', 'route' => ['conyuge.update', $affiliate->id], 'class' => 'form-horizontal']) !!}
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
                                    {!! Form::label('reason_death', 'Causa Deceso', ['class' => 'col-md-5 control-label']) !!}
                                <div class="col-md-6">
                                    {!! Form::textarea('reason_death', $conyuge->reason_death, ['class'=> 'form-control', 'rows' => '2']) !!}
                                    <span class="help-block">Escriba el Motivo de fallecimiento</span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="row text-center">
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{!! url('afiliado/' . $affiliate->id) !!}" data-target="#" class="btn btn-raised btn-warning">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;&nbsp;</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-raised btn-success">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;</button>
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
                <table class="table table-striped table-hover" id="record-table" cellspacing="0" width="100%">
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

    var affiliate = {!! $affiliate !!};
    var spouse = {!! $spouse !!};

    var Model = function() {
 
        this.fallecidoValue = ko.observable(affiliate.fech_dece ? true : false);     
        this.fallecidoConyuValue = ko.observable(spouse.fech_dece ? true : false);     
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
                url: '{!! route('get_record') !!}',
                data: function (d) {
                    d.id = {{ $affiliate->id }};
                }
            },
            columns: [
                { data: 'fech' },
                { data: 'message', bSortable: false }
            ]
        });
    });

</script>
@endpush