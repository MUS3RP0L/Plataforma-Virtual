@extends('layout')

@section('content')
<div class="container-fluid">
    {!! Breadcrumbs::render('usuario') !!}
    <div class="row">
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-12 text-right">  
                    <a href="{!! url('usuario/create') !!}"  style="margin:-6px 1px 12px;" class="btn btn-raised btn-success">Nuevo&nbsp;&nbsp;<span class="glyphicon glyphicon-plus"></span></a>
                </div>
            </div> 

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Listado</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">

        					<table  class="table table-striped table-hover" id="users-table">

                                <thead>
                                    <tr class="success">
                                        <th>Usuario</th>
                                        <th>Nombre</th>
                                        <th>Teléfono</th>
                                        <th>Tipo</th>
                                        <th>Estado</th>
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
@endsection


@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        "dom": '<"top">t<"bottom"ip>',   
        processing: true,
        serverSide: true,
        pageLength: 10,
        ajax: '{!! route('getUsuario') !!}',

        columns: [
            { data: 'username', name: 'username', sWidth: '20%' },
            { data: 'name', name: 'name', sWidth: '20%', bSortable: false },
            { data: 'tel', name: 'tel', sWidth: '10%', bSortable: false },
            { data: 'role', name: 'role', sWidth: '15%', bSortable: false },
            { data: 'status', name: 'status', sWidth: '10%', bSortable: false },
            { data: 'action', name: 'action', sWidth: '20%', orderable: false, searchable: false, bSortable: false, sClass: 'center' }
        ]
    });
});
</script>
@endpush
