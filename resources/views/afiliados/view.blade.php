@extends('layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
  				<div class="panel-body">
    				<div class="row">
    					<h2 class="text-center"><b>Estado de Cuenta Individual</b></h2>
					</div>
					<div class="row">
						<div class="col-md-12">
							<h4><b>Datos Personales</b></h4>
						</div>
					</div><br/>
					<div class="row">
						<div class="col-md-4">
							<b>CARNET IDENTIDAD </b> {!! $afiliado->ci !!} <br/>
						</div>
						<div class="col-md-4">
							<b>APELLIDOS </b> {!! $afiliado->pat !!} {!! $afiliado->mat !!}<br/>
						</div>
						<div class="col-md-4">
							<b>NOMBRES </b> {!! $afiliado->nom !!} {!! $afiliado->nom2 !!}<br/>
						</div>
					</div><br/>

					<div class="row">
						<div class="col-md-4">
							<b>FECHA NACIMIENTO </b> {!! $afiliado->getFullDateNac() !!} <br/>
						</div>
						<div class="col-md-4">
							<b>ESTADO CIVIL </b> {!! $afiliado->getCivil() !!} <br/>
						</div>
						<div class="col-md-4">
							<b>SEXO </b> {!! $afiliado->getSex() !!} <br/>
						</div>
					</div>

					<div class="row">												
						<div class="panel-body">					
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>Mes</th>
										<th>Año</th>
										<th>Unidad</th>
										<th>Item</th>
										<th>Sueldo</th>
										<th>Antigüedad</th>
										<th>Estudio</th>
										<th>Cargo</th>
										<th>Frontera</th>
										<th>Oriente</th>
										<th>Seguridad</th>
										<th>Ganancia</th>
										<th>Muserpol</th>
									</tr>

								</thead>
								<tbody>
									@foreach($afiliado->aportes as $aporte)
										<tr>
											<th>{{ $aporte->mes }}</th>
											<th>{{ $aporte->anio }}</th>
											<th>{{ $aporte->uni }}</th>
											<th>{{ $aporte->item }}</th>
											<th>{{ $aporte->sue }}</th>
											<th>{{ $aporte->b_ant }}</th>
											<th>{{ $aporte->b_est }}</th>
											<th>{{ $aporte->b_car }}</th>
											<th>{{ $aporte->b_fro }}</th>
											<th>{{ $aporte->b_ori }}</th>
											<th>{{ $aporte->b_seg }}</th>
											<th>{{ $aporte->gan }}</th>
											<th>{{ $aporte->mus }}</th>

										</tr>
									@endforeach
								</tbody>
							</table>
						</div>					
					</div>
  				</div>
			</div>				
		</div>
	</div>
</div>
@endsection