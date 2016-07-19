@extends('layout')
@section('content')
<div class="container-fluid">
    {!! Breadcrumbs::render('register_contribution', $affiliate) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 col-md-offset-6">
                    <div class="btn-group" style="margin:-6px 1px 12px;" data-toggle="tooltip" data-placement="top" data-original-title="Actualizar">
                        <a href="" data-target="#myModal-update" class="btn btn-raised btn-success dropdown-toggle enabled" data-toggle="modal">
                            &nbsp;<span class="glyphicon glyphicon-refresh"></span>&nbsp;
                        </a>
                    </div>
                </div>
                <div class="col-md-2 text-right"> 
                    <a href="{!! url('select_contribution/' . $affiliate->id) !!}" style="margin:-6px 1px 12px;" class="btn btn-raised btn-warning" data-toggle="tooltip" data-placement="top" data-original-title="Atrás">&nbsp;<span class="glyphicon glyphicon-share-alt"></span>&nbsp;</a>
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
                                                    <div class="col-md-6">
                                                        Carnet Identidad
                                                    </div>
                                                    <div class="col-md-6">
                                                         {!! $affiliate->identity_card !!} {!! $affiliate->city_identity_card !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Grado
                                                    </div>
                                                    <div class="col-md-6" data-toggle="tooltip" data-placement="bottom" data-original-title="{!! $affiliate->degree->name !!}"> {!! $affiliate->degree->shortened !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table" style="width:100%;">
                                        <tr>
                                            <td style="border-top:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Núm. de Matrícula
                                                    </div>
                                                    <div class="col-md-6">
                                                        {!! $affiliate->registration !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Estado
                                                    </div>
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
                                                         {!! $year !!}
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
                                                        {!! $type !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table" style="width:100%;">
                                        <tr>
                                            <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        Último Aporte
                                                    </div>
                                                    <div class="col-md-6">
                                                        {!! $last_contribution->date !!}
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
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">  
                        <div class="col-md-12">
                            <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> Cálculo de Aportes</h3>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    {!! Form::open(['method' => 'POST', 'route' => ['contribution.store'], 'class' => 'form-horizontal']) !!}
                        <input type="hidden" name="afid" value="{{ $affiliate->id }}"/>
                        <input type="hidden" name="gestid" value="{{ $year }}"/>
                        <input type="hidden" name="type" value="{{ $type }}"/>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="success">
                                            <th style="text-align: center" width="6%"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Mes">Mes</div></th>
                                            <th style="text-align: center" width="6%"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Haber Básico">H. Básico</div></th>
                                            <th style="text-align: center" width="6%"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Categoría">Categoría</div></th>
                                            <th style="text-align: center" width="5%"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Antigüedad">Antigüed</div></th>
                                            <th style="text-align: center" width="6%"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Bono Estudio">B Estud</div></th>
                                            <th style="text-align: center" width="6%"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Bono al Cargo">B Cargo</div></th>
                                            <th style="text-align: center" width="6%"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Bono Frontera">B Front</div></th>
                                            <th style="text-align: center" width="6%"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Bono Oriente">B Orien</div></th>
                                            <th style="text-align: right" width="9%"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Cotizable">Cotizable</div></th>
                                            <th style="text-align: right" width="7%"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="% Fondo de Retiro">F.R.</div></th>
                                            <th style="text-align: right" width="7%"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="% Seguro de Vida">S.V.</div></th>
                                            <th style="text-align: right" width="7%"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Subtotal Aporte Muserpol">Aporte</div></th>
                                            <th style="text-align: right" width="7%"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Ajuste IPC">IPC</div></th>
                                            <th style="text-align: right" width="7%"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Total Aporte Muserpol">Total</div></th>
                                            <th width="1%"></th>

                                        </tr>
                                    </thead>
                                    <tbody data-bind="foreach: contributions">
                                        <tr>
                                            <td style="text-align: center"><span data-bind="text: name_month"/></td>
                                            <td style="text-align: center"><input data-bind="value: base_wage, valueUpdate: 'afterkeydown'" style="text-align: right;width: 70px;"/></td>
                                            <td style="text-align: center"><select data-bind="options: $root.categories, value: category, optionsText: 'name'"></select></td>
                                            <td style="text-align: right"><span data-bind="text: seniority_bonus"/></td>
                                            <td style="text-align: center"><input data-bind="value: study_bonus, valueUpdate: 'afterkeydown'" style="text-align: right;width: 70px;"/></td>
                                            <td style="text-align: center"><input data-bind="value: position_bonus, valueUpdate: 'afterkeydown'" style="text-align: right;width: 70px;"/></td>
                                            <td style="text-align: center"><input data-bind="value: fron, valueUpdate: 'afterkeydown'" style="text-align: right;width: 70px;"/></td>
                                            <td style="text-align: center"><input data-bind="value: orie, valueUpdate: 'afterkeydown'" style="text-align: right;width: 70px;"/></td>
                                            <td style="text-align: right"><span data-bind="text: coti"/></td>
                                            <td style="text-align: right"><span data-bind="text: apfr"/></td>
                                            <td style="text-align: right"><span data-bind="text: apsv"/></td>
                                            <td style="text-align: right"><span data-bind="text: apor"/></td>
                                            <td style="text-align: right"><span data-bind="text: aipc"/></td>
                                            <td style="text-align: right"><span data-bind="text: tapo"/></td>
                                            <td style="text-align: center"><a href="#" data-bind="click: $root.removeContribution, visible: $parent.contributions().length > 1"><span class="glyphicon glyphicon-remove"></span></a></td>
                                        </tr>    
                                    </tbody>
                                    <tr class="active">
                                        <th style="text-align: center"><span data-bind="text: contributions().length"></span></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th style="text-align: right;"><span data-bind="text: tCot()"></span></th>
                                        <th style="text-align: right;"><span data-bind="text: tAfr()"></span></th>
                                        <th style="text-align: right;"><span data-bind="text: tAsv()"></span></th>
                                        <th style="text-align: right;"><span data-bind="text: tApo()"></span></th>
                                        <th style="text-align: right;"><span data-bind="text: tipc()"></span></th>
                                        <th style="text-align: right;"><span data-bind="text: tTap()"></span></th>
                                        <th></th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        {!! Form::hidden('data', null, ['data-bind'=> 'value: ko.toJSON(model)']) !!}
                        <div class="row text-center">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <a href="{!! url('affiliate/' . $affiliate->id) !!}" data-target="#" class="btn btn-raised btn-warning">&nbsp;<span class="glyphicon glyphicon-remove"></span>&nbsp;</a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="btn-group" data-toggle="tooltip" data-placement="bottom" data-original-title="Confirmar">
                                        <a href="" data-target="#myModal-confirm" class="btn btn-raised btn-success dropdown-toggle enabled" data-toggle="modal">
                                            &nbsp;<span class="glyphicon glyphicon-ok"></span>&nbsp;
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="myModal-confirm" class="modal fade">
                            <div class="modal-dialog">
                                <div class="alert alert-dismissible alert-info">
                                    <div class="modal-body text-center">
                                        <p><br>
                                            <div><h4>¿ Está seguro de guardar el Aporte de Bs. <b><span data-bind="text: tTap()"></span></b> al afiliado {!! $affiliate->getTittleName () !!}?</h4></div>
                                        </p>
                                    </div>
                                    <div class="row text-center">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-raised btn-default" data-dismiss="modal">&nbsp;<span class="glyphicon glyphicon-remove"></span>&nbsp;</button>
                                                &nbsp;&nbsp;&nbsp;
                                                <button type="submit" class="btn btn-raised btn-default" data-toggle="tooltip" data-placement="bottom" data-original-title="Guardar">&nbsp;<span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
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
                <h4 class="modal-title">Editar Información Personal</h4>
            </div>
            <div class="modal-body">

                {!! Form::open(['url' => 'calculation_contribution', 'role' => 'form', 'class' => 'form-horizontal']) !!}                  
                    <input type="hidden" name="afid" value="{{ $affiliate->id }}"/>
                    <input type="hidden" name="gestid" value="{{ $year }}"/>
                    <input type="hidden" name="type" value="{{ $type }}"/>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('sue', 'Haber Básico', ['class' => 'col-md-5 control-label']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('sue', $last_contribution->base_wage, ['class'=> 'form-control']) !!}
                                    <span class="help-block">Escriba el Haber Básico</span>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('b_est', 'Bono Estudio', ['class' => 'col-md-5 control-label']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('b_est', $last_contribution->study_bonus, ['class'=> 'form-control']) !!}
                                    <span class="help-block">Escriba el Bono Estudio</span>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('b_fro', 'Bono Frontera', ['class' => 'col-md-5 control-label']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('b_fro', $last_contribution->b_fro, ['class'=> 'form-control']) !!}
                                    <span class="help-block">Escriba el Bono Frontera</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('category_id', 'Categoría', ['class' => 'col-md-5 control-label']) !!}
                                <div class="col-md-5">
                                    {!! Form::select('category_id', $list_categories, $affiliate->category_id, ['class' => 'combobox form-control']) !!}
                                    <span class="help-block">Seleccione Departamento</span>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('b_car', 'Bono al Cargo', ['class' => 'col-md-5 control-label']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('b_car', $last_contribution->b_car, ['class'=> 'form-control']) !!}
                                    <span class="help-block">Escriba el Bono al Cargo</span>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('b_ori', 'Bono Oriente', ['class' => 'col-md-5 control-label']) !!}
                                <div class="col-md-4">
                                    {!! Form::text('b_ori', $last_contribution->b_ori, ['class'=> 'form-control']) !!}
                                    <span class="help-block">Escriba el Bono Oriente</span>
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

    $(document).ready(function(){
        $('.combobox').combobox();
        $('[data-toggle="tooltip"]').tooltip();
    });

        var affiliate = {!! $affiliate !!};
        var months = {!! $months !!};
        var categories = {!! $categories !!};
        var IpcAct = {!! $ipc_actual !!};

        function CalculationContribution(id_month, name_month, base_wage, categories, study_bonus, position_bonus,  fron, orie, fr_a, sv_a, ipc) {
            var self = this;
            self.id_month = id_month;
            self.name_month = name_month;
            self.base_wage = ko.observable(base_wage);
            self.category = ko.observable(categories);
            self.seniority_bonus = ko.computed(function() {
                var seniority_bonus = roundToTwo(parseFloat(self.category().por) * parseFloat(self.base_wage()));
                return seniority_bonus ? seniority_bonus : 0;       
            }); 
            self.study_bonus = ko.observable(study_bonus);
            // self.position_bonus = ko.observable(position_bonus);
            // self.fron = ko.observable(fron);
            // self.orie = ko.observable(orie);
            // self.coti = ko.computed(function() {
            //     var coti = roundToTwo(parseFloat(self.base_wage()) + parseFloat(self.seniority_bonus()) + 
            //                 parseFloat(self.study_bonus()) + parseFloat(self.position_bonus()) +
            //                 parseFloat(self.fron()) + parseFloat(self.orie()));
            //     return coti ? coti : 0;       
            // });
            // self.apfr = ko.computed(function() {
            //     var apfr = roundToTwo(parseFloat(self.coti()) * parseFloat(fr_a) / 100);
            //     return apfr ? apfr : 0;       
            // });
            // self.apsv = ko.computed(function() {
            //     var apsv = roundToTwo(parseFloat(self.coti()) * parseFloat(sv_a) / 100);
            //     return apsv ? apsv : 0;       
            // });
            // self.apor = ko.computed(function() {
            //     var apor = roundToTwo(parseFloat(self.apfr()) + parseFloat(self.apsv()));
            //     return apor ? apor : 0;       
            // });
            // self.aipc = ko.computed(function() {
            //     var aipc = roundToTwo(parseFloat(self.apor()) * ((parseFloat(IpcAct.ipc))/(parseFloat(ipc))-1));
            //     return aipc ? aipc : 0;       
            // });
            // self.tapo = ko.computed(function() {
            //     var tapo = roundToTwo(parseFloat(self.apor()) + parseFloat(self.aipc()));
            //     return tapo ? tapo : 0;
            // });
        }

        function CalculationContributionModel(months, lastap) {
            
            var self = this;
            self.categories = categories;  
            self.contributions = ko.observableArray(ko.utils.arrayMap(months, function(month) {
                return new CalculationContribution(month.id, month.name, lastap.sue ? lastap.sue : "",
                categories[affiliate.category_id-1], lastap.b_est ? lastap.b_est : 0,
                    lastap.b_car ? lastap.b_car : 0, lastap.b_fro ? lastap.b_fro : 0,
                    lastap.b_ori ? lastap.b_ori : 0,month.fr_a, month.sv_a, month.ipc);
            }));

            // self.tCot = ko.pureComputed(function() {
            // var total = 0;
            // $.each(self.contributions(), function() { total += parseFloat(this.coti()) })
            // return roundToTwo(total);
            // });
            // self.tAfr = ko.pureComputed(function() {
            // var total = 0;
            // $.each(self.contributions(), function() { total += parseFloat(this.apfr()) })
            // return roundToTwo(total);
            // });
            // self.tAsv = ko.pureComputed(function() {
            // var total = 0;
            // $.each(self.contributions(), function() { total += parseFloat(this.apsv()) })
            // return roundToTwo(total);
            // });
            // self.tApo = ko.pureComputed(function() {
            // var total = 0;
            // $.each(self.contributions(), function() { total += parseFloat(this.apor()) })
            // return roundToTwo(total);
            // });
            // self.tipc = ko.pureComputed(function() {
            // var total = 0;
            // $.each(self.contributions(), function() { total += parseFloat(this.aipc()) })
            // return roundToTwo(total);
            // });
            // self.tTap = ko.pureComputed(function() {
            // var total = 0;
            // $.each(self.contributions(), function() { total += parseFloat(this.tapo()) })
            // return roundToTwo(total);
            // });

            self.removeContribution = function(contribution) { self.contributions.remove(contribution) }
        }

        window.model = new CalculationContributionModel({!! $months !!}, {!! $last_contribution !!});
        ko.applyBindings(model);

        function roundToTwo(num) {
            var val = +(Math.round(num + "e+2")  + "e-2");
            return num ? parseFloat(Math.round(parseFloat(val) * 100) / 100).toFixed(2) : 0;
        }

</script>
@endpush
