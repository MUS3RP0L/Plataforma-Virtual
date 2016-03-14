@extends('layout')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="panel-heading">
                <div class="row">  
                    <div class="col-md-8">
                        <h3>{!! $afiliado->pat !!} {!! $afiliado->mat !!}  {!! $afiliado->nom !!} {!! $afiliado->nom2 !!} {!! $afiliado->ap_esp !!}</h3>
                        <h4><b>{!! $afiliado->grado->lit !!}</b></h4>
                    </div>
                    <div class="col-md-4 text-right"> 
                        {!! link_to(URL::previous(), 'volver', ['class' => 'btn btn-raised btn-warning']) !!}
                    </div>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Despliegue de Aportes por Gestión</h3>
                </div>
                <div class="panel-body">
                    <div class="row"><p>
                        <div class="col-md-12">
                            <table class="table table-striped table-hover" id="regapor-table">
                                <thead>
                                    <tr class="success">
                                        <th>Gestión</th>
                                        <th>Enero</th>
                                        <th>Febrero</th>
                                        <th>Marzo</th>
                                        <th>Abril</th>
                                        <th>Mayo</th>
                                        <th>Junio</th>
                                        <th>Julio</th>
                                        <th>Agosto</th>
                                        <th>Septiembre</th>
                                        <th>Octubre</th>
                                        <th>Noviembre</th>
                                        <th>Diciembre</th>
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
        $('#regapor-table').DataTable({
            "dom": '<"top"l>t<"bottom"ip>',
            "order": [[ 0, "asc" ]],
            // "scrollX": true,
            processing: true,
            serverSide: true,
            bFilter: false,
            ajax: {
                url: '{!! route('getRegPago') !!}',
                data: function (d) {
                    d.id = {{ $afid }};
                }
            },

            columns: [
               
                { data: 'year', name: 'year' },
                { data: 'm1', name: 'm1' },
                { data: 'm2', name: 'm2' },
                { data: 'm3', name: 'm3' },
                { data: 'm4', name: 'm4' },
                { data: 'm5', name: 'm5' },
                { data: 'm6', name: 'm6' },
                { data: 'm7', name: 'm7' },
                { data: 'm8', name: 'm8' },
                { data: 'm9', name: 'm9' },
                { data: 'm10', name: 'm10' },
                { data: 'm11', name: 'm11' },
                { data: 'm12', name: 'm12' },
                { data: 'action', name: 'action' }
                         
            ]
        });
    });
</script>
@endpush
