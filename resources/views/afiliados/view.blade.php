@extends('layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Afiliado</div>
					<div class="panel-body">
						
						<table class="table table-bordered table-striped">
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
@endsection