@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

            <div class="panel-heading">
                <h3>
                    <div class="row">
                        <div class="col-md-8">
                            Gestión de usuarios
                        </div>
                        <div class="col-md-4">
                                <p class="text-right">
                                    <a href="{!! url('usuario/create') !!}" class="btn btn-raised btn-success">Crear Usuario</a>
                                </p>
                        </div>
                    </div>
                </h3>
            </div>
            <div class="panel panel-default">
                    <div class="panel-body">

					<table  class="table table-striped table-hover" id="users-table">

                        <thead>
                            <tr class="success">
                                <th>Usuario</th>
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
        "info": false,

        ajax: '{!! route('getUsuario') !!}',

        columns: [
            { data: 'username', name: 'username', sWidth: '20%' },
            { data: 'name', name: 'name', sWidth: '25%' },
            { data: 'tel', name: 'tel', sWidth: '10%' },
            { data: 'role', name: 'role', sWidth: '10%' },
            { data: 'status', name: 'status', sWidth: '8%' },
            { data: 'action', name: 'action', sWidth: '20%', orderable: false, searchable: false, bSortable: false, sClass: 'center' }
        ]
    });
});
</script>
@endpush
