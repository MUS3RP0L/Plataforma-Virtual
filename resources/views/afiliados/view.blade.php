@extends('layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading"><h4 class="text-center">Estado de Cuenta Individual</h4></div>
  				<div class="panel-body">
    				<div class="row">
    					<h2 class="text-center"><b></b></h2>
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
					</div><br/>

					<div class="row">
						<div class="col-md-12">
							<h4><b>Datos Policiales</b></h4>
						</div>
					</div><br/>
					<div class="row">
						<div class="col-md-4">
							<b>FECHA DE INGRESO </b> {!! $afiliado->getFullDateIng() !!} <br/>
						</div>
						<div class="col-md-4">
							<b>GRADO </b> {!! $grado->lit !!}<br/>
						</div>
						<div class="col-md-4">
							<b>UNIDAD </b> {!! $lastAporte->uni !!}<br/>
						</div>
					</div><br/>

					<div class="row">
						<div class="col-md-4">
							<b>Número de Ítem </b> {!! $lastAporte->item !!} <br/>
						</div>
						<div class="col-md-4">
							<b>Matrícula </b> {!! $afiliado->matri !!} <br/>
						</div>
						<div class="col-md-4">
						</div>
					</div><br/>

					<div class="row">												
						<div class="panel-body">					
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>Periódo</th>
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
											<th>{{ $aporte->mes }}-{{ $aporte->anio }}</th>
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