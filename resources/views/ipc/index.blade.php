@extends('layout')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-6">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-8">
                        <h3>Índice de Precios al Consumidor</h3>
                    </div>
                    <div class="col-md-4">
                        <p class="text-right">
                            {{-- <a href="{!! url('tasa/' . $ipcTasa->id . '/edit') !!}" class="btn btn-raised btn-success">Actualizar Aportes de {!! $date !!}</a> --}}
                        </p>
                    </div>
                </div> 
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Despliegue de Índice de Precios al Consumidor</h3>
                </div>
                <div class="panel-body">
                    <div class="row"><p>
                        <div class="col-md-12">
                            <table class="table table-striped table-hover" id="afiliados-table">
                                <thead>
                                    <tr class="success">
                                        <th>Año</th>
                                        <th>Mes</th>
                                        <th>IPC</th>
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
        ajax: '{!! route('getIpc') !!}',
        order: [[0, "desc"], [1, "desc"]],

        columns: [
            { data: 'anio', name: 'anio', sWidth: '15%' },
            { data: 'mes', name: 'mes', sWidth: '15%' },
            { data: 'ipc', name: 'ipc', sWidth: '15%' },
        ]
    });
});
</script>
@endpush
