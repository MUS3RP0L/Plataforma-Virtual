@extends('layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			<div class="panel panel-default">
				<div class="panel-heading">Despliegue Afiliados</div>
				<div class="panel-body">
					
					<table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Carnet</th>
                <th>Paterno</th>
                <th>Materno</th>
                <th>Nombre</th>
                <th>Matrícula</th>

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
        ajax: '{!! route('getAfiliado') !!}',
        columns: [
            { data: 'ci', name: 'ci' },
            { data: 'pat', name: 'pat' },
            { data: 'mat', name: 'mat' },
            { data: 'nom', name: 'nom' },
            { data: 'matri', name: 'matri' }
        ]
    });
});
</script>
@endpush
