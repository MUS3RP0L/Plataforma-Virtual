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
                    <iframe src="{!! url('print_aportepago/' . $aportePago->id) !!}" width="99%" height="1200"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>

</script>
@endpush
