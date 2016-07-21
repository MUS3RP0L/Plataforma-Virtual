@extends('layout')

@section('content')
<div class="container-fluid">
    {!! Breadcrumbs::render('show_direct_contributions') !!}
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Despliegue</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-hover" id="aportes_pago-table">
                                <thead>
                                    <tr class="success">
                                        <th>Número</th>
                                        <th>Nombre de Afiliado</th>
                                        {{-- <th>Número de Pago</th>
                                        <th>Fecha Emisión</th>
                                        <th>Estado</th>
                                        <th>Total Aporte</th>
                                        <th>Acción</th> --}}
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
$(function() {
    $('#aportes_pago-table').DataTable({
        dom: '<"top">t<"bottom"p>',
        processing: true,
        serverSide: true,
        pageLength: 10,
        ajax: '{!! route('get_contribution_payment') !!}',
        order: [0, "desc"],
        columns: [
            { data: 'code' },
            { data: 'affiliate_name', bSortable: false },
            // { data: 'fecha_emision', bSortable: false },
            // { data: 'status', bSortable: false },
            // { data: 'total_aporte', bSortable: false },
            // { data: 'action', name: 'action', orderable: false, searchable: false, bSortable: false, sClass: "text-center" }
        ]
    });
});
</script>
@endpush
