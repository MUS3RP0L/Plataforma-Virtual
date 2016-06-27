@extends('layout')

@section('content')
<div class="container-fluid">
    {!! Breadcrumbs::render('tasas_aporte') !!}
    <div class="row">
        <div class="col-md-12">
            
            @can('admin')
                <div class="row">
                    <div class="col-md-12 text-right"> 
                        <div class="btn-group" style="margin:-6px 1px 12px;" data-toggle="tooltip" data-placement="top" data-original-title="Modificar">
                            <a href="" data-target="#myModal-edit" class="btn btn-raised btn-success dropdown-toggle" data-toggle="modal">
                                &nbsp;&nbsp;<span class="glyphicon glyphicon-wrench"></span>&nbsp;&nbsp;
                            </a>
                        </div>
                    </div>
                </div>
            @endcan

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Despliegue</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-striped table-hover" id="tasas-table">
                                        <thead>
                                            <tr class="success">
                                                <th rowspan="2">Año</th>
                                                <th rowspan="2">Mes</th>
                                                <th style="text-align:center;" colspan="3">Sector Activo</th>
                                                <th style="text-align:center;" colspan="4">Sector Pasivo</th>
                                            </tr>
                                            <tr class="success">
                                                <th>Aporte Muserpol</th>
                                                <th>Fondo de Retiro</th>
                                                <th>Seguro de Vida</th>
                                                <th>Aporte Muserpol</th>
                                                <th>Auxilio Mortuorio</th>
                                            </tr>
                                        </thead>
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


<div id="myModal-edit" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content panel-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Editar Tasas de Aporte - {!! $gest !!}</h4>
            </div>
            <div class="modal-body">

                {!! Form::model($aporTasaLast, ['method' => 'PATCH', 'route' => ['tasa.update', $aporTasaLast->id], 'class' => 'form-horizontal']) !!}

                <div class="row">           
                    <div class="col-md-6">
                        <h3 class="panel-title">Sector Activo</h3>
                        <div class="form-group">
                                {!! Form::label('apor_fr_a', 'Fondo de Retiro', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('apor_fr_a', $aporTasaLast->apor_fr_a, ['class'=> 'form-control', 'required' => 'required']) !!}
                                <span class="help-block">Nuevo Aporte de Fondo de Retiro</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('apor_sv_a', 'Seguro de Vida', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('apor_sv_a', $aporTasaLast->apor_sv_a, ['class'=> 'form-control', 'required' => 'required']) !!}
                                <span class="help-block">Nuevo Aporte de Seguro de Vida</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h3 class="panel-title">Sector Pasivo</h3>                            
                        <div class="form-group">
                                {!! Form::label('apor_am_p', 'Auxilio Mortuorio', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('apor_am_p', $aporTasaLast->apor_am_p, ['class'=> 'form-control', 'required' => 'required']) !!}
                                <span class="help-block">Nuevo Aporte de Seguro de Vida</span>
                            </div>
                        </div>

                    </div>
                </div>
            
                <div class="row text-center">
                    <div class="form-group" style="padding-bottom:0px">
                        <div class="col-md-12">
                            <a href="{!! url('tasa') !!}" data-target="#" class="btn btn-raised btn-warning">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;&nbsp;</a>
                            &nbsp;&nbsp;<button type="submit" class="btn btn-raised btn-success">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;</button>
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
$(function() {
    $('#tasas-table').DataTable({
        dom: '<"top">t<"bottom"p>',
        processing: true,
        serverSide: true,
        pageLength: 10,
        ajax: '{!! route('getTasa') !!}',
        order: [0, "desc"],
        columns: [
            { data: 'gest' },
            { data: 'mes', bSortable: false },
            { data: 'apor_a', sClass: "text-center", bSortable: false },
            { data: 'apor_fr_a', sClass: "text-center", bSortable: false },
            { data: 'apor_sv_a', sClass: "text-center", bSortable: false },
            { data: 'apor_p', sClass: "text-center", bSortable: false },
            { data: 'apor_am_p', sClass: "text-center", bSortable: false },
        ]
    });
});
</script>
@endpush
