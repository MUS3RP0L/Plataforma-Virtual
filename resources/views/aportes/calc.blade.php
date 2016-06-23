@extends('layout')

@section('content')
<div class="container-fluid">
    {!! Breadcrumbs::render('registro_aportes_afiliado', $afiliado) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="row">  
                <div class="col-md-12 text-right"> 
                    <a href="{!! url('selectgestaporte/' . $afiliado->id) !!}" style="margin:-6px 1px 12px;" class="btn btn-raised btn-warning" data-toggle="tooltip" data-placement="top" data-original-title="Atrás">
                        &nbsp;<span class="glyphicon glyphicon-share-alt"></span>&nbsp;
                    </a>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Cálculo de Aportes</h3>
                </div>
                <div class="panel-body">
                    <div class="row"><p>
                        <div class="col-md-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="success">
                                        <th style="text-align: center" width="6%">Mes</th>
                                        <th style="text-align: center" width="6%">H. Básico</th>
                                        <th style="text-align: center" width="6%">Categoría</th>
                                        <th style="text-align: center" width="5%">Antigüedad</th>
                                        <th style="text-align: center" width="6%">B. Estudio</th>
                                        <th style="text-align: center" width="6%">B. al Cargo</th>
                                        <th style="text-align: center" width="6%">B. Frontera</th>
                                        <th style="text-align: center" width="6%">B. Oriente</th>
                                        <th style="text-align: center" width="7%">Cotizable</th>
                                        <th style="text-align: center" width="6%">F.R.</th>
                                        <th style="text-align: center" width="6%">S.V.</th>
                                        <th style="text-align: center" width="6%">Aporte</th>
                                        <th style="text-align: center" width="6%">IPC</th>
                                        <th style="text-align: center" width="6%">Total</th>
                                        <th style="text-align: center" width="1%"></th>
                                    </tr>
                                </thead>
                                <tbody data-bind="foreach: aportes">
                                    <tr>
                                        <td style="text-align: center"><span data-bind="text: nameMonth"/></td>
                                        <td style="text-align: center"><input data-bind="value: haber, valueUpdate: 'afterkeydown'" style="text-align: right;width: 80px;"/></td>
                                        <td style="text-align: center"><select data-bind="options: $root.categorias, value: categoria, optionsText: 'name'"></select></td>
                                        <td style="text-align: right;padding-right:2%;"><span data-bind="text: anti"/></td>
                                        <td style="text-align: center"><input data-bind="value: estu, valueUpdate: 'afterkeydown'" style="text-align: right;width: 79px;"/></td>
                                        <td style="text-align: center"><input data-bind="value: carg, valueUpdate: 'afterkeydown'" style="text-align: right;width: 79px;"/></td>
                                        <td style="text-align: center"><input data-bind="value: fron, valueUpdate: 'afterkeydown'" style="text-align: right;width: 79px;"/></td>
                                        <td style="text-align: center"><input data-bind="value: orie, valueUpdate: 'afterkeydown'" style="text-align: right;width: 79px;"/></td>
                                        <td style="text-align: right;padding-right:2%;"><span data-bind="text: coti"/></td>
                                        <td style="text-align: right;padding-right:2%;"><span data-bind="text: apfr"/></td>
                                        <td style="text-align: right;padding-right:2%;"><span data-bind="text: apsv"/></td>
                                        <td style="text-align: right;padding-right:2%;"><span data-bind="text: apor"/></td>
                                        <td style="text-align: right;padding-right:2%;"><span data-bind="text: aipc"/></td>
                                        <td style="text-align: right;padding-right:2%;"><span data-bind="text: tapo"/></td>
                                        <td style="text-align: center"><a href="#" data-bind="click: $root.removeAporte, visible: tapo() == 0"><span class="glyphicon glyphicon-remove"></span></a></td>
                                    </tr>    
                                </tbody>
                                <tr class="active">
                                    <th style="text-align: center"><span data-bind="text: aportes().length"></span></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th style="text-align: right;padding-right:2%;"><span data-bind="text: tCot()"></span></th>
                                    <th style="text-align: right;padding-right:2%;"><span data-bind="text: tAfr()"></span></th>
                                    <th style="text-align: right;padding-right:2%;"><span data-bind="text: tAsv()"></span></th>
                                    <th style="text-align: right;padding-right:2%;"><span data-bind="text: tApo()"></span></th>
                                    <th style="text-align: right;padding-right:2%;"><span data-bind="text: tipc()"></span></th>
                                    <th style="text-align: right;padding-right:2%;"><span data-bind="text: tTap()"></span></th>
                                    <th></th>
                                </tr>
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

    $(document).ready(function(){
        $('.combobox').combobox();
    });

    var months = {!! $months !!};
    var categorias = {!! $categorias !!};
    var IpcAct = {!! $IpcAct !!};

     function CalcAporte(nameMonth, haber, categorias, estu, carg,  fron, orie, fr_a, sv_a, ipc) {

        var self = this;

        self.nameMonth = nameMonth;
        self.haber = ko.observable(haber);
        self.categoria = ko.observable(categorias);
        self.anti = ko.computed(function() {
            var anti = roundToTwo(parseFloat(self.categoria().por) * parseFloat(self.haber()));
            return anti ? anti : 0;       
        }); 
        self.estu = ko.observable(estu);
        self.carg = ko.observable(carg);
        self.fron = ko.observable(fron);
        self.orie = ko.observable(orie);
        self.coti = ko.computed(function() {
            var coti = roundToTwo(parseFloat(self.haber()) + parseFloat(self.anti()) + 
                        parseFloat(self.estu()) + parseFloat(self.carg()) +
                        parseFloat(self.fron()) + parseFloat(self.orie()));
            return coti ? coti : 0;       
        });
        self.apfr = ko.computed(function() {
            var apfr = roundToTwo(parseFloat(self.coti()) * parseFloat(fr_a) / 100);
            return apfr ? apfr : 0;       
        });
        self.apsv = ko.computed(function() {
            var apsv = roundToTwo(parseFloat(self.coti()) * parseFloat(sv_a) / 100);
            return apsv ? apsv : 0;       
        });
        self.apor = ko.computed(function() {
            var apor = roundToTwo(parseFloat(self.apfr()) + parseFloat(self.apsv()));
            return apor ? apor : 0;       
        });
        self.aipc = ko.computed(function() {
            var aipc = roundToTwo(parseFloat(self.apor()) - (parseFloat(self.apor()) * parseFloat(ipc) / parseFloat(IpcAct.ipc)));
            return aipc ? aipc : 0;       
        });
        self.tapo = ko.computed(function() {
            var tapo = roundToTwo(parseFloat(self.apor()) + parseFloat(self.aipc()));
            return tapo ? tapo : 0;
        });
    }

    function CalcAporteysViewModel(months) {
        var self = this;

        self.categorias = categorias;  

        self.aportes = ko.observableArray(ko.utils.arrayMap(months, function(month) {
            return new CalcAporte(month.name, '', categorias, 0, 0, 0, 0,month.fr_a, month.sv_a, month.ipc);
        }));

        self.tCot = ko.pureComputed(function() {
        var total = 0;
        $.each(self.aportes(), function() { total += this.coti() })
        return roundToTwo(total);
        });
        self.tAfr = ko.pureComputed(function() {
        var total = 0;
        $.each(self.aportes(), function() { total += this.apfr() })
        return roundToTwo(total);
        });
        self.tAsv = ko.pureComputed(function() {
        var total = 0;
        $.each(self.aportes(), function() { total += this.apsv() })
        return roundToTwo(total);
        });
        self.tApo = ko.pureComputed(function() {
        var total = 0;
        $.each(self.aportes(), function() { total += this.apor() })
        return roundToTwo(total);
        });
        self.tipc = ko.pureComputed(function() {
        var total = 0;
        $.each(self.aportes(), function() { total += this.aipc() })
        return roundToTwo(total);
        });
        self.tTap = ko.pureComputed(function() {
        var total = 0;
        $.each(self.aportes(), function() { total += this.tapo() })
        return roundToTwo(total);
        });

        self.removeAporte = function(aporte) { self.aportes.remove(aporte) }
    }

    ko.applyBindings(new CalcAporteysViewModel({!! $months !!}));

    function roundToTwo(num, toString) {
      var val = +(Math.round(num + "e+2")  + "e-2");
      return toString ? val.toFixed(2) : (val || 0);
    }

</script>
@endpush
