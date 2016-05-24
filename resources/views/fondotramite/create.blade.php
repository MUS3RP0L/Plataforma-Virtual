@extends('layout')

@section('content')
<div class="container-fluid">
    {!! Breadcrumbs::render('ventanilla_fondo_tramite', $afiliado) !!}
    <div class="row">
        <div class="col-md-12">
    
            <div class="row">  
                <div class="col-md-8">
                    <h2 style="margin-top:-2px;">{!! $afiliado->getTittleName() !!}</h2>

                </div>
                <div class="col-md-4 text-right"> 

                    <div class="btn-group" style="margin:-6px 1px;">
                       <a href="{!! url('afiliado/' . $afiliado->id) !!}" class="btn btn-raised btn-warning"  data-toggle="tooltip" data-placement="top" data-original-title="Volver">
                       &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-share-alt"></span>&nbsp;&nbsp;&nbsp;
                    </a> 
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-md-offset-3">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">  
                                <div class="col-md-12">
                                    <h3 class="panel-title">Modalidad</h3>
                                </div>      
                            </div>
                        </div>
                        <div class="panel-body" style="font-size: 14px">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="row">
                                        <div class="form-group">
                                            {!! Form::label('modalidad', 'MODALIDAD', ['class' => 'col-md-4 control-label']) !!}
                                            <div class="col-md-8">
                                                {!! Form::select('modalidad', $list_modalidades, '', ['class' => 'combobox form-control']) !!}
                                                <span class="help-block">Seleccione la Modalidad</span>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                           
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">  
                                <div class="col-md-12">
                                    <h3 class="panel-title">Datos Generales</h3>
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
                                                        Solicitante
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
                                                        Titular
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


@push('scripts')
    <script type="text/javascript">

        $(document).ready(function(){
            $('.combobox').combobox();
            $('[data-toggle="tooltip"]').tooltip();
        });

    </script>
@endpush