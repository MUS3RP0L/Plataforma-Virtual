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
							<h3>Datos Personales</h3>
						</div>
					</div><br/>
					<div class="row">
						<div class="col-md-4">
							<h4><b>Carnet Identidad</b> {!! $afiliado->ci !!} </h4>
						</div>
						<div class="col-md-4">
							<h4><b>Apellidos </b> {!! $afiliado->pat !!} {!! $afiliado->mat !!}</h4>
						</div>
						<div class="col-md-4">
							<h4><b>Nombres </b> {!! $afiliado->nom !!} {!! $afiliado->nom2 !!}</h4>
						</div>
					</div><br/>

					<div class="row">
						<div class="col-md-4">
							<h4><b>Fecha Nacimiento </b> {!! $afiliado->getFullDateNac() !!}</h4>
						</div>
						<div class="col-md-4">
							<h4><b>Estado Civil </b> {!! $afiliado->getCivil() !!}</h4>
						</div>
						<div class="col-md-4">
							<h4><b>Sexo </b> {!! $afiliado->getSex() !!}</h4>
						</div>
					</div><br/>

					<div class="row">
						<div class="col-md-12">
							<h3>Datos Policiales</h3>
						</div>
					</div><br/>
					<div class="row">
						<div class="col-md-4">
							<h4><b>Fecha de Ingreso </b> {!! $afiliado->getFullDateIng() !!}</h4>
						</div>
						<div class="col-md-4">
							<h4><b>Grado </b> {!! $grado->lit !!}</h4>
						</div>
						<div class="col-md-4">
							<h4><b>Unidad </b> {!! $lastAporte->uni !!}</h4>
						</div>
					</div><br/>

					<div class="row">
						<div class="col-md-4">
							<h4><b>Número de Ítem </b> {!! $lastAporte->item !!}<h4>
						</div>
						<div class="col-md-4">
							<h4><b>Matrícula </b> {!! $afiliado->matri !!}<h4>
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
										<th>Bono Estudio</th>
										<th>Bono Cargo</th>
										<th>BonoFrontera</th>
										<th>BonoOriente</th>
										<th>Bono Seguridad Cuidadana</th>
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

					<div class="row">
						<div class="col-md-3 col-md-offset-8">
							<h3>Totales
							<table class="table" style="width:100%">
								<tr>
									<td><small>Total Ganado</small></td>
									<td style="text-align: right">{{ $totalGanado }}</td>
								</tr>
								<tr>
									<td><small>Total Aporte Muserpol</small></td>
									<td style="text-align: right">{{ $totalMuserpol }}</td>
								</tr>
							</table>
							</h3>
						</div>
					</div
  				</div>
			</div>				
		</div>
	</div>
</div>
@endsection