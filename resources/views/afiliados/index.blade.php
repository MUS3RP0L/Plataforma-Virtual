@extends('layout')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="panel-heading">
                <h4 ><b>Afiliados</b></h4>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Despliegue de Afiliados</h3>
                </div>
                <div class="panel-body">
                    <div class="row"><p>
                        <div class="col-md-12">
                            <table class="table table-striped table-hover" id="afiliados-table">
                                <thead>
                                    <tr class="success">
                                        <th>Carnet Identidad</th>
                                        <th>Nivel - Grado</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Nombres</th>
                                        <th>Matrícula</th>
                                        <th>Opciones</th>
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
        ajax: '{!! route('getAfiliado') !!}',
        columns: [
            { data: 'ci', name: 'ci', sWidth: '10%' },
            { data: 'niv', name: 'niv', sWidth: '10%' },
            { data: 'pat', name: 'pat', sWidth: '15%' },
            { data: 'mat', name: 'mat', sWidth: '15%' },
            { data: 'mons', name: 'mons', sWidth: '15%' },
            { data: 'matri', name: 'matri', sWidth: '10%' },
            { data: 'action', name: 'action', sWidth: '10%', orderable: false, searchable: false, bSortable: false, sClass: 'center' }
        ]
    });
});
</script>
@endpush
