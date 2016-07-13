@extends('layout')

@section('content')

<div class="container-fluid">
    {!! Breadcrumbs::render('fondo_tramite', $afiliado) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="row"> 
                <div class="col-md-4 col-md-offset-6">
                    @if($retirementfund->reception_date)
                     <div class="btn-group" style="margin:-6px 1px 12px;" data-toggle="tooltip" data-placement="top" data-original-title="Ventanilla">
                        <a href="" data-target="#myModal-print-ventanilla" class="btn btn-raised btn-success dropdown-toggle enabled" data-toggle="modal">
                            &nbsp;<span class="glyphicon glyphicon-inbox"></span>&nbsp;
                        </a>
                    </div>
                    @else
                      <div class="btn-group" style="margin:-6px 1px 12px;" data-toggle="tooltip" data-placement="top" data-original-title="Ventanilla">
                        <a href="" data-target="#myModal-print-ventanilla" class="btn btn-raised btn-success dropdown-toggle disabled" data-toggle="modal">
                            &nbsp;<span class="glyphicon glyphicon-inbox"></span>&nbsp;
                        </a>
                      </div>  
                    @endif

                    @if(($retirementfund->reception_date) && ($retirementfund->check_file_date))
                    <div class="btn-group" style="margin:-6px 1px 12px;" data-toggle="tooltip" data-placement="top" data-original-title="Certificación">
                        <a href="" data-target="#myModal-printcertificacion" class="btn btn-raised btn-success dropdown-toggle" data-toggle="modal">
                        &nbsp;<span class="glyphicon glyphicon-folder-open"></span>&nbsp;
                        </a>
                    </div>
                    @else
                    <div class="btn-group" style="margin:-6px 1px 12px;" data-toggle="tooltip" data-placement="top" data-original-title="Certificación">
                        <a href="" data-target="#myModal-printcertificacion" class="btn btn-raised btn-success dropdown-toggle disabled" data-toggle="modal">
                            &nbsp;<span class="glyphicon glyphicon-folder-open"></span>&nbsp;
                        </a>
                    </div>
                    @endif

                    @if(($info_gen) && ($info_soli) && ($info_docu) && ($info_antec))
                    <div class="btn-group" style="margin:-6px 1px 12px;" class="btn btn-raised btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Calificación">
                        <a href="" data-target="#myModal-printcalificacion" class="btn btn-raised btn-success dropdown-toggle" data-toggle="modal">
                        &nbsp;<span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;
                        </a>
                    </div>
                    @else
                    <div class="btn-group" style="margin:-6px 1px 12px;" class="btn btn-raised btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Calificación">
                        <a href="" data-target="#myModal-printcalificacion" class="btn btn-raised btn-success dropdown-toggle disabled" data-toggle="modal">
                        &nbsp;<span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;
                        </a>
                    </div>
                    @endif

                    @if(($info_gen) && ($info_soli) && ($info_docu) && ($info_antec))
                    <div class="btn-group" style="margin:-6px 1px 12px;" class="btn btn-raised btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Dictamen Legal">
                        <a href="" data-target="#myModal-printdictamen" class="btn btn-raised btn-success dropdown-toggle" data-toggle="modal">
                        &nbsp;<span class="glyphicon glyphicon-inbox"></span>&nbsp;
                        </a>
                    </div>
                    @else
                    <div class="btn-group" style="margin:-6px 1px 12px;" class="btn btn-raised btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Dictamen Legal">
                        <a href="" data-target="#myModal-printdictamen" class="btn btn-raised btn-success dropdown-toggle disabled" data-toggle="modal">
                        &nbsp;<span class="glyphicon glyphicon-inbox"></span>&nbsp;
                        </a>
                    </div>   
                    @endif          
                </div>
                <div class="col-md-2 text-right">

                    <div class="btn-group" style="margin:-6px 1px 12px;" class="btn btn-raised btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Opciones">
                      <a href="" class="btn btn-primary btn-raised dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-wrench"></span>&nbsp;
                      </a>
                      <ul class="dropdown-menu">
                        <li><a href="" data-target="#myModal-delete" data-toggle="modal" class="text-center">
                            <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </li>
                      </ul>
                    </div>

                    <a href="{!! url('afiliado/' . $afiliado->id) !!}" style="margin:-6px 1px 12px;" class="btn btn-raised btn-warning" data-toggle="tooltip" data-placement="top" data-original-title="Atrás">
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
                                    <h3 class="panel-title"><span class="glyphicon glyphicon-inbox"></span> Informacion General</h3>
                                </div>
                                @if($info_gen)
                                    <div class="col-md-1 text-right" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                                        <div data-toggle="modal" data-target="#myModal-modalidad"> 
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="panel-body" style="font-size: 14px">
                            <div class="row" style="margin-bottom:0px;">
                                @if($info_gen)
                                    <div class="col-md-6">
                                        <table class="table table-responsive" style="width:100%;">
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Modalidad
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $retirementfund->retirement_fund_modality->shortened !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Ciudad
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $retirementfund->city->name !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr> 
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-responsive" style="width:100%;">
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Número Tramite
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $retirementfund->getNumberTram() !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Estado
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $retirementfund->getStatus() !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                        </table>
                                    </div>
                                @else
                                    <div class="row text-center">
                                        <div data-toggle="modal" data-target="#myModal-modalidad"> 
                                            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Editar Datos Generales">
                                                <img class="circle" src="{!! asset('assets/images/modalidad.png') !!}" width="45px" alt="icon">                                                                          
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
                                    <h3 class="panel-title"><span class="glyphicon glyphicon-inbox"></span> Información de Solicitante</h3>
                                </div>
                                @if($info_soli == 1)
                                    <div class="col-md-1 text-right" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                                        <div data-toggle="modal" data-target="#myModal-solicitante"> 
                                            <span class="glyphicon glyphicon-pencil" ></span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="panel-body" style="font-size: 14px">
                            <div class="row" style="margin-bottom:0px;">

                                @if($info_soli == 1)

                                    <div class="col-md-6">

                                        <table class="table" style="width:100%;">
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Carnet Identidad
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $applicant->identity_card !!}
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
                                                            {!! $applicant->last_name !!}
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
                                                            {!! $applicant->mothers_last_name !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Nombre(s)
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $applicant->name !!}
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
                                                            Domicilio Actual
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $applicant->home_address !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Teléfono fijo
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $applicant->home_phone_number !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Teléfono Celular
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $applicant->home_cell_phone !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Domicilio Trabajo
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $applicant->work_address !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    
                                @else
                                    @if($info_gen == 1)
                                    <div class="row text-center">
                                        <div data-toggle="modal" data-target="#myModal-solicitante"> 
                                            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Adicionar Solicitante">
                                                <img class="circle" src="{!! asset('assets/images/requisitos.png') !!}" width="45px" alt="icon">                                                                          
                                            </button>
                                        </div>
                                    </div>
                                    @else
                                    <div class="row text-center">
                                       
                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal-solicitante" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Adicionar Solicitante" disabled="disabled">
                                                <img class="circle" src="{!! asset('assets/images/requisitos.png') !!}" width="45px" alt="icon">                                                                          
                                            </button>
                                    </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">  
                                <div class="col-md-11">
                                    <h3 class="panel-title"><span class="glyphicon glyphicon-inbox"></span> Documentos Presentados</h3>
                                </div>
                                @if($info_docu)
                                    <div class="col-md-1 text-right" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                                        <div data-toggle="modal" data-target="#myModal-requisitos"> 
                                            <span class="glyphicon glyphicon-pencil" ></span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="panel-body" style="font-size: 14px">
                            <div class="row" style="margin-bottom:0px;">

                                @if($info_docu)

                                    <div class="col-md-12">

                                        <table class="table table-striped table-hover" style="width:100%;font-size: 14px">
                                            <thead>
                                                <tr>
                                                    <th>Nombre de Documento</th>
                                                    <th class="text-center">Estado</th>
                                                    <th class="text-center">Fecha</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                @foreach ($document as $item)
                                                    <tr>
                                                        <td>{!! $item->requirement->shortened !!}</td>
                                                        <td> 
                                                            <div class="text-center">
                                                                @if($item->status)
                                                                <span class="glyphicon glyphicon-ok"></span>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td style="width: 20%;"> 
                                                            <div class="text-center">
                                                                @if($item->status)
                                                                    {!! $item->getData_fech_requi() !!}
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>

                                    </div>

                                @else
                                    @if($info_gen == 1 && $info_soli == 1)
                                    <div class="row text-center">
                                        <div data-toggle="modal" data-target="#myModal-requisitos"> 
                                            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Adicionar Requisitos">
                                                <img class="circle" src="{!! asset('assets/images/requisitos.png') !!}" width="45px" alt="icon">                                                                          
                                            </button>
                                        </div>
                                    </div>
                                    @else
                                    <div class="row text-center">
                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal-requisitos" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Adicionar Requisitos" disabled="disabled">
                                                <img class="circle" src="{!! asset('assets/images/requisitos.png') !!}" width="45px" alt="icon">                                                                          
                                            </button>
                                    </div>
                                    @endif
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
                                    <h3 class="panel-title"><span class="glyphicon glyphicon-folder-open"></span> Trámite Cancelados</h3>
                                </div>
                                @if($info_antec)
                                    <div class="col-md-1 text-right" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                                        <div data-toggle="modal" data-target="#myModal-antec"> 
                                            <span class="glyphicon glyphicon-pencil" ></span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="panel-body" style="font-size: 14px">
                            <div class="row" style="margin-bottom:0px;">

                                @if($info_antec)

                                    <div class="col-md-12">

                                        <table class="table table-striped table-hover" style="width:100%;font-size: 14px">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Sigla</th>
                                                    <th>Tipo de Prestación</th>
                                                    <th>Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                @foreach ($antecedent as $item)
                                                    <tr>
                                                        <td>{!! $item->antecedent_file->shortened !!}</td>
                                                        <td>{!! $item->antecedent_file->name !!}</td>    
                                                        <td> 
                                                            <div class="text-center">
                                                                @if($item->status)
                                                                <span class="glyphicon glyphicon-ok"></span>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>

                                    </div>

                                @else
                                    @if($info_gen == 1 && $info_soli == 1 && $info_docu == 1)
                                    <div class="row text-center">
                                        <div data-toggle="modal" data-target="#myModal-antec"> 
                                            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Adicionar Requisitos">
                                                <img class="circle" src="{!! asset('assets/images/requisitos.png') !!}" width="45px" alt="icon">                                                                          
                                            </button>
                                        </div>
                                    </div>
                                    @else
                                        <div class="row text-center">
                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal-antec" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Adicionar Requisitos" disabled="disabled">
                                                <img class="circle" src="{!! asset('assets/images/requisitos.png') !!}" width="45px" alt="icon">                                                                          
                                            </button>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">  
                                <div class="col-md-11">
                                    <h3 class="panel-title">Periodos de Aportes</h3>
                                </div>
                                    <div class="col-md-1 text-right" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                                        <div data-toggle="modal" data-target="#myModal-periodo-aportes"> 
                                            <span class="glyphicon glyphicon-pencil" ></span>
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
                                                        {!! $affiliate->getFull_fech_ini_apor() !!}
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
                                                        {!! $affiliate->getFull_fech_fin_apor() !!}
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
                                                        {!! $affiliate->getYearsAndMonths_fech_ini_apor() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            @if($affiliate->service_start_date)
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
                                                            {!! $affiliate->getFull_fech_ini_serv() !!}
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
                                                            {!! $affiliate->getFull_fech_fin_serv() !!}
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
                                                            {!! $affiliate->getYearsAndMonths_fech_fin_serv() !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            @endif
                            
                            @if($retirementfund->anticipation_start_date)
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
                                                            {!! $retirementfund->getFull_fech_ini_anti() !!}
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
                                                            {!! $retirementfund->getFull_fech_fin_anti() !!}
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
                                                            {!! $retirementfund->getYearsAndMonths_fech_ini_anti() !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            @endif

                            @if($retirementfund->recodnized_start_date)
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
                                                            {!! $retirementfund->getFull_fech_ini_reco() !!}
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
                                                            {!! $retirementfund->getFull_fech_fin_reco() !!}
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
                                                            {!! $retirementfund->getYearsAndMonths_fech_ini_reco() !!}
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

                </div>

            </div>

        </div>
    </div>
</div>

















<div id="myModal-modalidad" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog">
        <div class="modal-content panel-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Información General</h4>
            </div>
            <div class="modal-body">

                {!! Form::model($retirementfund, ['method' => 'PATCH', 'route' => ['tramite_fondo_retiro.update', $affiliate->id], 'class' => 'form-horizontal']) !!}
                <input type="hidden" name="type" value="gene"/>
                <div class="row">
                    <div class="col-md-12">

                        @if(($info_gen))
                        <div class="form-group">
                            <div class="col-md-4 text-right">
                                Modalidad
                            </div>
                            <div class="col-md-8">
                                 {!! $retirementfund->retirement_fund_modality->name !!}
                            </div>
                        </div>
                        @else
                        <div class="form-group">
                            {!! Form::label('modalidad', 'Modalidad', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::select('modalidad', $list_modality, $retirementfund->retirement_fund_modality_id, ['class' => 'combobox form-control ', 'required' ]) !!}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                                    {!! Form::label('departamento', 'Ciudad', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::select('departamento', $list_city, $retirementfund->city_id, ['class' => 'combobox form-control', 'required' ]) !!}
                                <span class="help-block">Seleccione el departamento</span>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="row text-center">
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{!! url('tramite_fondo_retiro/' . $afiliado->id) !!}" data-target="#" class="btn btn-raised btn-warning">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;&nbsp;</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-raised btn-primary">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;&nbsp;&nbsp;</button>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>

<div id="myModal-solicitante" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content panel-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Información de Solicitante</h4>
            </div>
            <div class="modal-body">

                {!! Form::model($applicant, ['method' => 'PATCH', 'route' => ['solicitante.update', $affiliate->id], 'class' => 'form-horizontal']) !!}
                <input type="hidden" name="type" value="soli"/>
                <div class="row">
                    <div class="col-md-3 col-md-offset-3">

                        <div class="form-group">
                          <div class="col-md-12">
                            <div class="radio radio-primary">
                              <label>
                                <input type="radio" name="type_soli" value='1' data-bind='checked: typeToShow'>
                                Titutal
                              </label>
                            </div>
                            <div class="radio radio-primary">
                              <label>
                                <input type="radio" name="type_soli" value='2' data-bind='checked: typeToShow'>
                                Conyuge
                              </label>
                            </div>
                            <div class="radio radio-primary">
                              <label>
                                <input type="radio" name="type_soli" value='3' data-bind='checked: typeToShow'>
                                Otro
                              </label>
                            </div>
                          </div>
                        </div>
                        </div>
                    <div class="col-md-3">
                        <div class="form-group label-floating" data-bind="fadeVisible: parenShow">
                            <label class="control-label" for="focusedInput2">Parentesco</label>
                            {!! Form::text('paren', $applicant->kinship, ['class'=> 'form-control', 'id'=> 'focusedInput2', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                        </div>                                 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                                {!! Form::label('ci', 'Carnet Identidad', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('ci', $applicant->identity_card,['class'=> 'form-control', 'required', 'data-bind' => 'value: soli_ci']) !!}
                                <span class="help-block">Núm. Carnet de Identidad</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('pat', 'Apellido Paterno', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('pat', $applicant->last_name, ['class'=> 'form-control', 'required', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'data-bind' => 'value: soli_pat']) !!}
                                <span class="help-block">Escriba Apellido Paterno</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('mat', 'Apellido Materno', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('mat', $applicant->mothers_last_name, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'data-bind' => 'value: soli_mat']) !!}
                                <span class="help-block">Escriba Apellido Materno</span>
                            </div>
                        </div>  
                        <div class="form-group">
                                {!! Form::label('nom', 'Nombre(s)', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('nom', $applicant->name, ['class'=> 'form-control', 'required', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'data-bind' => 'value: soli_nom']) !!}
                                <span class="help-block">Escriba los Nombre(s)</span>
                            </div>
                        </div>                                                  
                    </div>

                    <div class="col-md-7">
                        <div class="form-group">
                                {!! Form::label('direc_domi', 'Domicilio  Actual', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('direc_domi', $applicant->home_address, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'data-bind' => 'value: soli_direc_domi']) !!}
                                <span class="help-block">Escriba Domicilio Actual</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('tele_domi', 'Teléfono fijo', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('tele_domi', $applicant->home_phone_number, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'data-bind' => 'value: soli_tele_domi']) !!}
                                <span class="help-block">Escriba Número Teléfono fijo</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('celu_domi', 'Teléfono Celular', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('celu_domi', $applicant->home_cell_phone_number, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'data-bind' => 'value: soli_celu']) !!}
                                <span class="help-block">Escriba NúmeroTeléfono Celular</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('direc_trab', 'Domicilio Trabajo', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-7">
                                {!! Form::text('direc_trab', $applicant->home_address, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Escriba Domicilio de Trabajo</span>
                            </div>
                        </div>
                        
                        
                    </div>

                </div>

                <div class="row text-center">
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{!! url('tramite_fondo_retiro/' . $afiliado->id) !!}" data-target="#" class="btn btn-raised btn-warning">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;&nbsp;</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-raised btn-primary">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;&nbsp;&nbsp;</button>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>




<div id="myModal-requisitos" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content panel-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Documentos</h4>
            </div>
            <div class="modal-body">

                {!! Form::model($requirement, ['method' => 'PATCH', 'route' => ['tramite_fondo_retiro.update', $affiliate->id], 'class' => 'form-horizontal']) !!}
                <input type="hidden" name="type" value="docu"/>
                <div class="row">
                    <div class="col-md-12" data-bind="event: { mouseover: enableDetails, mouseout: disableDetails }">
                        <table class="table table-striped table-hover" style="width:100%;font-size: 14px">
                            <thead>
                                <tr>
                                    <th>Requisitos</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody data-bind="foreach: requisitos">
                                <tr>
                                    <td data-bind='text: requiname'></td>
                                    <td> 
                                        <div class="row text-center">
                                            <div class="checkbox">
                                                <label><input type="checkbox" data-bind="checked: booleanValue"></label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
 
                <input type="hidden" name="data" data-bind="value: lastSavedJson"/>

                <div class="row text-center">
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{!! url('tramite_fondo_retiro/' . $affiliate->id) !!}" data-target="#" class="btn btn-raised btn-warning">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;&nbsp;</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-raised btn-primary">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;&nbsp;&nbsp;</button>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>

<div id="myModal-antec" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content panel-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Antecedentes</h4>
            </div>
            <div class="modal-body">

                {!! Form::model($antecedent_file, ['method' => 'PATCH', 'route' => ['tramite_fondo_retiro.update', $affiliate->id], 'class' => 'form-horizontal']) !!}
                <input type="hidden" name="type" value="antec"/>
                <div class="row">
                    <div class="col-md-12" data-bind="event: { mouseover: enableDetails2, mouseout: disableDetails2 }">
                        <table class="table table-striped table-hover" style="width:100%;font-size: 14px">
                            <thead>
                                <tr>
                                    <th class="text-center">Sigla</th>
                                    <th>Tipo de Prestación</th>
                                    <th class="text-center">Estado</th>
                                </tr>
                            </thead>
                            <tbody data-bind="foreach: prestaciones">
                                <tr>
                                    <td data-bind='text: sigla'></td>
                                    <td data-bind='text: prestaname'></td>
                                    <td> 
                                        <div class="row text-center">
                                            <div class="checkbox">
                                                <label><input type="checkbox" data-bind="checked: booleanValue"></label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
 
                <input type="hidden" name="data" data-bind="value: lastSavedJson2"/>

                <div class="row text-center">
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{!! url('tramite_fondo_retiro/' . $affiliate->id) !!}" data-target="#" class="btn btn-raised btn-warning">Cancelar&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span></a>
                            &nbsp;&nbsp;<button type="submit" class="btn btn-raised btn-primary">Actualizar&nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk"></span></button>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>

<div id="myModal-periodo-aportes" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content panel-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editar Periodos</h4>
            </div>
            <div class="modal-body">

                {!! Form::model($affiliate, ['method' => 'PATCH', 'route' => ['tramite_fondo_retiro.update', $affiliate->id], 'class' => 'form-horizontal']) !!}
                <input type="hidden" name="type" value="periods"/>
                <div class="row">
                    <h5 class="modal-title">Años de Aportes</h5>
                    <div class="row" style="margin-bottom:0px;">                       
                        <div class="col-md-6">
                            <table class="table" style="width:100%;">
                                <tr>
                                    <td style="border-top:0;border-bottom:1px solid #d4e4cd;">
                                        <div class="row">
                                            <div class="col-md-4">
                                                Desde
                                            </div>
                                            <div class="col-md-8">
                                                {!! $affiliate->getFull_fech_ini_apor() !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table" style="width:100%;">
                                <tr>
                                    <td style="border-top:0;border-bottom:1px solid #d4e4cd;">
                                        <div class="row">
                                            <div class="col-md-4">
                                                Hasta
                                            </div>
                                            <div class="col-md-8">
                                                {!! $affiliate->getFull_fech_fin_apor() !!}
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
                                        <input type="text" class="form-control" name="fech_ini_serv" value="{!! $affiliate->getData_fech_ini_serv() !!}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('fech_fin_serv', 'HASTA', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="fech_fin_serv" value="{!! $affiliate->getData_fech_fin_serv() !!}"/>
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
                                        <input type="text" class="form-control" name="fech_ini_anti" value="{!! $affiliate->getData_fech_ini_anti() !!}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('fech_fin_anti', 'HASTA', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="fech_fin_anti" value="{!! $affiliate->getData_fech_fin_anti() !!}"/>
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
                                        <input type="text" class="form-control" name="fech_ini_reco" value="{!! $affiliate->getData_fech_ini_reco() !!}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('fech_fin_reco', 'HASTA', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="fech_fin_reco" value="{!! $affiliate->getData_fech_fin_reco() !!}"/>
                                    </div>
                                </div>
                            </div>
                        </div>                                                     
                    </div>
                </div>
                <div class="row text-center">
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{!! url('tramite_fondo_retiro/' . $affiliate->id) !!}" data-target="#" class="btn btn-raised btn-warning">Cancelar&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span></a>
                            &nbsp;&nbsp;<button type="submit" class="btn btn-raised btn-primary">Actualizar&nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk"></span></button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>



<div id="myModal-print-ventanilla" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content panel-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Ventanilla Fondo de Retiro</h4>
            </div>
            <div class="modal-body">
                <iframe src="{!! url('tramite_fondo_retiro_ventanilla/' . $affiliate->id) !!}" width="99%" height="1200"></iframe>
            </div>
        </div>
    </div>
</div>

<div id="myModal-printcertificacion" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content panel-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Certificación Fondo de Retiro</h4>
            </div>
            <div class="modal-body">
                <iframe src="{!! url('tramite_fondo_retiro_certificacion/' . $affiliate->id) !!}" width="99%" height="1200"></iframe>
            </div>
        </div>
    </div>
</div>

<div id="myModal-printcalificacion" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content panel-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Calificación de Fondo de Retiro</h4>
            </div>
            <div class="modal-body">
                <iframe src="{!! url('tramite_fondo_retiro_calificacion/' . $affiliate->id) !!}" width="99%" height="1200"></iframe>
            </div>
        </div>
    </div>
</div>

<div id="myModal-printdictamen" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content panel-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Dictamen Legal</h4>
            </div>
            <div class="modal-body">
                <iframe src="{!! url('tramite_fondo_retiro_dictamenlegal/' . $affiliate->id) !!}" width="99%" height="1200"></iframe>
            </div>
        </div>
    </div>
</div>

<div id="myModal-delete" class="modal fade">
    <div class="modal-dialog">
        <div class="alert alert-dismissible alert-danger">
           {!! Form::model($affiliate, ['method' => 'DELETE', 'route' => ['tramite_fondo_retiro.destroy', $affiliate->id], 'class' => 'form-horizontal']) !!}

                <div class="modal-body text-center">
                    <p><br>
                        <div><h4>¿Está seguro de eliminar el Trámite de Fondo de Retiro?</h4></div>
                    </p>
                </div>
                <div class="row text-center">
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-raised btn-default" data-dismiss="modal">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;&nbsp;</button>
                            &nbsp;&nbsp;&nbsp;
                            <button type="submit" class="btn btn-raised btn-default">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp;&nbsp;</button>

                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
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
    var solicitante = {!! $solicitante !!};

    var Model = function(requisitos, prestaciones) {
        @if ($info_docu)
            this.requisitos = ko.observableArray(ko.utils.arrayMap(requisitos, function(documento) {
            return { requisito_id: documento.requisito_id, requiname: documento.requisito.name, booleanValue: documento.est };
            }));
        @else
            this.requisitos = ko.observableArray(ko.utils.arrayMap(requisitos, function(documento) {
            return { requisito_id: documento.id, requiname: documento.name, booleanValue: false };
            }));
        @endif

        @if ($info_antec)
            this.prestaciones = ko.observableArray(ko.utils.arrayMap(prestaciones, function(documento) {
            return { prestacion_id: documento.prestacion_id, sigla: documento.prestacion.sigla, prestaname: documento.prestacion.name, booleanValue: documento.est };
            }));
        @else
            this.prestaciones = ko.observableArray(ko.utils.arrayMap(prestaciones, function(documento) {
            return { prestacion_id: documento.id, sigla: documento.sigla, prestaname: documento.name, booleanValue: false };
            }));
        @endif

        this.enableDetails = function() {
            this.lastSavedJson(JSON.stringify(ko.toJS(this.requisitos), null, 2));
        };
        this.disableDetails = function() {
            this.lastSavedJson(JSON.stringify(ko.toJS(this.requisitos), null, 2));
        };
     
        this.lastSavedJson = ko.observable("");


        this.enableDetails2 = function() {
            this.lastSavedJson2(JSON.stringify(ko.toJS(this.prestaciones), null, 2));
        };
        this.disableDetails2 = function() {
            this.lastSavedJson2(JSON.stringify(ko.toJS(this.prestaciones), null, 2));
        };
     
        this.lastSavedJson2 = ko.observable("");

        this.typeToShow = ko.observable('' + solicitante.soli_type_id);
        this.parenShow = ko.observable(false);
        this.parenShow = ko.pureComputed(function() {
            var desiredType = this.typeToShow();
            if (desiredType == '3') return true;

        }, this);

        this.soli_ci = ko.computed(function() {
            var desiredType = this.typeToShow();
            if (desiredType == '1'){
                return titular.ci;
            } 
            if (desiredType == '2'){
                return conyuge.ci;
            } 
            if (desiredType == '3'){
                return solicitante.ci;
            }
        }, this);

        this.soli_pat = ko.computed(function() {
            var desiredType = this.typeToShow();
            if (desiredType == '1'){
                return titular.pat;
            } 
            if (desiredType == '2'){
                return conyuge.pat;
            } 
            if (desiredType == '3'){
                return solicitante.pat;
            }
        }, this);

        this.soli_mat = ko.computed(function() {
            var desiredType = this.typeToShow();
            if (desiredType == '1'){
                return titular.mat;
            } 
            if (desiredType == '2'){
                return conyuge.mat;
            } 
            if (desiredType == '3'){
                return solicitante.mat;
            }
        }, this);

        this.soli_nom = ko.computed(function() {
            var desiredType = this.typeToShow();
            if (desiredType == '1'){
                var nom2 = titular.nom2 ? titular.nom2 : '';
                return titular.nom +" "+ nom2;
            } 
            if (desiredType == '2'){
                return conyuge.nom;
            } 
            if (desiredType == '3'){
                return solicitante.nom;
            }
        }, this);

        this.soli_direc_domi = ko.computed(function() {
            var desiredType = this.typeToShow();
            if (desiredType == '1'){
                var zona = titular.zona ? titular.zona : '';
                var calle = titular.calle ? titular.calle : '';
                var num_domi = titular.num_domi ? "N° " + titular.num_domi : '';
                return zona + " " + calle + " " + num_domi;
            } 
            if (desiredType == '2'){
                return solicitante.direc_domi;
            } 
            if (desiredType == '3'){
                return solicitante.direc_domi;
            }

        }, this);

        this.soli_tele_domi = ko.computed(function() {
            var desiredType = this.typeToShow();
            if (desiredType == '1'){
                return titular.tele;
            } 
            if (desiredType == '2'){
                return solicitante.tele_domi;
            } 
            if (desiredType == '3'){
                return solicitante.tele_domi;
            }
        }, this);

        this.soli_celu = ko.computed(function() {
            var desiredType = this.typeToShow();
            if (desiredType == '1'){
                return titular.celu;
            } 
            if (desiredType == '2'){
                return solicitante.celu_domi;
            } 
            if (desiredType == '3'){
                return solicitante.celu_domi;
            }
        }, this);
  
        this.periodoValue = ko.observable(titular.fech_ini_reco ? true : false);     
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
    
    @if ($info_docu)
        @if ($info_antec)
        ko.applyBindings(new Model({!! $documentos !!}, {!! $antecedentes !!}));
        @else
        ko.applyBindings(new Model({!! $documentos !!}, {!! $prestaciones !!}));
        @endif
    @else
        @if ($info_antec)
        ko.applyBindings(new Model({!! $requisitos !!}, {!! $antecedentes !!}));
        @else
        ko.applyBindings(new Model({!! $requisitos !!}, {!! $prestaciones !!}));
        @endif
    @endif

</script>
@endpush