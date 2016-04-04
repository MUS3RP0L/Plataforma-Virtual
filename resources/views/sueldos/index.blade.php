@extends('layout')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-8">
                        <h3>SUELDOS DE PERSONAL DE LA POLICIA NACIONAL</h3>
                    </div>
                    <div class="col-md-4">
                        <p class="text-right">
                            <a href="{!! url('sueldo/create') !!}" class="btn btn-raised btn-success">Importar Sueldos de {!! $date !!}</a>
                        </p>
                    </div>
                </div> 
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">GENERALES, JEFES Y OFICIALES DE PRIMER NIVEL</h3>
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
                    <h3 class="panel-title">JEFES Y OFICIALES ADMINISTRATIVOS SEGUNDO NIVEL</h3>
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
                    <h3 class="panel-title">SUBOFICIALES, CLASES Y POLICIAS DE LINEA TERCER NIVEL</h3>
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
                    <h3 class="panel-title">SUBOFICIALES, CLASES Y POLICIAS ADMINISTRATIVOS CUARTO NIVEL</h3>
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
@endsection

@push('scripts')
<script>

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
            { data: 'gest', name: 'gest', "sClass": "text-center", sWidth: '4%' },
            { data: 'c1', name: 'c1', "sClass": "text-right", sWidth: '10%', bSortable: false },
            { data: 'c2', name: 'c2', "sClass": "text-right", sWidth: '10%', bSortable: false },
            { data: 'c3', name: 'c3', "sClass": "text-right", sWidth: '11%', bSortable: false },
            { data: 'c4', name: 'c4', "sClass": "text-right", sWidth: '10%', bSortable: false },
            { data: 'c5', name: 'c5', "sClass": "text-right", sWidth: '10%', bSortable: false },
            { data: 'c6', name: 'c6', "sClass": "text-right", sWidth: '6%', bSortable: false },
            { data: 'c7', name: 'c7', "sClass": "text-right", sWidth: '6%', bSortable: false },
            { data: 'c8', name: 'c8', "sClass": "text-right", sWidth: '6%', bSortable: false },
            { data: 'c9', name: 'c9', "sClass": "text-right", sWidth: '6%', bSortable: false },
            { data: 'c10', name: 'c10', "sClass": "text-right", sWidth: '7%', bSortable: false },
            { data: 'c11', name: 'c11', "sClass": "text-right", sWidth: '7%', bSortable: false },
            { data: 'c12', name: 'c12', "sClass": "text-right", sWidth: '7%', bSortable: false }
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
            { data: 'gest', name: 'gest', "sClass": "text-center" },
            { data: 'c13', name: 'c13', "sClass": "text-right", sWidth: '16%', bSortable: false },
            { data: 'c14', name: 'c14', "sClass": "text-right", sWidth: '16%', bSortable: false },
            { data: 'c15', name: 'c15', "sClass": "text-right", sWidth: '16%', bSortable: false },
            { data: 'c16', name: 'c16', "sClass": "text-right", sWidth: '16%', bSortable: false },
            { data: 'c17', name: 'c17', "sClass": "text-right", sWidth: '16%', bSortable: false },
            { data: 'c18', name: 'c18', "sClass": "text-right", sWidth: '16%', bSortable: false }
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
            { data: 'gest', name: 'gest', "sClass": "text-center" },
            { data: 'c19', name: 'c19', "sClass": "text-right", sWidth: '12%', bSortable: false },
            { data: 'c20', name: 'c20', "sClass": "text-right", sWidth: '12%', bSortable: false },
            { data: 'c21', name: 'c21', "sClass": "text-right", sWidth: '12%', bSortable: false },
            { data: 'c22', name: 'c22', "sClass": "text-right", sWidth: '12%', bSortable: false },
            { data: 'c23', name: 'c23', "sClass": "text-right", sWidth: '12%', bSortable: false },
            { data: 'c24', name: 'c24', "sClass": "text-right", sWidth: '12%', bSortable: false },
            { data: 'c25', name: 'c25', "sClass": "text-right", sWidth: '12%', bSortable: false },
            { data: 'c26', name: 'c26', "sClass": "text-right", sWidth: '12%', bSortable: false }
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
            { data: 'gest', name: 'gest', "sClass": "text-center" },
            { data: 'c27', name: 'c27', "sClass": "text-right", sWidth: '12%', bSortable: false },
            { data: 'c28', name: 'c28', "sClass": "text-right", sWidth: '12%', bSortable: false },
            { data: 'c29', name: 'c29', "sClass": "text-right", sWidth: '12%', bSortable: false },
            { data: 'c30', name: 'c30', "sClass": "text-right", sWidth: '12%', bSortable: false },
            { data: 'c31', name: 'c31', "sClass": "text-right", sWidth: '12%', bSortable: false },
            { data: 'c32', name: 'c32', "sClass": "text-right", sWidth: '12%', bSortable: false },
            { data: 'c33', name: 'c33', "sClass": "text-right", sWidth: '12%', bSortable: false },
            { data: 'c34', name: 'c34', "sClass": "text-right", sWidth: '12%', bSortable: false }
        ]
    });
});
</script>
@endpush
