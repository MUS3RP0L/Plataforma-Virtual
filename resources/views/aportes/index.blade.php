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
                            <table class="table table-striped table-hover" id="regapor-table">
                                <thead>
                                    <tr class="success">
                                        <th>.</th>
                                        <th>G</th>
                                        <th>E</th>
                                        <th>F</th>
                                        <th>M</th>
                                        <th>A</th>
                                        <th>M</th>
                                        <th>J</th>
                                        <th>J</th>
                                        <th>A</th>
                                        <th>S</th>
                                        <th>O</th>
                                        <th>N</th>
                                        <th>D</th>
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
            "scrollX": true,
            processing: true,
            serverSide: true,
            bFilter: false,
            "bSort": false,
            ajax: {
                url: '{!! route('getRegPago') !!}',
                data: function (d) {
                    d.id = {{ $afiliado->id }};
                }
            },

            columns: [
                { data: 'action', name: 'action' },
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
                

                
            ]
        });
    });
</script>
@endpush
