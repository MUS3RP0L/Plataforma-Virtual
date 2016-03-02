@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-heading">
            	<div class="row">  
	             	<div class="col-md-8">
	                    <h4><b>{!! $lastAporte->grado->lit !!}</b></h4><h3>{!! $afiliado->pat !!} {!! $afiliado->mat !!}  {!! $afiliado->nom !!} {!! $afiliado->nom2 !!} {!! $afiliado->ap_esp !!}</h3>
	                </div>
	                <div class="col-md-4 text-right"> 
						<div class="btn-group">
						    <a href="bootstrap-elements.html" data-target="#" class="btn btn-raised btn-success dropdown-toggle" data-toggle="dropdown">
						        Opciones
						        <span class="caret"></span>
						    </a>
						    <ul class="dropdown-menu">
						    	<li class="dropdown-header">Edición</li>
						        <li><a href="{!! url('afiliado/' . $afiliado->id . '/edit') !!}">Editar Afiliado</a></li>
						        <li class="dropdown-header">Reportes</li>
						        <li><a href="{!! url('afiliadoreporte/' . $afiliado->id) !!}">Reporte Prestamo</a></li>
						    </ul>
						</div>
	                </div>
            	</div>
        	</div>

		    <div class="row">
		        <div class="col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Información Personal</h3>
						</div>
						<div class="panel-body" style="font-size: 14px">
							<div class="row"><p>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											Carnet Identidad
										</div>
										<div class="col-md-6">
											 {!! $afiliado->ci !!} 
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											Fecha Nacimiento
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
											Apellido Paterno
										</div>
										<div class="col-md-6">
											 {!! $afiliado->pat !!}
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											Apellido Materno
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
											Primer Nombre
										</div>
										<div class="col-md-6">
											 {!! $afiliado->nom !!}
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											Segundo Nombre
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
											Apellido de Esposo
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
											Estado Civil
										</div>
										<div class="col-md-6">
											 {!! $afiliado->getCivil() !!}
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											Sexo
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
							<h3 class="panel-title">Información Policial Actual</h3>
						</div>
						<div class="panel-body" style="font-size: 14px">
							<div class="row"><p>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											Estado
										</div>
										<div class="col-md-6">
											{!! $afiliado->afi_state->name !!}
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											Fecha de Ingreso
										</div>
										<div class="col-md-6">
											 {!! $afiliado->getFullDateIng() !!}
										</div>
									</div>
								</div></p>
							</div>
							<div class="row"><p>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											Unidad
										</div>
										<div class="col-md-6">
											{!! $lastAporte->unidad->lit !!}
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											Grado
										</div>
										<div class="col-md-6">
											 {!! $lastAporte->grado->lit !!}
										</div>
									</div>
								</div></p>
							</div>
							<div class="row"><p>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											Número de Ítem
										</div>
										<div class="col-md-6">
											{!! $lastAporte->item !!}
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											Número de Matrícula
										</div>
										<div class="col-md-6">
											{!! $afiliado->matri !!}
										</div>
									</div>
								</div></p>
							</div>
						</div>
					</div>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Información de Domicilio</h3>
						</div>
						<div class="panel-body" style="font-size: 14px">
							<div class="row"><p>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											Zona
										</div>
										<div class="col-md-6">
											{!! $afiliado->zona !!}
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											Calle
										</div>
										<div class="col-md-6">
											 {!! $afiliado->calle !!}
										</div>
									</div>
								</div></p>
							</div>
							<div class="row"><p>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											Núm Domicilio
										</div>
										<div class="col-md-6">
											{!! $afiliado->num_domi !!}
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											Teléfono
										</div>
										<div class="col-md-6">
											 {!! $afiliado->tele !!}
										</div>
									</div>
								</div></p>
							</div>
							<div class="row"><p>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											Correo electrónico
										</div>
										<div class="col-md-6">
											{!! $afiliado->celu !!}
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											Celular
										</div>
										<div class="col-md-6">
											{!! $afiliado->email !!}
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
							<div class="row">
								<div class="col-md-6">
									<h3 class="panel-title">Totales</h3>
								</div>
								<div class="col-md-6">
									<h3 class="panel-title"style="text-align: right">Bolivianos</h3>
								</div>
							</div>
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


			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Planillas de Haberes</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-3">
											<b>Desde</b>
										</div>
										<div class="col-md-3">
											 {!! $firstAporte->desde !!} 
										</div>
										<div class="col-md-3">
											<b>hasta</b>
										</div>
										<div class="col-md-3">
											 {!! $lastAporte->hasta !!} 
										</div>
									</div>
								</div>
							</div><br>
							<div class="row">
								<div class="col-md-12">
									

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
												<th>F.R.P</th> 
												<th>S.V.</th> 
				                            </tr>
				                        </thead>
				                    </table>
								</div>
							</div>						
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
	    	"dom": '<"top"l>t<"bottom"ip>',
	    	"order": [[ 0, "asc" ]],
	    	"scrollX": true,
	        processing: true,
	        serverSide: true,
	        bFilter: false,
	        ajax: {
	            url: '{!! route('getAporte') !!}',
	            data: function (d) {
	                d.id = {{ $afiliado->id }};
	            }
	        },

	        columns: [
	            { data: 'anio', name: 'anio' },
	            { data: 'grado_id', name: 'grado_id' },
	            { data: 'unidad_id', name: 'unidad_id' },
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