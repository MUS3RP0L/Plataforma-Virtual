@extends('layout')

@section('content')
<div class="container-fluid">
    {!! Breadcrumbs::render('aportes_pago') !!}
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Despliegue</h3>
                </div>
                <div class="panel-body"> 
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-hover" id="aportes_pago-table">
                                <thead>
                                    <tr class="success">
                                        <th>Número</th>
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
    $('#aportes_pago-table').DataTable({
        dom: '<"top">t<"bottom"p>',
        processing: true,
        serverSide: true,
        pageLength: 10,
        ajax: '{!! route('getAportePago') !!}',
        order: [0, "desc"],
        columns: [
            { data: 'id' },
        ]
    });
});
</script>
@endpush
