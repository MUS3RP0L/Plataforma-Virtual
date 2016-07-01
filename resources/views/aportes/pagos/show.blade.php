@extends('layout')

@section('content')
<div class="container-fluid">
    {!! Breadcrumbs::render('show_aportes_pago', $afiliado) !!}
    <div class="row">  
        <div class="col-md-12 text-right"> 
            <a href="{!! url('aportepago/') !!}" style="margin:-6px 1px 12px;" class="btn btn-raised btn-warning" data-toggle="tooltip" data-placement="top" data-original-title="Atrás">
                &nbsp;&nbsp;<span class="glyphicon glyphicon-share-alt"></span>&nbsp;&nbsp;
            </a>
        </div>
    </div>
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
