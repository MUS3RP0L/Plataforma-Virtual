@extends('layout')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="panel-heading">
                <h4 ><b>Afiliados</b></h4>
            </div>
        
        <form method="POST" id="search-form" class="form-inline" role="form">
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

            <div class="form-group">
                <label for="name">APELLIDO PATERNO</label>
                <input class="form-control" name="name" id="name" placeholder="paterno" type="text">
            </div>

            <button type="submit" class="btn btn-primary">buscar</button>
        </form>



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
                                        <th>Matrícula</th>
                                        <th>Estado</th>
                                        <th>Núm. Carnet</th>
                                        {{-- <th>Grado</th> --}}
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Nombres</th>     
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

        var oTable = $('#afiliados-table').DataTable({
        // $('#afiliados-table').DataTable({
        "dom": '<"top"l>t<"bottom"ip>',   
        processing: true,
        serverSide: true,
        ajax: {
            url: '{!! route('getAfiliado') !!}',
            data: function (d) {
                d.name = $('input[name=name]').val();
                d.post = $('input[name=post]').val();
            }
        },
        columns: [
            { data: 'matri', name: 'matri', sWidth: '8%' },
            { data: 'est', name: 'est', sWidth: '8%' },
            { data: 'ci', name: 'ci', sWidth: '10%' },
            // { data: 'gra', name: 'gra', sWidth: '10%' },
            { data: 'pat', name: 'pat', sWidth: '15%' },
            { data: 'mat', name: 'mat', sWidth: '15%' },
            { data: 'mons', name: 'mons', sWidth: '15%' },
            
            { data: 'action', name: 'action', sWidth: '10%', orderable: false, searchable: false, bSortable: false, sClass: 'center' }
        ]
    });

    $('#search-form').on('submit', function(e) {
        oTable.draw();
        e.preventDefault();
    });

</script>
@endpush
