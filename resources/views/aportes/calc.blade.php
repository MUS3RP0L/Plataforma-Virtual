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
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Cálculo de Aportes</h3>
                </div>
                <div class="panel-body">
                    <div class="row"><p>
                        <div class="col-md-12">
                            


                        {{-- <h2><span data-bind="text: seats().length"></span> Meses</h2> --}}

                        <table class="table table-hover">
                            <thead>
                                <tr class="success">
                                    <th>Mes</th>
                                    <th>Haber Basico</th>
                                    <th>Categoría</th>
                                    <th>Antigüedad</th>
                                    <th>Bono Estudio</th>
                                    <th>Bono Cargo</th>
                                    <th>Bono Frontera</th>
                                    <th>Bono Oriente</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody data-bind="foreach: seats">
                                <tr>
                                    <td>
                                        <input data-bind="value: mes, valueUpdate: 'afterkeydown'" class="form-control"/>
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
                                        {{-- <input data-bind="value: car, valueUpdate: 'afterkeydown'" class="form-control" style="text-align: right"/> --}}
                                    </td>
                                    <td>
                                        {{-- <input data-bind="value: fro, valueUpdate: 'afterkeydown'" class="form-control" style="text-align: right"/> --}}
                                    </td>
                                    <td>
                                        {{-- <input data-bind="value: ori, valueUpdate: 'afterkeydown'" class="form-control" style="text-align: right"/> --}}
                                    </td>
                                    <td>
                                        <span data-bind="text: atotal" class="form-control"  style="text-align: right"/>
                                    </td>


                                    <td><a href="#" data-bind="click: $root.removeSeat">Quitar</a></td>
                                </tr>    
                            </tbody>
                        </table>

                        <button data-bind="click: addSeat, enable: seats().length < 12">Adicionar</button>

                        <h3 data-bind="visible: totalSurcharge() > 0">
                            Total <span data-bind="text: totalSurcharge()"></span>
                        </h3>



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

    function SeatReservation(mes, haber, initialMeal,est) {

        var self = this;
        self.mes = mes;
        self.haber = ko.observable(haber);
        self.meal = ko.observable(initialMeal);
        self.est = ko.observable(est);

        self.ant = ko.computed(function() {

            var price = self.meal().price*self.haber();
            return price ? price : "";       
        });  

        self.atotal = ko.computed(function() {

            var atotal = self.meal().price*self.haber() + self.haber();
            return atotal ? atotal : "";       
        });   
    }


    function ReservationsViewModel() {
        var self = this;

        self.availableMeals = [
            { mealName: "100%", price: 1 },
            { mealName: "85%", price: 0.85 },
            { mealName: "75%", price: 0.75 }
        ];    

        self.seats = ko.observableArray([
            new SeatReservation("Enero", '' , self.availableMeals[0], ''),
            new SeatReservation("Febrero", '', self.availableMeals[0], '')
        ]);

        
        self.totalSurcharge = ko.computed(function() {
           var total = 0;
           for (var i = 0; i < self.seats().length; i++)
               total += self.seats()[i].haber();
           return total;
        });    

        // Operations

        self.addSeat = function() {
            self.seats.push(new SeatReservation("", 0,self.availableMeals[0]));
        }

        self.removeSeat = function(seat) { self.seats.remove(seat) }
    }

    ko.applyBindings(new ReservationsViewModel());


</script>
@endpush
