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
                    <a  style="margin:-6px 1px;" href="{!! url('afiliado/' . $afiliado->id) !!}" class="btn btn-raised btn-warning"  data-toggle="tooltip" data-placement="top" data-original-title="Volver">
                       &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-share-alt"></span>&nbsp;&nbsp;&nbsp;
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">  
                                <div class="col-md-12">
                                    <h3 class="panel-title">A) DATOS DEL TITULAR</h3>
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
                                                        NÚMERO DE MATRÍCULA
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
                                                        NÚMERO ÚNICO DE AFILIADO-AFP
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
                                                        ESTADO CIVIL
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
                                                        EDAD
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
                                                        DIRECCIÓN DOMICILIO
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
                                                        FECHA DE FALLECIMIENTO
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
                                                        CAUSA DE FALLECIMIENTO
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

                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">  
                                <div class="col-md-12">
                                    <h3 class="panel-title">B) DATOS INSTITUCIONALES</h3>
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
                                                        GRADO
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
                                                        FECHA DE ALTA 
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
                                                        FECHA DE BAJA
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
                                                        MOTIVO DE BAJA
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
                                                        PERIODO DE APORTE
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
                                                        PERIODO DE SERVICIO
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
                                                        PERIODO ADICIONAL
                                                    </div>
                                                    <div class="col-md-8">
                                                        {!! $afiliado->fech_ini_anti ? "Desde " . $afiliado->getFull_fech_ini_anti() . " - Hasta " . $afiliado->getFull_fech_fin_anti() . "<br>Total " . $afiliado->getYearsAndMonths_fech_ini_anti() : '' !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        PERIODO DE RECONOCIMIENTO
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

                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">  
                                <div class="col-md-12">
                                    <h3 class="panel-title">C) DATOS DE CONYUGE</h3>
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
                                                        NOMBRE DE CONYUGE
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
                                                        FECHA DE NACIMIENTO
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
                                                        CARNET DE IDENTIDAD
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
                                                        FECHA DE FALLECIMIENTO
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
                                                        CAUSA DE FALLECIMIENTO
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

                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">  
                                <div class="col-md-12">
                                    <h3 class="panel-title">D) DATOS DE SOLICITANTE</h3>
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
                                                        NOMBRE DE SOLICITANTE
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
                                                        PARENTESCO CON TITULAR
                                                    </div>
                                                    <div class="col-md-8">
                                                        {!! $titular->paren !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        CARNET DE IDENTIDAD
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
                                                        DIRECCIÓN DE DOMICILIO
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
                                                        DIRECCIÓN DE TRABAJO
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
                                                        TELEFONO CELULAR Y/O DOMICILIO
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
            </div>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-primary">
                        <div class="panel-heading">                     
                            <div class="row">  
                                <div class="col-md-12">
                                    <h3 class="panel-title">ESTADO DE CUENTA INDIVIDUAL<br>FONDO DE RETIRO POLICIAL</h3>
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
                                            <td style="text-align: right">10</td>
                                        </tr>
                                        <tr>
                                            <td>TOTAL COTIZABLE</td>
                                            <td style="text-align: right">10</td>
                                        </tr>
                                        <tr class="active">
                                            <td>TOTAL DE MESES COTIZABLES</td>
                                            <td style="text-align: right">10</td>
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

@endsection

