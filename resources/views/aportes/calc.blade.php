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
                    <h3 class="panel-title">Cálculo de Aportes</h3>
                </div>
                <div class="panel-body">
                    <div class="row"><p>
                        <div class="col-md-12">
                            


                        {{-- <h2><span data-bind="text: aportes().length"></span> Meses</h2> --}}

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
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody data-bind="foreach: aportes">
                                <tr>
                                    <td>
                                        <span data-bind="text: mes" class="form-control"/>
                                    </td>
                                    <td>
                                        <input data-bind="value: haber, valueUpdate: 'afterkeydown'" class="form-control" style="text-align: right"/>
                                    </td>
                                    <td>
                                        <select data-bind="options: $root.availableMeals, value: meal, optionsText: 'mealName'" class="form-control"  style="text-align: right">
                                        </select>
                                    </td>
                                    <td>
                                        <span data-bind="text: ant" class="form-control"  style="text-align: right"/>
                                    </td>

                                    <td>
                                        <input data-bind="value: est, valueUpdate: 'afterkeydown'" class="form-control" style="text-align: right"/>
                                    </td>
                                    <td>
                                        <input data-bind="value: car, valueUpdate: 'afterkeydown'" class="form-control" style="text-align: right"/>
                                    </td>
                                    <td>
                                        <input data-bind="value: fro, valueUpdate: 'afterkeydown'" class="form-control" style="text-align: right"/>
                                    </td>
                                    <td>
                                        <input data-bind="value: ori, valueUpdate: 'afterkeydown'" class="form-control" style="text-align: right"/>
                                    </td>
                                    <td>
                                        <span data-bind="text: atotal" class="form-control"  style="text-align: right"/>
                                    </td>


                                    <td><a href="#" data-bind="click: $root.removeAporte">Quitar</a></td>
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

    function CalcAporte(mes, haber, initialMeal, est, car, fro, ori) {

        var self = this;
        self.mes = mes;
        self.haber = ko.observable(haber);
        self.meal = ko.observable(initialMeal);
        self.est = ko.observable(est);
        self.car = ko.observable(car);
        self.fro = ko.observable(fro);
        self.ori = ko.observable(ori);

        self.ant = ko.computed(function() {

            var ant = self.meal().price*self.haber();
            return ant ? ant : "";       
        });  

        self.atotal = ko.computed(function() {

            var atotal = (parseFloat(self.meal().price) * parseFloat(self.haber())) 
                            + parseFloat(self.haber()) 
                            + parseFloat(self.est())
                            + parseFloat(self.car())
                            + parseFloat(self.fro())
                            + parseFloat(self.ori());
            return atotal ? atotal : 0;       
        });   
    }

    function CalcAporteysViewModel() {
        var self = this;

        // self.availableMeals = categorias;

        self.availableMeals = [
            { mealName: "100%", price: 1 },
            { mealName: "85%", price: 0.85 },
            { mealName: "75%", price: 0.75 }
        ];    

        self.aportes = ko.observableArray([
            new CalcAporte("Enero", '', self.availableMeals[0],0,0,0,0,0),
            new CalcAporte("Febrero", '', self.availableMeals[0],0,0,0,0,0),
            new CalcAporte("Marzo", '', self.availableMeals[0],0,0,0,0,0),
            new CalcAporte("Abril", '', self.availableMeals[0],0,0,0,0,0),
            new CalcAporte("Mayo", '', self.availableMeals[0],0,0,0,0,0),
            new CalcAporte("Junio", '', self.availableMeals[0],0,0,0,0,0),
            new CalcAporte("Julio", '', self.availableMeals[0],0,0,0,0,0)
        ]);

        
        self.totalSurcharge = ko.computed(function() {
           var total = 0;
           for (var i = 0; i < self.aportes().length; i++)
               total += self.aportes()[i].haber();
           return total;
        });    


        self.addAporte = function() {
            self.aportes.push(new CalcAporte("", 0,self.availableMeals[0]));
        }

        self.removeAporte = function(aporte) { self.aportes.remove(aporte) }
    }

    ko.applyBindings(new CalcAporteysViewModel());

</script>
@endpush
