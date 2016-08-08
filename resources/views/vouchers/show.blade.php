@extends('layout')

@section('content')
<div class="container-fluid">
    {!! Breadcrumbs::render('show_voucher', $affiliate) !!}
    <div class="row">
        <div class="col-md-4 col-md-offset-6">
            <div class="btn-group" style="margin:-6px 1px 12px;" data-toggle="tooltip" data-placement="top" data-original-title="Cobrar">
                <a href="" data-target="#myModal-update" class="btn btn-raised btn-success dropdown-toggle enabled" data-toggle="modal">
                    &nbsp;<span class="glyphicon glyphicon-usd"></span>&nbsp;
                </a>
            </div>
        </div>
        <div class="col-md-2 text-right">
            <a href="{!! url('direct_contribution') !!}" style="margin:-6px 1px 12px;" class="btn btn-raised btn-warning" data-toggle="tooltip" data-placement="top" data-original-title="Atrás">&nbsp;<span class="glyphicon glyphicon-share-alt"></span>&nbsp;</a>
        </div>
    </div>

    <div class="row">

        @include('affiliates.simple_info')

        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> Información de Cobro</h3>
                        </div>
                    </div>
                </div>
                <div class="panel-body" style="font-size: 14px">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-responsive" style="width:100%;">
                                <tr>
                                    <td style="border-top:1px solid #d4e4cd;">
                                        <div class="row">
                                            <div class="col-md-5">
                                                Concepto
                                            </div>
                                            <div class="col-md-7">
                                                {!! $voucher->voucher_type->name !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                        <div class="row">
                                            <div class="col-md-5">
                                                Total Bs
                                            </div>
                                            <div class="col-md-7    ">
                                                {!! $voucher->total !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-responsive" style="width:100%;">
                                <tr>
                                    <td style="border-top:1px solid #d4e4cd;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                Fecha Emisión
                                            </div>
                                            <div class="col-md-6">
                                                {!! $voucher->getCreationDate() !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                        <div class="row">
                                            <div class="col-md-6">
                                            Fecha de Pago
                                            </div>
                                            <div class="col-md-6">
                                                @if($voucher->payment_date)
                                                    {!! $voucher->payment_date !!}
                                                @else
                                                    -
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Despliegue</h3>
                </div>
                <div class="panel-body">
                    <iframe src="{!! url('print_voucher/' . $voucher->id) !!}" width="99%" height="1200"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="myModal-update" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Actualizar</h4>
            </div>
            <div class="modal-body">

                {!! Form::open(['url' => 'calculation_contribution', 'role' => 'form', 'class' => 'form-horizontal']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('base_wage', 'Haber Básico', ['class' => 'col-md-5 control-label']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('base_wage', '', ['class'=> 'form-control', 'required']) !!}
                                    <span class="help-block">Escriba el Haber Básico</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-raised btn-success" data-toggle="tooltip" data-placement="bottom" data-original-title="Guardar">&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>&nbsp;</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>

</script>
@endpush
