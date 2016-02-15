@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><h4 class="text-center">Despliegue de Usuarios</h4></div>
                    <div class="panel-body">
					
					<table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
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
        processing: true,
        serverSide: true,
        ajax: '{!! route('getUsuario') !!}',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>
@endpush
