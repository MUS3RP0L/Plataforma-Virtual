@extends('layout')

@section('content')
<div class="container-fluid">
    {!! Breadcrumbs::render('calif_sv_afiliado', $afiliado) !!}
    <div class="row">
        <div class="col-md-12">
    
            <div class="row">  
                <div class="col-md-8">
                    <h2 style="margin-top:-2px;">{!! $afiliado->getTittleName() !!}</h2>

                </div>
                <div class="col-md-4 text-right"> 

                    <div class="btn-group" style="margin:-6px 1px;" data-toggle="tooltip" data-placement="top" data-original-title="Imprimir">
                      <a href="" data-target="#myModal-print" class="btn btn-raised btn-success dropdown-toggle" data-toggle="modal">
                        &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;&nbsp;
                      </a>
                    </div>

                    <div class="btn-group" style="margin:-6px 1px;">
                       <a href="{!! url('afiliado/' . $afiliado->id) !!}" class="btn btn-raised btn-warning"  data-toggle="tooltip" data-placement="top" data-original-title="Volver">
                       &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-share-alt"></span>&nbsp;&nbsp;&nbsp;
                    </a> 
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-6">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">  
                                <div class="col-md-12">
                                    <h3 class="panel-title">Datos del Titular</h3>
                                </div>      
                            </div>
                        </div>
                        <div class="panel-body" style="font-size: 14px">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <table class="table table-responsive" style="width:100%;">
                                        <tr>
                                            <td style="border-top:0;border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Nombre del Beneficiario
                                                    </div>
                                                    <div class="col-md-8">
                                                         {!! $afiliado->getFullNametoPrint() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Fecha de Nacimiento
                                                    </div>
                                                    <div class="col-md-8">
                                                        {!! $afiliado->getFullDateNactoPrint() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Número Matrícula
                                                    </div>
                                                    <div class="col-md-8">
                                                        {!! $afiliado->matri !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Número Matrícula Seguro
                                                    </div>
                                                    <div class="col-md-8">
                                                        {!! $afiliado->nua !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Carnet de Identidad
                                                    </div>
                                                    <div class="col-md-8">
                                                        {!! $afiliado->ci !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Estado Civil
                                                    </div>
                                                    <div class="col-md-8">
                                                        {!! $afiliado->getCivil() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Edad
                                                    </div>
                                                    <div class="col-md-8">
                                                        {!! $afiliado->getHowOld() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Dirección de Domicilio
                                                    </div>
                                                    <div class="col-md-8">
                                                        {!! $afiliado->getFullDirecctoPrint() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Documento Presentado
                                                    </div>
                                                    <div class="col-md-8">
                                                        
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Fecha de Fallecimento
                                                    </div>
                                                    <div class="col-md-8">
                                                        {!! $afiliado->getFull_fech_decetoPrint() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Causa de Fallecimento
                                                    </div>
                                                    <div class="col-md-8">
                                                        {!! $afiliado->motivo_dece !!}
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
                                <div class="col-md-12">
                                    <h3 class="panel-title">Datos de Conyugue</h3>
                                </div>      
                            </div>
                        </div>
                        <div class="panel-body" style="font-size: 14px">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <table class="table table-responsive" style="width:100%;">
                                        <tr>
                                            <td style="border-top:0;border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Nombre de Conyuge
                                                    </div>
                                                    <div class="col-md-8">
                                                         {!! $conyuge->getFullNametoPrint() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Fecha de Nacimiento
                                                    </div>
                                                    <div class="col-md-8">
                                                        {!! $conyuge->getFullDateNactoPrint() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Carnet de Identidad
                                                    </div>
                                                    <div class="col-md-8">
                                                         {!! $conyuge->ci !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Fecha de Fallecimiento
                                                    </div>
                                                    <div class="col-md-8">
                                                         {!! $conyuge->getFull_fech_decetoPrint() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Causa de Fallecimiento
                                                    </div>
                                                    <div class="col-md-8">
                                                         {!! $conyuge->motivo_dece !!}
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
                                <div class="col-md-12">
                                    <h3 class="panel-title">Datos de Beneficiario</h3>
                                </div>      
                            </div>
                        </div>
                        <div class="panel-body" style="font-size: 14px">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <table class="table table-responsive" style="width:100%;">
                                        <tr>
                                            <td style="border-top:0;border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Nombre Beneficiario
                                                    </div>
                                                    <div class="col-md-8">
                                                         {!! $titular->getFullNametoPrint() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Carnet de Identidad
                                                    </div>
                                                    <div class="col-md-8">
                                                         {!! $titular->ci !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Dirección de Domicilio
                                                    </div>
                                                    <div class="col-md-8">
                                                         {!! $titular->getFullDireccDomitoPrint() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Dirección de Trabajo
                                                    </div>
                                                    <div class="col-md-8">
                                                         {!! $titular->getFullDireccTrabtoPrint() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Teléfono y/o Celular
                                                    </div>
                                                    <div class="col-md-8">
                                                         {!! $titular->getFullNumber() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                    </table>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">  
                                <div class="col-md-12">
                                    <h3 class="panel-title">Datos Institucionales</h3>
                                </div>      
                            </div>
                        </div>
                        <div class="panel-body" style="font-size: 14px">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <table class="table table-responsive" style="width:100%;">
                                        <tr>
                                            <td style="border-top:0;border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Grado
                                                    </div>
                                                    <div class="col-md-8">
                                                         {!! $afiliado->grado->lit !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Fecha de Alta 
                                                    </div>
                                                    <div class="col-md-8">
                                                        {!! $afiliado->getFullDateIngtoPrint() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Fecha de Baja
                                                    </div>
                                                    <div class="col-md-8">
                                                         {!! $afiliado->getData_fech_bajatoPrint() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Motivo de Baja
                                                    </div>
                                                    <div class="col-md-8">
                                                         {!! $afiliado->motivo_baja !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Años de Aporte
                                                    </div>
                                                    <div class="col-md-8">
                                                         {!! $afiliado->fech_ini_apor ? "Desde " . $afiliado->getFull_fech_ini_apor() . " - Hasta " . $afiliado->getFull_fech_fin_apor() . "<br>Total " . $afiliado->getYearsAndMonths_fech_ini_apor() : '' !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Años de Servicio
                                                    </div>
                                                    <div class="col-md-8">
                                                        {!! $afiliado->fech_ini_serv ? "Desde " . $afiliado->getFull_fech_ini_serv() . " - Hasta " . $afiliado->getFull_fech_fin_serv() . "<br>Total " . $afiliado->getYearsAndMonths_fech_fin_serv() : '' !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        Años de Aportes Reconocidos
                                                    </div>
                                                    <div class="col-md-8">
                                                        {!! $afiliado->fech_ini_reco ? "Desde " . $afiliado->getFull_fech_ini_reco() . " - Hasta " . $afiliado->getFull_fech_fin_reco() . "<br>Total " . $afiliado->getYearsAndMonths_fech_ini_reco() : '' !!}
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
                                <div class="col-md-12">
                                    <h3 class="panel-title">Estado de Cuenta Individual Fondo de Retiro Policial</h3>
                                </div>      
                            </div>
                        </div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-hover" style="width:100%;font-size: 14px">
                                        <thead>
                                            <tr>
                                                <th colspan="2" class="service">PERIODO DE APORTES CONSIDERADOS</th>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <td>PERIODO DE APORTES</td>
                                            <td style="text-align: right;width: 50%;">{!! $calificacion->fech_ini_pcot ? "Desde " . $calificacion->getFull_fech_ini_pcot() . " - Hasta " . $calificacion->getFull_fech_fin_pcot() : '' !!}</td>
                                        </tr>
                                        <tr>
                                            <td>TIEMPO COTIZABLE</td>
                                            <td style="text-align: right">{!! $calificacion->fech_ini_pcot ? $calificacion->getYearsAndMonths_fech_pcot() : '' !!}</td>
                                        </tr>
                                        <tr class="active">
                                            <td>TOTAL DE MESES COTIZABLES</td>
                                            <td style="text-align: right">{!! $calificacion->fech_ini_pcot ? $calificacion->getMonths_fech_pcot() : '' !!}</td>
                                        </tr>
                                    </table>

                                    <br>
                
                                    <table class="table table-bordered table-hover" style="width:100%;font-size: 14px">
                                        <thead>
                                            <tr>
                                                <th colspan="2" class="service">DATOS ECONÓMICOS DEL AFILIADO</th>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <td>COTIZABLE</td>
                                            <td style="text-align: right;width: 50%;">{!! $cotizable !!}</td>
                                        </tr>
                                        <tr>
                                            <td>TOTAL COTIZABLE ADICIONAL</td>
                                            <td style="text-align: right">0.00</td>
                                        </tr>
                                        <tr class="active">
                                            <td>TOTAL GENERAL COTIZABLE</td>
                                            <td style="text-align: right">{!! $cotizable !!}</td>
                                        </tr>
                                    </table>

                                    <table class="table table-bordered table-hover" style="width:100%;font-size: 14px">
                                        <tr>
                                            <td>SUBTOTAL FONDO DE RETIRO</td>
                                            <td style="text-align: right;width: 50%;">{!! $fon !!}</td>
                                        </tr>
                                        <tr>
                                            <td>RENDIMIENTO OBTENIDO</td>
                                            <td style="text-align: right">0.00</td>
                                        </tr>
                                        <tr class="active">
                                            <td>TOTAL FONDO DE RETIRO</td>
                                            <td style="text-align: right">{!! $fon !!}</td>
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

<div id="myModal-print" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content panel-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Calificación Fondo de Retiro</h4>
            </div>
            <div class="modal-body">
                <iframe src="{!! url('print_calif_fr/' . $afiliado->id) !!}" width="99%" height="1200"></iframe>
            </div>
        </div>
    </div>
</div>



@endsection

