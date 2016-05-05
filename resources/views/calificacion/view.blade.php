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
                                                        PERIODO DE APORTE (S/g Cta. Individual)
                                                    </div>
                                                    <div class="col-md-8">
                                                         {!! "Desde " . $afiliado->getFull_fech_ini_apor() . " Hasta " . $afiliado->getFull_fech_fin_apor() . " Total " . $afiliado->getYearsAndMonths_fech_ini_apor() !!}
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
        </div>
    </div>
</div>



@endsection

