@extends('layout')

@section('content')
<div class="container-fluid">
    {!! Breadcrumbs::render('register_contribution', $affiliate) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 text-right">
                    <a href="{!! url('affiliate/' . $affiliate->id) !!}" style="margin:-6px 1px 12px;" class="btn btn-raised btn-warning" data-toggle="tooltip" data-placement="top" data-original-title="Atrás">&nbsp;<span class="glyphicon glyphicon-share-alt"></span>&nbsp;</a>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> Despliegue de Aportes por Gestión</h3>
                </div>
                <div class="panel-body">
                    <div class="row"><p>
                        <div class="col-md-12">
                            <table class="table table-striped table-hover" id="regapor-table">
                                <thead>
                                    <tr class="success">
                                        <th>Gestión</th>
                                        <th>Enero</th>
                                        <th>Febrero</th>
                                        <th>Marzo</th>
                                        <th>Abril</th>
                                        <th>Mayo</th>
                                        <th>Junio</th>
                                        <th>Julio</th>
                                        <th>Agosto</th>
                                        <th>Septiembre</th>
                                        <th>Octubre</th>
                                        <th>Noviembre</th>
                                        <th>Diciembre</th>
                                        <th>Acción</th>
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
        $('#regapor-table').DataTable({
            "dom": '<"top">t<"bottom"p>',
            "order": [[ 0, "desc" ]],
            processing: true,
            serverSide: true,
            bFilter: false,
            pageLength: 8,
            ajax: {
                url: '{!! route('get_select_contribution') !!}',
                data: function (d) {
                    d.affiliate_id = {{ $affiliate->id }};
                }
            },
            columns: [
                { data: 'year'},
                { data: 'm1', "sClass": "text-center", bSortable: false },
                { data: 'm2', "sClass": "text-center", bSortable: false },
                { data: 'm3', "sClass": "text-center", bSortable: false },
                { data: 'm4', "sClass": "text-center", bSortable: false },
                { data: 'm5', "sClass": "text-center", bSortable: false },
                { data: 'm6', "sClass": "text-center", bSortable: false },
                { data: 'm7', "sClass": "text-center", bSortable: false },
                { data: 'm8', "sClass": "text-center", bSortable: false },
                { data: 'm9', "sClass": "text-center", bSortable: false },
                { data: 'm10', "sClass": "text-center", bSortable: false },
                { data: 'm11', "sClass": "text-center", bSortable: false },
                { data: 'm12', "sClass": "text-center", bSortable: false },
                { data: 'action', "sClass": "text-center", bSortable: false }
            ]
        });
    });
</script>
@endpush
