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
                                    <h3 class="panel-title">FICHA TÉCNICA DE CALIFICACIÓN</h3>
                                </div>
                               
                            </div>
                        </div>
                        <div class="panel-body" style="font-size: 14px">
                            <div class="row">
                                <div class="col-md-12">
                                    
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

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>



@endsection

