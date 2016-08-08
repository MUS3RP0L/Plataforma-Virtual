@extends('layout')

@section('content')
<div class="container-fluid">
    {!! Breadcrumbs::render('show_voucher', $affiliate) !!}
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{!! url('direct_contribution') !!}" style="margin:-6px 1px 12px;" class="btn btn-raised btn-warning" data-toggle="tooltip" data-placement="top" data-original-title="Atrás">
                &nbsp;&nbsp;<span class="glyphicon glyphicon-share-alt"></span>&nbsp;&nbsp;
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> Información de Afiliado</h3>
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
                                            <div class="col-md-6">Grado</div>
                                            <div class="col-md-6" data-toggle="tooltip" data-placement="bottom" data-original-title="{!! $affiliate->degree->name !!}">
                                                {!! $affiliate->degree->shortened !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                        <div class="row">
                                            <div class="col-md-6">Estado</div>
                                            <div class="col-md-6" data-toggle="tooltip" data-placement="bottom" data-original-title="{!! $affiliate->affiliate_state->state_type->name !!}">
                                                {!! $affiliate->affiliate_state->name !!}
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
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> Información de Aporte</h3>
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
                                            <div class="col-md-6">
                                                Gestión
                                            </div>
                                            <div class="col-md-6">
                                                 {{-- {!! $year !!} --}}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                Tipo Aporte
                                            </div>
                                            <div class="col-md-6">
                                                {{-- {!! $type !!} --}}
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

@endsection

@push('scripts')
<script>

</script>
@endpush
