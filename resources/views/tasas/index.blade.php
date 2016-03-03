@extends('layout')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="panel-heading">
                <h4 ><b>Tasas de Aporte</b></h4>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Despliegue de Tasas de Aporte</h3>
                </div>
                <div class="panel-body">
                    <div class="row"><p>
                        <div class="col-md-12">
                            <table class="table table-striped table-hover" id="afiliados-table">
                                <thead>

                                    <tr class="success">
                                        <th rowspan="2">Año</th>
                                        <th rowspan="2">Mes</th>
                                        <th colspan="3">Sector Activo</th>
                                        <th colspan="4">Sector Pasivo</th>
                                    </tr>
                                    <tr class="success">
                                        <th>Porcentaje de Aporte</th>
                                        <th>Porcentaje de Aporte</th>
                                        <th>Porcentaje de Aporte</th>
                                        <th>Porcentaje de Aporte</th>
                                        <th>Porcentaje de Aporte</th>
                                        <th>Porcentaje de Aporte</th>
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
    $('#afiliados-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('getTasa') !!}',
        "order": [[ 0, "desc" ]],
        columns: [
            { data: 'anio', name: 'anio', sWidth: '5%' },
            { data: 'mes', name: 'mes', sWidth: '5%' },
            { data: 'apor_a', name: 'apor_a', sWidth: '15%' },
            { data: 'apor_fr_a', name: 'apor_fr_a', sWidth: '15%' },
            { data: 'apor_sv_a', name: 'apor_sv_a', sWidth: '15%' },
            { data: 'apor_p', name: 'apor_p', sWidth: '15%' },
            { data: 'apor_fr_p', name: 'apor_fr_p', sWidth: '15%' },
            { data: 'apor_sv_p', name: 'apor_sv_p', sWidth: '15%' },
        ]
    });
});
</script>
@endpush
