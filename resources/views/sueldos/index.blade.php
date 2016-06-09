@extends('layout')

@section('content')
<div class="container-fluid">
    {!! Breadcrumbs::render('sueldos') !!}
    <div class="row">
        <div class="col-md-12">

            @can('admin')
                <div class="row">
                    <div class="col-md-12 text-right"> 
                        <div class="btn-group" style="margin:-6px 1px 12px;" data-toggle="tooltip" data-placement="top" data-original-title="Importar">
                            <a href="" data-target="#myModal-import" class="btn btn-raised btn-success dropdown-toggle" data-toggle="modal">
                                &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-import"></span>&nbsp;&nbsp;&nbsp;
                            </a>
                        </div>
                    </div>
                </div>
            @endcan

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Primer Nivel</h3>
                </div>
                <div class="panel-body">
                    <div class="row"><p>
                        <div class="col-md-12">
                            <table class="table table-striped table-hover" id="sueldoPri-table">
                                <thead>
                                    <tr class="success">
                                        <th>AÑO</th>    
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="00 00 - COMANDANTE GRAL">CMTE GRAL</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="00 01 - COMANDANTE GRAL">CMTE GRAL</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="00 02 - SUBCOMANDANTE">SBCMTE GRAL</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="00 03 - INSPECTOR GENERAL">INSP. GRAL.</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="00 04 - DIRECTOR GENERAL">DIR. GRAL.</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="01 01 - CORONEL CON SUELDO DE GENERAL">CNL.</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="01 02 - CORONEL">CNL.</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="01 03 - TENIENTE CORONEL">TCNL.</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="01 04 - MAYOR">MY.</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="01 05 - CAPITAN">CAP.</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="01 06 - TENIENTE">TTE.</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="01 07 - SUBTENIENTE">SBTTE.</div></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>                      
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Segundo Nivel</h3>
                </div>
                <div class="panel-body">
                    <div class="row"><p>
                        <div class="col-md-12">
                            <table class="table table-striped table-hover" id="sueldoSeg-table">
                                <thead>
                                    <tr class="success">
                                        <th>AÑO</th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="02 02 - CORONEL ADMINISTRATIVO">CNL. ADM.</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="02 03 - TENIENTE CORONEL ADMINISTRATIVO ">TCNL. ADM.</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="02 04 - MAYOR ADMINISTRATIVO">MY. ADM.</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="02 05 - CAPITAN ADMINISTRATIVO">CAP. ADM.</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="02 06 - TENIENTE ADMINISTRATIVO">TTE. ADM.</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="02 07 - SUBTENIENTE ADMINISTRATIVO">SBTTE. ADM.</div></th>  
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>                      
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Tercer Nivel</h3>
                </div>
                <div class="panel-body">
                    <div class="row"><p>
                        <div class="col-md-12">
                            <table class="table table-striped table-hover" id="sueldoTer-table">
                                <thead>
                                    <tr class="success">
                                        <th>AÑO</th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="03 08 - SUBOFICIAL SUPERIOR">SOF. SUP.</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="03 09 - SUBOFICIAL MAYOR ">SOF. MY.</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="03 010 - SUBOFICIAL PRIMERO">SOF. 1RO.</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="03 11 - SUBOFICIAL SEGUNDO">SOF. 2DO.</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="03 12 - SARGENTO PRIMERO">SGTO. 1RO.</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="03 13 - SARGENTO SEGUNDO">SGTO. 2DO.</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="03 14 - CABO">CBO.</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="03 15 - POLICIA">POL.</div></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Cuarto Nivel</h3>
                </div>
                <div class="panel-body">
                    <div class="row"><p>
                        <div class="col-md-12">
                            <table class="table table-striped table-hover" id="sueldoCua-table">
                                <thead>
                                    <tr class="success">
                                        <th>AÑO</th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="04 08 - SUBOFICIAL SUPERIOR ADMINISTRATIVO">SOF. SUP. ADM.</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="04 09 - SUBOFICIAL MAYOR ADMINISTRATIVO ">SOF. MY. ADM.</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="04 010 - SUBOFICIAL PRIMERO ADMINISTRATIVO">SOF. 1RO. ADM.</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="04 11 - SUBOFICIAL SEGUNDO ADMINISTRATIVO">SOF. 2DO. ADM.</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="04 12 - SARGENTO PRIMERO ADMINISTRATIVO">SGTO. 1RO. ADM.</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="04 13 - SARGENTO SEGUNDO ADMINISTRATIVO">SGTO. 2DO. ADM.</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="04 14 - CABO ADMINISTRATIVO">CBO.</div></th>
                                        <th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="04 16 - POLICIA ADMINISTRATIVO">POL.</div></th>
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

<div id="myModal-import" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content panel-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Importar Sueldos</h4>
            </div>
            <div class="modal-body">

                {!! Form::open(['method' => 'POST', 'route' => ['sueldo.store'], 'class' => 'form-horizontal', 'files' => true ]) !!}
                    <br>
                    <div class="row">
                        <div class="col-md-12">                         
                            <div class="form-group">
                                    {!! Form::label('archive', 'Sueldos', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    <input type="file" id="inputFile" name="archive">
                                    <input type="text" readonly="" class="form-control " placeholder="Seleccione Archivo en Formato Excel de sueldos...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">                         
                            <div class="form-group">
                                    {!! Form::label('gest', 'Mes y Año', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker" name="gest" value="">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row text-center">
                        <div class="form-group" style="padding-bottom:0px">
                            <div class="col-md-12">
                                <a href="{!! url('sueldo') !!}" data-target="#" class="btn btn-raised btn-warning">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;&nbsp;</a>
                                &nbsp;&nbsp;<button type="submit" class="btn btn-raised btn-primary">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;</button>
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

    $('.datepicker').datepicker({
        format: "mm/yyyy",
        viewMode: "months", 
        minViewMode: "months",
        language: "es",
        orientation: "bottom right",
        autoclose: true
    });

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip(); 
    });

    $(document).ready(function(){
        $('[data-toggle="popover"]').popover(); 
    });

    $(function() {
        $('#sueldoPri-table').DataTable({
            "dom": '<"top">t<"bottom"p>',
            processing: true,
            serverSide: true,
            lengthMenu: false,
            pageLength: 10,
            "scrollX": true,
            ajax: '{!! route('getSueldoPri') !!}',
            order: [[0, "desc"]],
            columns: [
                { data: 'gest', "sClass": "text-center", sWidth: '1%' },
                { data: 'c1', "sClass": "text-right", sWidth: '9%', bSortable: false },
                { data: 'c2', "sClass": "text-right", sWidth: '9%', bSortable: false },
                { data: 'c3', "sClass": "text-right", sWidth: '9%', bSortable: false },
                { data: 'c4', "sClass": "text-right", sWidth: '9%', bSortable: false },
                { data: 'c5', "sClass": "text-right", sWidth: '9%', bSortable: false },
                { data: 'c6', "sClass": "text-right", sWidth: '8%', bSortable: false },
                { data: 'c7', "sClass": "text-right", sWidth: '8%', bSortable: false },
                { data: 'c8', "sClass": "text-right", sWidth: '7%', bSortable: false },
                { data: 'c9', "sClass": "text-right", sWidth: '7%', bSortable: false },
                { data: 'c10', "sClass": "text-right", sWidth: '7%', bSortable: false },
                { data: 'c11', "sClass": "text-right", sWidth: '7%', bSortable: false },
                { data: 'c12', "sClass": "text-right", sWidth: '7%', bSortable: false }
            ]
        });

        $('#sueldoSeg-table').DataTable({
            "dom": '<"top">t<"bottom"p>',
            processing: true,
            serverSide: true,
            lengthMenu: false,
            pageLength: 10,
            "scrollX": true,
            ajax: '{!! route('getSueldoSeg') !!}',
            order: [[0, "desc"]],
            columns: [
                { data: 'gest', "sClass": "text-center", sWidth: '1%' },
                { data: 'c13', "sClass": "text-right", sWidth: '16%', bSortable: false },
                { data: 'c14', "sClass": "text-right", sWidth: '16%', bSortable: false },
                { data: 'c15', "sClass": "text-right", sWidth: '16%', bSortable: false },
                { data: 'c16', "sClass": "text-right", sWidth: '16%', bSortable: false },
                { data: 'c17', "sClass": "text-right", sWidth: '16%', bSortable: false },
                { data: 'c18', "sClass": "text-right", sWidth: '16%', bSortable: false }
            ]
        });

        $('#sueldoTer-table').DataTable({
            "dom": '<"top">t<"bottom"p>',
            processing: true,
            serverSide: true,
            lengthMenu: false,
            pageLength: 10,
            "scrollX": true,
            ajax: '{!! route('getSueldoTer') !!}',
            order: [[0, "desc"]],
            columns: [
                { data: 'gest', "sClass": "text-center", sWidth: '1%' },
                { data: 'c19', "sClass": "text-right", sWidth: '12%', bSortable: false },
                { data: 'c20', "sClass": "text-right", sWidth: '12%', bSortable: false },
                { data: 'c21', "sClass": "text-right", sWidth: '12%', bSortable: false },
                { data: 'c22', "sClass": "text-right", sWidth: '12%', bSortable: false },
                { data: 'c23', "sClass": "text-right", sWidth: '12%', bSortable: false },
                { data: 'c24', "sClass": "text-right", sWidth: '12%', bSortable: false },
                { data: 'c25', "sClass": "text-right", sWidth: '12%', bSortable: false },
                { data: 'c26', "sClass": "text-right", sWidth: '12%', bSortable: false }
            ]
        });

        $('#sueldoCua-table').DataTable({
            "dom": '<"top">t<"bottom"p>',
            processing: true,
            serverSide: true,
            lengthMenu: false,
            pageLength: 10,
            "scrollX": true,
            ajax: '{!! route('getSueldoCua') !!}',
            order: [[0, "desc"]],
            columns: [
                { data: 'gest', "sClass": "text-center", sWidth: '1%' },
                { data: 'c27', "sClass": "text-right", sWidth: '12%', bSortable: false },
                { data: 'c28', "sClass": "text-right", sWidth: '12%', bSortable: false },
                { data: 'c29', "sClass": "text-right", sWidth: '12%', bSortable: false },
                { data: 'c30', "sClass": "text-right", sWidth: '12%', bSortable: false },
                { data: 'c31', "sClass": "text-right", sWidth: '12%', bSortable: false },
                { data: 'c32', "sClass": "text-right", sWidth: '12%', bSortable: false },
                { data: 'c33', "sClass": "text-right", sWidth: '12%', bSortable: false },
                { data: 'c34', "sClass": "text-right", sWidth: '12%', bSortable: false }
            ]
        });
    });

</script>
@endpush


