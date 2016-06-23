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
                        
                         <h2><span data-bind="text: aportes().length"></span> Meses</h2>

                        <table class="table table-hover">
                            <thead>
                                <tr class="success">
                                    <th>Mes</th>
                                    <th>Haber Básico</th>
                                    <th>Categoría</th>
                                    <th>Antigüedad</th>
                                    <th>Bono Estudio</th>
                                    <th>Bono Cargo</th>
                                    <th>Bono Frontera</th>
                                    <th>Bono Oriente</th>
                                    <th>Cotizable</th>
                                    <th>F.R.</th>
                                    <th>S.V.</th>
                                    <th>Subtotal Aporte</th>
                                    <th>Ajuste IPC</th>
                                    <th>Total Aporte</th>
                                </tr>
                            </thead>
                            <tbody data-bind="foreach: aportes">
                                <tr>
                                    <td><span data-bind="text: nameMonth" class="form-control"/></td>
                                    <td><input data-bind="value: haber, valueUpdate: 'afterkeydown'" class="form-control" style="text-align: right"/></td>
                                    <td><select data-bind="options: $root.categorias, value: categoria, optionsText: 'name'" class="form-control"  style="text-align: right"></select></td>
                                    <td><span data-bind="text: anti" class="form-control"  style="text-align: right"/></td>
                                    <td><input data-bind="value: estu, valueUpdate: 'afterkeydown'" class="form-control" style="text-align: right"/></td>
                                    <td><input data-bind="value: carg, valueUpdate: 'afterkeydown'" class="form-control" style="text-align: right"/></td>
                                    <td><input data-bind="value: fron, valueUpdate: 'afterkeydown'" class="form-control" style="text-align: right"/></td>
                                    <td><input data-bind="value: orie, valueUpdate: 'afterkeydown'" class="form-control" style="text-align: right"/></td>
                                    <td><span data-bind="text: coti" class="form-control"  style="text-align: right"/></td>
                                    <td><span data-bind="text: apfr" class="form-control"  style="text-align: right"/></td>
                                    <td><span data-bind="text: apsv" class="form-control"  style="text-align: right"/></td>
                                    <td><span data-bind="text: apor" class="form-control"  style="text-align: right"/></td>
                                    <td><span data-bind="text: aipc" class="form-control"  style="text-align: right"/></td>
                                    <td><span data-bind="text: tapo" class="form-control"  style="text-align: right"/></td>

                                    <!-- <td><a href="#" data-bind="click: $root.removeAporte">Quitar</a></td> -->
                                </tr>    
                            </tbody>
                        </table>

                        {{-- <button data-bind="click: addAporte, enable: aportes().length < 12">Adicionar</button> --}}

{{--                         <h3 data-bind="visible: totalSurcharge() > 0">
                            Total <span data-bind="text: totalSurcharge()"></span>
                        </h3> --}}



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
            var anti = parseFloat(self.categoria().por) * parseFloat(self.haber());
            return anti ? anti : '';       
        }); 
        self.estu = ko.observable(estu);
        self.carg = ko.observable(carg);
        self.fron = ko.observable(fron);
        self.orie = ko.observable(orie);
        self.coti = ko.computed(function() {
            var coti = parseFloat(self.haber()) + parseFloat(self.anti()) + 
                        parseFloat(self.estu()) + parseFloat(self.carg()) +
                        parseFloat(self.fron()) + parseFloat(self.orie());
            return coti ? coti : '';       
        });
        self.apfr = ko.computed(function() {
            var apfr = parseFloat(self.coti()) * parseFloat(fr_a)/100;
            return apfr ? apfr : '';       
        });
        self.apsv = ko.computed(function() {
            var apsv = parseFloat(self.coti()) * parseFloat(sv_a)/100;
            return apsv ? apsv : '';       
        });
        self.apor = ko.computed(function() {
            var apor = parseFloat(self.apfr()) + parseFloat(self.apsv());
            return apor ? apor : '';       
        });
        self.aipc = ko.computed(function() {
            var aipc = parseFloat(self.apor()) -(parseFloat(self.apor()) * parseFloat(ipc)/parseFloat(IpcAct.ipc));
            return aipc ? aipc : '';       
        });
        self.tapo = ko.computed(function() {
            var tapo = parseFloat(self.apor()) + parseFloat(self.aipc());
            return tapo ? tapo : '';       
        });
    }

    function CalcAporteysViewModel(months) {
        var self = this;

        self.categorias = categorias;  

        self.aportes = ko.observableArray(ko.utils.arrayMap(months, function(month) {
            return new CalcAporte(month.name, '', categorias, 0, 0, 0, 0,month.fr_a, month.sv_a, month.ipc);
        }));

        // self.totalSurcharge = ko.computed(function() {
        //    var total = 0;
        //    for (var i = 0; i < self.aportes().length; i++)
        //        total += self.aportes()[i].haber();
        //    return total;
        // });    


        // self.addAporte = function() {
        //     self.aportes.push(new CalcAporte("", 0,self.availableMeals[0]));
        // }

        // self.removeAporte = function(aporte) { self.aportes.remove(aporte) }
    }

    ko.applyBindings(new CalcAporteysViewModel({!! $months !!}));

</script>
@endpush
