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
						<div class="panel-body" style="width: 100%" align="center">
							<canvas id="doughnu-estado" width="450" height="300"/>
						</div>
					</div>
			</div>

			<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">Total Afiliados por Tipo</div>
						<div class="panel-body" style="width: 100%" align="center">
							<canvas id="pie-tipo" width="450" height="300"/>
						</div>
					</div>
			</div>

			<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">Total Aportes por Gestión</div>
						<div class="panel-body" style="width: 100%">
							<canvas id="bar-aportes" height="300" width="450"></canvas>
						</div>
					</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">Total Afiliados por Distrito</div>
						<div class="panel-body" style="width: 100%"  >
							<canvas id="pie-distrito" width="450" height="300"></canvas>
						</div>
					</div>
			</div>

			<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">Total Aportes Voluntarios por Gestión</div>
						<div class="panel-body" style="width: 100%" >
							<canvas id="bar-AporteVoluntario" width="450" height="300"></canvas>
						</div>
					</div>
			</div>

			<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">Total Trámites del Ultimo Semestre</div>
						<div class="panel-body" style="width: 100%">
							<canvas id="bar-tramites" height="300" width="450"></canvas>
						</div>
					</div>
			</div>
		</div>
		



	</div>
</div>
@endsection

<script>
	
	var doughnutData = [
				{
					value: {!! json_encode($totalcomando) !!},
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Red"
				},
				{
					value: {!! json_encode($totalbatallon) !!},
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

	var pieData = [
				{
					value: {!! json_encode($totalcomando) !!},
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Comando"
				},
				{
					value: {!! json_encode($totalbatallon) !!},
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Batallon"
				}

			];

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

	var pieDistrito = [
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


	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
	var barAporteVoluntario = {
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

	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
	var barTramites = {
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


	window.onload = function(){

		var ctx = document.getElementById("doughnu-estado").getContext("2d");
				window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {responsive : true});

		var ctx = document.getElementById("pie-tipo").getContext("2d");
				window.myPie = new Chart(ctx).Pie(pieData);

		var ctx = document.getElementById("bar-aportes").getContext("2d");
		window.myBar = new Chart(ctx).Bar(barChartData, {
			responsive : true
		});

		var ctx = document.getElementById("pie-distrito").getContext("2d");
				window.myPie = new Chart(ctx).Pie(pieDistrito);

		var ctx = document.getElementById("bar-AporteVoluntario").getContext("2d");
		window.myBar = new Chart(ctx).Bar(barAporteVoluntario, {
			responsive : true
		});

		var ctx = document.getElementById("bar-tramites").getContext("2d");
		window.myBar = new Chart(ctx).Bar(barTramites, {
			responsive : true
		});

		
	}

bar-tramites




</script>