@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-heading">
                <h3>Cuenta Individual</h3>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
    				<div class="row">
    					<h2 class="text-center"><b></b></h2>
					</div>
					<div class="row">
						<div class="col-md-12">
							<h4>Datos Personales</h4>
						</div>
					</div><br/>
					<div class="row">
						<div class="col-md-4">
							<b>Carnet Identidad</b> {!! $afiliado->ci !!} 
						</div>
						<div class="col-md-4">
							<b>Apellidos </b> {!! $afiliado->pat !!} {!! $afiliado->mat !!}
						</div>
						<div class="col-md-4">
							<b>Nombres </b> {!! $afiliado->nom !!} {!! $afiliado->nom2 !!}
						</div>
					</div><br/>

					<div class="row">
						<div class="col-md-4">
							<b>Fecha Nacimiento </b> {!! $afiliado->getFullDateNac() !!}
						</div>
						<div class="col-md-4">
							<b>Estado Civil </b> {!! $afiliado->getCivil() !!}
						</div>
						<div class="col-md-4">
							<b>Sexo </b> {!! $afiliado->getSex() !!}
						</div>
					</div><br/>

					<div class="row">
						<div class="col-md-12">
							<h4>Datos Policiales</h4>
						</div>
					</div><br/>
					<div class="row">
						<div class="col-md-4">
							<b>Fecha de Ingreso </b> {!! $afiliado->getFullDateIng() !!}
						</div>
						<div class="col-md-4">
							<b>Grado </b> {!! $grado->lit !!}
						</div>
						<div class="col-md-4">
							<b>Unidad </b> {!! $lastAporte->uni !!}
						</div>
					</div><br/>

					<div class="row">
						<div class="col-md-4">
							<b>Número de Ítem </b> {!! $lastAporte->item !!}
						</div>
						<div class="col-md-4">
							<b>Matrícula </b> {!! $afiliado->matri !!}
						</div>
						<div class="col-md-4">
						</div>
					</div><br/>

					<div class="row">
						<div class="col-md-12">
							<h4>Reintegro de Haberes</h4>
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
										<th>Bono Frontera</th>
										<th>Bono Oriente</th>
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