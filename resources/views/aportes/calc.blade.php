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
                            

                            <form action='/someServerSideHandler'>
                                <p>You have asked for <span data-bind='text: gifts().length'>&nbsp;</span> gift(s)</p>
                                <table data-bind='visible: gifts().length > 0'>
                                    <thead>
                                        <tr>
                                            <th>Gift name</th>
                                            <th>Price</th>
                                            <th />
                                        </tr>
                                    </thead>
                                    <tbody data-bind='foreach: gifts'>
                                        <tr>
                                            <td><input class='required' data-bind='value: name, uniqueName: true' /></td>
                                            <td><input class='required number' data-bind='value: price, uniqueName: true' /></td>
                                            <td><a href='#' data-bind='click: $root.removeGift'>Delete</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                             
                                <button data-bind='click: addGift'>Add Gift</button>
                                <button data-bind='enable: gifts().length > 0' type='submit'>Submit</button>
                            </form>


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




var GiftModel = function(gifts) {
    var self = this;
    self.gifts = ko.observableArray(gifts);
 
    self.addGift = function() {
        self.gifts.push({
            name: "",
            price: ""
        });
    };
 
    self.removeGift = function(gift) {
        self.gifts.remove(gift);
    };
 
    self.save = function(form) {
        alert("Could now transmit to server: " + ko.utils.stringifyJson(self.gifts));
        // To actually transmit to server as a regular form post, write this: ko.utils.postJson($("form")[0], self.gifts);
    };
};
 
var viewModel = new GiftModel([
    { name: "Tall Hat", price: "39.95"},
    { name: "Long Cloak", price: "120.00"}
]);
ko.applyBindings(viewModel);
 
// Activate jQuery Validation
$("form").validate({ submitHandler: viewModel.save });
</script>
@endpush
