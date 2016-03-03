@extends('layout')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="panel-heading">
                <h4 ><b>Tasas</b></h4>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Despliegue de Tasas</h3>
                </div>
                <div class="panel-body">
                    <div class="row"><p>
                        <div class="col-md-12">
                            <table class="table table-striped table-hover" id="afiliados-table">
                                <thead>
                                    <tr class="success">
                                        <th>Mes- Año</th>
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
        columns: [
            { data: 'anio', name: 'anio', sWidth: '30%' },
            { data: 'apor', name: 'apor', sWidth: '30%' }
        ]
    });
});
</script>
@endpush
