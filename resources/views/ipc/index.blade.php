@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-heading">
                <div class="row">  
                    <div class="col-md-8">
                        <h4><b>Índice de Precios al Consumidor</b></h4>
                    </div>
                </div>
            </div>
    
            <div class="row">
                
                <div class="col-md-6">
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
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Actualizar Aportes de {!! $subMonth ." " . $ipcTasa->anio !!}</h3>
                        </div>
                        <div class="panel-body" style="font-size: 14px">

                            <div class="row">
                                <div class="col-md-12">     
                                    <div class="form-group form-group-lg">
                                            {!! Form::label('anio', 'AÑO', ['class' => 'col-md-5 control-label']) !!}
                                        <div class="col-md-4">
                                            {!! Form::text('anio', $ipcTasa->anio, ['class'=> 'form-control', 'required' => 'required']) !!}
                                            <span class="help-block">año</span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                            {!! Form::label('mes', 'MES', ['class' => 'col-md-5 control-label']) !!}
                                        <div class="col-md-4">
                                            {!! Form::select('mes', $meses, $ipcTasa->mes,['class' => 'combobox form-control', 'required' => 'required']) !!}
                                            <span class="help-block">Selecione el mes</span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                            {!! Form::label('ipc', 'IPC', ['class' => 'col-md-5 control-label']) !!}
                                        <div class="col-md-4">
                                            {!! Form::text('ipc', $ipcTasa->ipc, ['class'=> 'form-control', 'required' => 'required']) !!}
                                            <span class="help-block">Monto de IPC</span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                        <div class="col-md-offset-4 col-md-10">
                                            <div class="togglebutton">
                                              <label>
                                                <input type="checkbox" name="now" checked=""> Repetir al Mes de {!! $month !!} 
                                              </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="form-group form-group">
                                  <div class="col-md-12">
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

$(document).ready(function(){
        $('.combobox').combobox();
      });

$(function() {
    $('#afiliados-table').DataTable({
        "dom": '<"top">t<"bottom"p>',
        processing: true,
        serverSide: true,
        bFilter: false, 
        bInfo: false,
        pageLength: 10,
        "scrollX": true,
        ajax: '{!! route('getIpc') !!}',
        order: [[0, "desc"], [1, "desc"]],

        columns: [
            { data: 'anio', name: 'anio', sWidth: '10%' },
            { data: 'mes', name: 'mes', "sClass": "text-center", sWidth: '45%' },
            { data: 'ipc', name: 'ipc', "sClass": "text-center", sWidth: '45%' }
        ]
    });
});
</script>
@endpush
