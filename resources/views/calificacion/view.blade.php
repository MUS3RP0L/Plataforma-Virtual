@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
    
            <div class="row">  
                <div class="col-md-8">
                    <h3>{!! $afiliado->pat !!} {!! $afiliado->mat !!}  {!! $afiliado->nom !!} {!! $afiliado->nom2 !!} {!! $afiliado->ap_esp !!}</h3>
                    <h4><b>{!! $afiliado->grado->lit !!}</b></h4>
                </div>
                <div class="col-md-4 text-right"> 
                    <a href="{!! url('afiliado/' . $afiliado->id) !!}" class="btn btn-raised btn-warning">
                       Regresar&nbsp;&nbsp;<i class="glyphicon glyphicon-share-alt"></i>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">

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
                                                        NOMBRE DEL BENEFICIARIO
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
                                                        CARNET DE IDENTIDAD
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
                                                        FECHA DE NACIMIENTO
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
                                <div class="col-md-11">
                                    <h3 class="panel-title">ESTADO DE CUENTA INDIVIDUAL<br>FONDO DE RETIRO POLICIAL</h3>
                                </div>
                                <div class="col-md-1 text-right" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                                    <div data-toggle="modal" data-target="#myModal-calificacion"> 
                                        <span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span>
                                    </div>
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


<div id="myModal-calificacion" class="modal fade" role="dialog">
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
                    <div class="col-md-12">
                        <div class="form-group">                            
                            <div class="input-daterange input-group" id="datepicker">
                                <div class="col-md-6">
                                    {!! Form::label('fech_ini_apor', 'DESDE', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="fech_ini_apor" value="{!! $afiliado->getData_fech_ini_apor() !!}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('fech_fin_apor', 'HASTA', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="fech_fin_apor" value="{!! $afiliado->getData_fech_fin_apor() !!}"/>
                                    </div>
                                </div>
                            </div>
                        </div>                                                     
                    </div>
                </div>

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

                <div class="row">
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
                <div class="row">
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

