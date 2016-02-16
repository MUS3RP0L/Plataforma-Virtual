@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4 class="text-center">Gestión de Usuarios</h4></div>
                    <div class="panel-body">

					<table class="table table-bordered" id="users-table">

                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Teléfono</th>
                                <th>Tipo</th>
                                <th>Estado</th>
                                <th>Opción</th>
                            </tr>
                        </thead>
                    </table>
				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection

@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        "paging": false,
        "ordering": false,
        "info": false,

        ajax: '{!! route('getUsuario') !!}',

        columns: [
            { data: 'name', name: 'name', sWidth: '30%' },
            { data: 'tel', name: 'tel', sWidth: '20%' },
            { data: 'role', name: 'role', sWidth: '14%' },
            { data: 'status', name: 'status', sWidth: '14%' },
            { data: 'action', name: 'action', sWidth: '22%', orderable: false, searchable: false, bSortable: false, sClass: 'center' }
        ]
    });
});
</script>
@endpush
