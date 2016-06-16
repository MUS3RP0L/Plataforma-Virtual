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
						<div class="panel-heading">Total Afiliados por Distrito {!! $Fyear1 !!}</div>
						<div class="panel-body" style="width: 100%"  >
							<canvas id="pie-distrito" width="450" height="300"></canvas>
						</div>
					</div>
			</div>

			<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">Total Aportes Voluntarios de la Gestión {!! $Fyear1 !!}</div>
						<div class="panel-body" style="width: 100%" >
							<canvas id="bar-AporteVoluntario" width="450" height="300"></canvas>
						</div>
					</div>
			</div>

			<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">Total Trámites de la Gestión {!! $Fyear1 !!}</div>
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
					value: {!! json_encode($list_estados[1]) !!},
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Servicio" //rojo
				},
				{
					value: {!! json_encode($list_estados[2]) !!},
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Comision" //verde
				},
				{
					value: {!! json_encode($list_estados[3]) !!},
					color: "#FDB45C",
					highlight: "#FFC870",
					label: "Disponibilidad" //amarillo
				},
				{
					value: {!! json_encode($list_estados[4]) !!},
					color: "#949FB1",
					highlight: "#A8B3C5",
					label: "Fallecido"  //grey
				},
				{
					value: {!! json_encode($list_estados[5]) !!},
					color: "#4D5360",
					highlight: "#616774",
					label: "Jubilado"  //Dark Grey
				},
				{
					value: {!! json_encode($list_estados[6]) !!},
					color: "#FF8C00",
					highlight: "#616774",
					label: "Jublición por Invalidez"  //Dark Orange
				},
				{
					value: {!! json_encode($list_estados[7]) !!},
					color: "#8FBC8F",
					highlight: "#616774",
					label: "Forzosa" //Dark Sea Green
				},
				{
					value: {!! json_encode($list_estados[8]) !!},
					color: "#1E90FF",
					highlight: "#FFC870",
					label: "Voluntario" //DodgerBlue 
				},
				{
					value: {!! json_encode($list_estados[9]) !!},
					color:"#B0C4DE",
					highlight: "#FF5A5E",
					label: "Temporal" //LightSteelBlue 
				}

			];

	var pieData = [
				{
					value: {!! json_encode($list_types[1]) !!},
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Comando"
				},
				{
					value: {!! json_encode($list_types[2]) !!},
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Batallon"
				}

			];

	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
	var barChartData = {
		labels : {!! json_encode($AporteGestion[0]) !!},
		datasets : [
			
			{
				fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,0.8)",
				highlightFill : "rgba(151,187,205,0.75)",
				highlightStroke : "rgba(151,187,205,1)",
				data : {!! json_encode($AporteGestion[1]) !!}
			}
		]

	}

	var pieDistrito = [
				{
					value: {!! json_encode($list_distrito["CHUQUISACA"]) !!},
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Chuquisaca" //red
				},
				{
					value: {!! json_encode($list_distrito["LA PAZ"]) !!},
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "La Paz" //green
				},
				{
					value: {!! json_encode($list_distrito["EL ALTO"]) !!},
					color: "#FDB45C",
					highlight: "#FFC870",
					label: "El Alto" //yellow
				},
				{
					value: {!! json_encode($list_distrito["ZONA SUR"]) !!},
					color: "#949FB1",
					highlight: "#A8B3C5",
					label: "Zona Sur" // grey
				},
				{
					value: {!! json_encode($list_distrito["COCHABAMBA"]) !!},
					color: "#4D5360",
					highlight: "#616774",
					label: "Cochabamba" //DarkGrey
				},
				{
					value: {!! json_encode($list_distrito["ORURO"]) !!},
					color: "#F0F8FF",
					highlight: "#616774",
					label: "Oruro" //AliceBlue
				},
				{
					value: {!! json_encode($list_distrito["POTOSI"]) !!},
					color: "#4D5360",
					highlight: "#616774",
					label: "Dark Grey"
				},
				{
					value: {!! json_encode($list_distrito["TUPIZA"]) !!},
					color: "#A52A2A",
					highlight: "#616774",
					label: "Tupiza" //Brown
				},
				{
					value: {!! json_encode($list_distrito["VILLAZON"]) !!},
					color: "#6495ED",
					highlight: "#616774",
					label: "Villazon" //CornFlowerBlue
				},
				{
					value: {!! json_encode($list_distrito["TARIJA"]) !!},
					color: "#DC143C",
					highlight: "#616774",
					label: "Tarija" //Crimson
				},
				{
					value: {!! json_encode($list_distrito["YACUIBA"]) !!},
					color: "#8B008B",
					highlight: "#616774",
					label: "Yacuiba" //DarkMagenta
				},
				{
					value: {!! json_encode($list_distrito["VILLAMONTES"]) !!},
					color: "#2F4F4F",
					highlight: "#616774",
					label: "Villamontes" //DarkSlateGray
				},
				{
					value: {!! json_encode($list_distrito["BERMEJO"]) !!},
					color: "#00BFFF",
					highlight: "#616774",
					label: "Bermejo" // DeepSkyBlue
				},
				{
					value: {!! json_encode($list_distrito["SANTA CRUZ"]) !!},
					color: "#1E90FF",
					highlight: "#616774",
					label: "Santa Cruz" //DodgerBlue
				},
				{
					value: {!! json_encode($list_distrito["SAN MATIAS"]) !!},
					color: "#4D5360",
					highlight: "#616774",
					label: "Dark Grey"
				},
				{
					value: {!! json_encode($list_distrito["S. I. VELASCO"]) !!},
					color: "#228B22",
					highlight: "#616774",
					label: "Velasco" //ForestGreen
				},
				{
					value: {!! json_encode($list_distrito["PTO. SUAREZ"]) !!},
					color: "#FFFAF0",
					highlight: "#616774",
					label: "Pto. Suarez" //FloralWhite
				},
				{
					value: {!! json_encode($list_distrito["BENI"]) !!},
					color: "#E9967A",
					highlight: "#616774",
					label: "Beni" //DarkSalmon
				},
				{
					value: {!! json_encode($list_distrito["RIBERALTA"]) !!},
					color: "#8FBC8F",
					highlight: "#616774",
					label: "Riberalta" //DarkSeaGreen
				},
				{
					value: {!! json_encode($list_distrito["GUAYARAMERIN"]) !!},
					color: "#F4A460",
					highlight: "#616774",
					label: "Guayaramerin" //SandyBrown
				},
				{
					value: {!! json_encode($list_distrito["PANDO"]) !!},
					color: "#4682B4",
					highlight: "#616774",
					label: "Pando" //SteelBlue
				}

			];


	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
	var barAporteVoluntario = {
		labels : {!! json_encode($aportevoluntario[0]) !!},
		datasets : [
			
			{
				fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,0.8)",
				highlightFill : "rgba(151,187,205,0.75)",
				highlightStroke : "rgba(151,187,205,1)",
				data : {!! json_encode($aportevoluntario[1]) !!}
			}
		]

	}

	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
	var barTramites = {
		labels : {!! json_encode($tramitesgestion[0]) !!},
		datasets : [
			{
				fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,0.8)",
				highlightFill : "rgba(151,187,205,0.75)",
				highlightStroke : "rgba(151,187,205,1)",
				data : {!! json_encode($tramitesgestion[1]) !!}
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

</script>