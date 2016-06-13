@extends('layout')

@section('content')
<div class="container-fluid">
	
	{!! Breadcrumbs::render('home') !!}

	<div class="col-md-10 col-md-offset-1">

		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-default">
				  <div class="panel-body" style="font-size: 26px;">
				    <div>
         				Afiliados en Servicio<br>
         				{!! $totalAfiServ !!}
        			</div>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
				  <div class="panel-body" style="font-size: 26px;">
				    <div>
         				Afiliados en Comisión<br>
         				{!! $totalAfiComi !!}
        			</div>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
				  <div class="panel-body" style="font-size: 26px;">
				    <div>
         				Total de Afiliados<br>
         				{!! $totalAfi !!}
        			</div>
				  </div>
				</div>
			</div>
		</div>

	  	<div class="row">
			<div class="col-md-8">
					<div class="panel panel-primary">
						<div class="panel-heading">Actividades</div>

						<div class="panel-body">
							<ul class="panel-body list-group">
						      @foreach ($activities as $activity)
						        <li class="list-group-item">
						          <span style="color:#888;font-style:italic">{!! $activity->created_at !!}:</span>
						          {!! $activity->message !!}
						        </li>
						      @endforeach
						      </ul>
						</div>
					</div>
				</div>
		</div>

		<div class="row">
			<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">Total Afiliados por Estado</div>

						<div class="panel-body" style="width: 90%">
						
							<canvas id="canvas" height="450" width="600"></canvas>
							

						</div>
					</div>
			</div>

			<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">Total Afiliados por Tipo</div>

						<div class="panel-body" style="width: 100%" align="center">
							<canvas id="chart-area" width="300" height="300"/>
						</div>
					</div>
			</div>

			<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">Total Afiliados por Departamento</div>

						<div class="panel-body" style="width: 65%" align="center">
							<canvas id="chart-doughnu" width="300" height="300"/>
						</div>
					</div>
			</div>
		</div>
		



	</div>
</div>
@endsection

<script>
var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

	var barChartData = {
		labels : ["January","February","March","April","May","June","July"],
		datasets : [
			{
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,0.8)",
				highlightFill: "rgba(220,220,220,0.75)",
				highlightStroke: "rgba(220,220,220,1)",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			},
			{
				fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,0.8)",
				highlightFill : "rgba(151,187,205,0.75)",
				highlightStroke : "rgba(151,187,205,1)",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			}
		]

	}


	var pieData = [
				{
					value: 300,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Red"
				},
				{
					value: 50,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Green"
				},
				{
					value: 100,
					color: "#FDB45C",
					highlight: "#FFC870",
					label: "Yellow"
				},
				{
					value: 40,
					color: "#949FB1",
					highlight: "#A8B3C5",
					label: "Grey"
				},
				{
					value: 120,
					color: "#4D5360",
					highlight: "#616774",
					label: "Dark Grey"
				}

			];

	var doughnutData = [
				{
					value: 300,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Red"
				},
				{
					value: 50,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Green"
				},
				{
					value: 100,
					color: "#FDB45C",
					highlight: "#FFC870",
					label: "Yellow"
				},
				{
					value: 40,
					color: "#949FB1",
					highlight: "#A8B3C5",
					label: "Grey"
				},
				{
					value: 120,
					color: "#4D5360",
					highlight: "#616774",
					label: "Dark Grey"
				}

			];

			
	

	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myBar = new Chart(ctx).Bar(barChartData, {
			responsive : true
		});

		var ctx = document.getElementById("chart-area").getContext("2d");
				window.myPie = new Chart(ctx).Pie(pieData);

		var ctx = document.getElementById("chart-doughnu").getContext("2d");
				window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {responsive : true});
	}






</script>