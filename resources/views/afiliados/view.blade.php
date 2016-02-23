@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-heading">
                <h4><b>{!! $grado->lit !!}</b> {!! $afiliado->pat !!} {!! $afiliado->mat !!}  {!! $afiliado->nom !!} {!! $afiliado->nom2 !!} {!! $afiliado->ap_esp !!}</h4>
            </div>

		    <div class="row">
		        <div class="col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Información Personal</h3>
						</div>
						<div class="panel-body" style="font-size: 16px">
							<div class="row"><p >
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>Carnet Identidad</b>
										</div>
										<div class="col-md-6">
											 {!! $afiliado->ci !!} 
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>Fec. Nacimiento</b>
										</div>
										<div class="col-md-6">
											 {!! $afiliado->getFullDateNac() !!}
										</div>
									</div>
								</div></p>
							</div>
							<div class="row"><p>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>Ape. Paterno</b>
										</div>
										<div class="col-md-6">
											 {!! $afiliado->pat !!}
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>Ape. Materno</b>
										</div>
										<div class="col-md-6">
											 {!! $afiliado->mat !!}
										</div>
									</div>
								</div></p>
							</div>
							<div class="row"><p>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>1er. Nombre</b>
										</div>
										<div class="col-md-6">
											 {!! $afiliado->nom !!}
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>2do. Nombre</b>
										</div>
										<div class="col-md-6">
											 {!! $afiliado->nom2 !!}
										</div>
									</div>
								</div></p>
							</div>
							@if ($afiliado->ap_esp)
							<div class="row"><p>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>Apellido Esposo</b>
										</div>
										<div class="col-md-6">
											 {!! $afiliado->ap_esp !!}
										</div>
									</div>
								</div></p>
							</div>
							@endif
							<div class="row"><p>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>Estado Civil</b>
										</div>
										<div class="col-md-6">
											 {!! $afiliado->getCivil() !!}
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>Sexo</b>
										</div>
										<div class="col-md-6">
											 {!! $afiliado->getSex() !!}
										</div>
									</div>
								</div></p>
							</div>
						</div>
					</div>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Información Policial</h3>
						</div>
						<div class="panel-body" style="font-size: 16px">
							<div class="row"><p >
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>Carnet Identidad</b>
										</div>
										<div class="col-md-6">
											 {!! $afiliado->ci !!} 
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>Fec. Nacimiento</b>
										</div>
										<div class="col-md-6">
											 {!! $afiliado->getFullDateNac() !!}
										</div>
									</div>
								</div></p>
							</div>
							<div class="row"><p>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>Ape. Paterno</b>
										</div>
										<div class="col-md-6">
											 {!! $afiliado->pat !!}
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>Ape. Materno</b>
										</div>
										<div class="col-md-6">
											 {!! $afiliado->mat !!}
										</div>
									</div>
								</div></p>
							</div>
							<div class="row"><p>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>1er. Nombre</b>
										</div>
										<div class="col-md-6">
											 {!! $afiliado->nom !!}
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>2do. Nombre</b>
										</div>
										<div class="col-md-6">
											 {!! $afiliado->nom2 !!}
										</div>
									</div>
								</div></p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Totales</h3>
						</div>
						<div class="panel-body">

							<div class="row"><p>
								<div class="col-md-12">
									<table class="table" style="width:100%;font-size: 16px">
										<tr>
											<td>Total Ganado</td>
											<td style="text-align: right">{{ $totalGanado }}</td>
										</tr>
										<tr>
											<td>Total Bono de Seguridad Ciudadana</td>
											<td style="text-align: right">{{ $totalSegCiu }}</td>
										</tr>
										<tr>
											<td>SubTotal Cotizable</td>
											<td style="text-align: right">{{ $totalCotizable }}</td>
										</tr>
										<tr>
											<td>Total Cotizable Adicional</td>
											<td style="text-align: right">Bs 0.00</td>
										</tr>
										<tr>
											<td>Total Cotizable</td>
											<td style="text-align: right">{{ $totalCotizableAd }}</td>
										</tr>
									</table>
									
									<br/>

									<table class="table" style="width:100%;font-size: 16px">
										<tr>
											<td>Total Aporte Fondo de Retiro</td>
											<td style="text-align: right">{{ $totalFon }}</td>
										</tr>
										<tr>
											<td>Total Aporte Seguro de Vida</td>
											<td style="text-align: right">{{ $totalSegVid }}</td>
										</tr>
										<tr>
											<td>Total Aporte Muserpol</td>
											<td style="text-align: right">{{ $totalMuserpol }}</td>
										</tr>
									</table>



								</div>

							</div>
							
						</div>
					</div>
				</div>
			</div>

            <div class="panel panel-default">
                <div class="panel-body">

					<div class="row">
						<div class="col-md-12">
							<h4></h4>
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

							
							<table class="table table-striped table-hover" id="afiliados-table">
		                        <thead>
		                            <tr class="success">
		                                <th>MM AA</th>
		                                <th>Niv Gra</th>
		                                <th>Uni</th>
		                                <th>Ite</th>
										<th>Sue</th>
										<th>Bon Ant</th>
										<th>Bon Est</th>
										<th>Bon Car</th>
										<th>Bon Fro</th>
										<th>Bon Ori</th>
										<th>Bon Seg</th>
										<th>Def</th>
										<th>Nat</th>
										<th>Lac</th>
										<th>Pre</th>
										<th>Sub</th>
										<th>Gan</th>
										<th>Cot</th>
										<th>Mus</th> 
										<th>Fon</th> 
										<th>Vid</th> 
		                            </tr>
		                        </thead>
		                    </table>

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
					</div>

  				</div>
			</div>				
		</div>
	</div>
</div>
@endsection

@push('scripts')
<script>
	$(function() {
	    $('#afiliados-table').DataTable({
	    	"order": [[ 0, "asc" ]],
	    	"scrollX": true,
	        processing: true,
	        serverSide: true,
	        ajax: {
	            url: '{!! route('getAporte') !!}',
	            data: function (d) {
	                d.id = {{ $afiliado->id }};
	            }
	        },

	        columns: [
	            { data: 'period', name: 'period' },
	            { data: 'nivgra', name: 'nivgra' },
	            { data: 'uni', name: 'uni' },
	            { data: 'item', name: 'item' },
	            { data: 'sue', name: 'sue' },
	            { data: 'b_ant', name: 'b_ant' },
	            { data: 'b_est', name: 'b_est' },
	            { data: 'b_car', name: 'b_car' },
	            { data: 'b_fro', name: 'b_fro' },
	            { data: 'b_ori', name: 'b_ori' },
	            { data: 'b_seg', name: 'b_seg' },
	            { data: 'dfu', name: 'dfu' },
	            { data: 'nat', name: 'nat' },
	            { data: 'lac', name: 'lac' },
	            { data: 'pre', name: 'pre' },
	            { data: 'sub', name: 'sub' },
	            { data: 'gan', name: 'gan' },
	            { data: 'cot', name: 'cot' },
	            { data: 'mus', name: 'mus' },
	            { data: 'fon', name: 'fon' },
	            { data: 'vid', name: 'vid' },
	            
	        ]
	    });
	});
</script>
@endpush