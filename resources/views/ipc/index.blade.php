@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-heading">
                <div class="row">  
                    <div class="col-md-8">
                        <h4><b>Actualizar Aportes de {!! $date !!}</b></h4>
                    </div>
                </div>
            </div>
    
            <div class="row">
                
                <div class="col-md-6">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Índice de Precios al Consumidor</h3>
                            </div>
                        </div> 
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Despliegue de Índice de Precios al Consumidor</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row"><p>
                                <div class="col-md-12">
                                    <table class="table table-striped table-hover" id="afiliados-table">
                                        <thead>
                                            <tr class="success">
                                                <th>Año</th>
                                                <th>Mes</th>
                                                <th>IPC</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>                      
                        </div>
                    </div>
                </div>

                {!! Form::model($ipcTasa, ['method' => 'PATCH', 'route' => ['ipc.update', $ipcTasa->id], 'class' => 'form-horizontal']) !!}

                <div class="col-md-6">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Actualizar IPC de {!! $date !!}</h3> 
                            </div>
                        </div> 
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">ACTUALIZAR</h3>
                        </div>
                        <div class="panel-body" style="font-size: 14px">

                            <div class="row">
                                <div class="col-md-12">     
                                    <div class="form-group form-group-lg">
                                            {!! Form::label('anio', 'AÑO', ['class' => 'col-md-5 control-label']) !!}
                                        <div class="col-md-4">
                                            {!! Form::text('anio', $ipcTasa->anio, ['class'=> 'form-control', 'required' => 'required', 'disabled' => '']) !!}
                                            <span class="help-block">Número de Carnet</span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                            {!! Form::label('mes', 'MES', ['class' => 'col-md-5 control-label']) !!}
                                        <div class="col-md-4">
                                            {!! Form::text('mes', $ipcTasa->mes, ['class'=> 'form-control', 'required' => 'required', 'disabled' => '']) !!}
                                            <span class="help-block">Número de Carnet</span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                            {!! Form::label('ipc', 'IPC', ['class' => 'col-md-5 control-label']) !!}
                                        <div class="col-md-4">
                                            {!! Form::text('ipc', $ipcTasa->ipc, ['class'=> 'form-control', 'required' => 'required']) !!}
                                            <span class="help-block">Número de Carnet</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="form-group form-group">
                                  <div class="col-md-12">
                                    <a href="{!! url('tasa') !!}" class="btn btn-raised btn-warning">Cancelar</a>
                                    <button type="submit" class="btn btn-raised btn-primary">Aceptar</button>
                                  </div>
                                </div>
                            </div>      

                        </div>
                    </div>

                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function() {
    $('#afiliados-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('getIpc') !!}',
        order: [[0, "desc"], [1, "desc"]],

        columns: [
            { data: 'anio', name: 'anio', sWidth: '15%' },
            { data: 'mes', name: 'mes', sWidth: '15%' },
            { data: 'ipc', name: 'ipc', sWidth: '15%' },
        ]
    });
});
</script>
@endpush
