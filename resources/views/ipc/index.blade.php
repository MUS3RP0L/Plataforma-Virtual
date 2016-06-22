@extends('layout')

@section('content')
<div class="container-fluid">
    {!! Breadcrumbs::render('tasas_ipc') !!}
    <div class="row">
        <div class="col-md-12">
    
            <div class="row">
                
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Despliegue</h3>
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

                {!! Form::model($ipcTasaLast, ['method' => 'PATCH', 'route' => ['ipc.update', $ipcTasaLast->id], 'class' => 'form-horizontal']) !!}

                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Actualizar</h3>
                        </div>
                        <div class="panel-body" style="font-size: 14px">

                            <div class="row">
                                <div class="col-md-12">     
                                    <div class="form-group form-group-lg">
                                            {!! Form::label('year', 'AÑO', ['class' => 'col-md-5 control-label']) !!}
                                        <div class="col-md-4">
                                            {!! Form::text('year', $ipcTasaLast->year, ['class'=> 'form-control', 'required' => 'required']) !!}
                                            <span class="help-block">Seleccione el año</span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                            {!! Form::label('month', 'MES', ['class' => 'col-md-5 control-label']) !!}
                                        <div class="col-md-4">
                                            {!! Form::select('month', $meses, $ipcTasaLast->month,['class' => 'combobox form-control', 'required' => 'required']) !!}
                                            <span class="help-block">Seleccione el mes</span>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg">
                                            {!! Form::label('ipc', 'IPC', ['class' => 'col-md-5 control-label']) !!}
                                        <div class="col-md-2">
                                            {!! Form::text('ipc', $ipcTasaLast->ipc, ['class'=> 'form-control', 'required' => 'required']) !!}
                                            <span class="help-block">Monto de IPC</span>
                                        </div>
                                    </div>
                                </div>
                            </div><br>

                            @can('admin')
                                <div class="row text-center">
                                    <div class="form-group form-group">
                                      <div class="col-md-12">
                                        <button type="submit" style="margin:16px;" class="btn btn-raised btn-success">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;&nbsp;&nbsp;</button>
                                      </div>
                                    </div>
                                </div> 
                            @else
                                <div class="row text-center">
                                    <div class="form-group form-group">
                                      <div class="col-md-12">
                                        <a type="submit" style="margin:16px;" class="btn btn-raised btn-success disabled">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;&nbsp;&nbsp;</a>
                                      </div>
                                    </div>
                                </div> 
                            @endcan

                        </div>
                    </div>

                </div>

            {!! Form::close() !!}
            
            </div>

            

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
        pageLength: 8,
        ajax: '{!! route('getIpc') !!}',
        order: [0, "desc"],
        columns: [
            { data: 'gest', sWidth: '10%' },
            { data: 'mes',  "sClass": "text-center", sWidth: '45%', bSortable: false },
            { data: 'ipc', "sClass": "text-center", sWidth: '45%', bSortable: false }
        ]
    });
});
</script>
@endpush
