@extends('layout')

@section('content')
<div class="container-fluid">
    {!! Breadcrumbs::render('contribution_rates') !!}
    <div class="row">
        <div class="col-md-12">
            
            @can('manage')
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
                <h4 class="modal-title">Editar Tasas de Aporte - {!! $month_year !!}</h4>
            </div>
            <div class="modal-body">

                {!! Form::model($last_contribution_rate, ['method' => 'PATCH', 'route' => ['contribution_rate.update', $last_contribution_rate->id], 'class' => 'form-horizontal']) !!}

                <div class="row">           
                    <div class="col-md-6">
                        <h3 class="panel-title">Sector Activo</h3>
                        <div class="form-group">
                                {!! Form::label('retirement_fund', 'Fondo de Retiro', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('retirement_fund', $last_contribution_rate->retirement_fund, ['class'=> 'form-control', 'required' => 'required']) !!}
                                <span class="help-block">Nuevo Aporte de Fondo de Retiro</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('life_insurance', 'Seguro de Vida', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('life_insurance', $last_contribution_rate->life_insurance, ['class'=> 'form-control', 'required' => 'required']) !!}
                                <span class="help-block">Nuevo Aporte de Seguro de Vida</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h3 class="panel-title">Sector Pasivo</h3>                            
                        <div class="form-group">
                                {!! Form::label('rate_passive', 'Auxilio Mortuorio', ['class' => 'col-md-5 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('rate_passive', $last_contribution_rate->rate_passive, ['class'=> 'form-control', 'required' => 'required']) !!}
                                <span class="help-block">Nuevo Aporte de Seguro de Vida</span>
                            </div>
                        </div>

                    </div>
                </div>
            
                <div class="row text-center">
                    <div class="form-group" style="padding-bottom:0px">
                        <div class="col-md-12">
                            <a href="{!! url('contribution_rate') !!}" data-target="#" class="btn btn-raised btn-warning">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;&nbsp;</a>
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
            ajax: '{!! route('getContributionRate') !!}',
            order: [0, "desc"],
            columns: [
                { data: 'year', name: 'month_year' },
                { data: 'month', bSortable: false },
                { data: 'rate_active', sClass: "text-center", bSortable: false },
                { data: 'retirement_fund', sClass: "text-center", bSortable: false },
                { data: 'life_insurance', sClass: "text-center", bSortable: false },
                { data: 'rate_passive', sClass: "text-center", bSortable: false },
                { data: 'mortuary_aid', sClass: "text-center", bSortable: false },
            ]
        });
    });

</script>
@endpush
