@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-heading">
            	<div class="row">  
	             	<div class="col-md-8">
	                    <h3>{!! $afiliado->pat !!} {!! $afiliado->mat !!}  {!! $afiliado->nom !!} {!! $afiliado->nom2 !!} {!! $afiliado->ap_esp !!}</h3>
	                    <h4><b>{!! $afiliado->grado->lit !!}</b></h4>
	                </div>
	                <div class="col-md-4 text-right"> 
						<div class="btn-group">
						    <a href="bootstrap-elements.html" data-target="#" class="btn btn-raised btn-success dropdown-toggle" data-toggle="dropdown">
						        Opciones
						        <span class="caret"></span>
						    </a>
						    <ul class="dropdown-menu">
						    	@if($lastAporte)
						    		<li class="dropdown-header">Despliegue</li>
						        	<li><a href="{!! url('viewaporte/' . $afiliado->id) !!}">Ver Aportes</a></li>
						        @endif
						    	<li class="dropdown-header">Registro</li>
						        <li><a href="{!! url('regaportegest/' . $afiliado->id) !!}">Registrar Aportes</a></li>
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
							<div class="row">  
					         	<div class="col-md-10">
					         		<h3 class="panel-title">Información Personal</h3>
					            </div>
					            <div class="col-md-2 text-right" data-toggle="modal" data-target="#myModal-personal"> 
					            		<span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span>
					            </div>
					    	</div>
							
						</div>
						<div class="panel-body" style="font-size: 14px">
							<div class="row">
								<div class="col-md-6">
									
									<table class="table" style="width:100%;">
										<tr>
											<td>
												<div class="row">
													<div class="col-md-6">
														Carnet Identidad
													</div>
													<div class="col-md-6">
														 {!! $afiliado->ci !!}
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="row">
													<div class="col-md-6">
														Apellido Paterno
													</div>
													<div class="col-md-6">
														 {!! $afiliado->pat !!}
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="row">
													<div class="col-md-6">
														Apellido Materno
													</div>
													<div class="col-md-6">
														 {!! $afiliado->mat !!}
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="row">
													<div class="col-md-6">
														Primer Nombre
													</div>
													<div class="col-md-6">
														{!! $afiliado->nom !!}
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="row">
													<div class="col-md-6">
														Segundo Nombre
													</div>
													<div class="col-md-6">
														{!! $afiliado->nom2 !!}
													</div>
												</div>
											</td>
										</tr>
										@if ($afiliado->ap_esp)
										<tr>
											<td>
												<div class="row">
													<div class="col-md-6">
														Apellido de Esposo
													</div>
													<div class="col-md-6">
														{!! $afiliado->ap_esp !!}
													</div>
												</div>
											</td>
										</tr>
										@endif
									</table>

								</div>

								<div class="col-md-6">

									<table class="table" style="width:100%;">
										<tr>
											<td>
												<div class="row">
													<div class="col-md-6">
														Fecha Nacimiento
													</div>
													<div class="col-md-6">
														 {!! $afiliado->getFullDateNac() !!}
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="row">
													<div class="col-md-6">
														Edad
													</div>
													<div class="col-md-6">
														{!! $afiliado->getHowOld() !!}
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="row">
													<div class="col-md-6">
														Sexo
													</div>
													<div class="col-md-6">
														{!! $afiliado->getSex() !!}
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="row">
													<div class="col-md-6">
														Estado Civil
													</div>
													<div class="col-md-6">
														{!! $afiliado->getCivil() !!}
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="row">
													<div class="col-md-6">
														Lugar Nacimiento
													</div>
													<div class="col-md-6">
														 {!! $afiliado->depa_nat !!}
													</div>
												</div>
											</td>
										</tr>

									</table>

								</div>

							</div>
						</div>
					</div>

					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Información de Domicilio</h3>
						</div>
						<div class="panel-body" style="font-size: 14px">
							<div class="row">

								<div class="col-md-6">

									<table class="table" style="width:100%;">
										<tr>
											<td>
												<div class="row">
													<div class="col-md-6">
														Departamento
													</div>
													<div class="col-md-6">
														{!! $afiliado->depa_vec_id !!}
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="row">
													<div class="col-md-6">
														Zona
													</div>
													<div class="col-md-6">
														{!! $afiliado->zona !!}
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="row">
													<div class="col-md-6">
														Calle
													</div>
													<div class="col-md-6">
														{!! $afiliado->calle !!}
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="row">
													<div class="col-md-6">
														Núm Domicilio
													</div>
													<div class="col-md-6">
														{!! $afiliado->num_domi !!}
													</div>
												</div>
											</td>
										</tr>

									</table>


								</div>

								<div class="col-md-6">

									<table class="table" style="width:100%;">
										<tr>
											<td>
												<div class="row">
													<div class="col-md-6">
														Teléfono
													</div>
													<div class="col-md-6">
														{!! $afiliado->tele !!}
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="row">
													<div class="col-md-6">
														Celular
													</div>
													<div class="col-md-6">
														{!! $afiliado->celu !!}
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="row">
													<div class="col-md-6">
														Correo Electrónico
													</div>
													<div class="col-md-6">
														{!! $afiliado->email !!}
													</div>
												</div>
											</td>
										</tr>

									</table>

								</div>
							</div>
						</div>
					</div>

				</div>

				<div class="col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Información Policial Actual</h3>
						</div>
						<div class="panel-body" style="font-size: 14px">
							<div class="row">
								<div class="col-md-6">

									<table class="table" style="width:100%;">
										<tr>
											<td>
												<div class="row">
													<div class="col-md-6">
														Grado
													</div>
													<div class="col-md-6" data-toggle="tooltip" data-placement="bottom" data-original-title="{!! $afiliado->grado->lit !!}"> {!! $afiliado->grado->abre !!}
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="row">
													<div class="col-md-6">
														Estado
													</div>
													<div class="col-md-6">
														 {!! $afiliado->afi_state->name !!}
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="row">
													<div class="col-md-6">
														Unidad
													</div>
													<div class="col-md-6" data-toggle="tooltip" data-placement="bottom" data-original-title="{!! $afiliado->unidad->lit !!}">
														{!! $afiliado->unidad->abre !!}
													</div>
												</div>
											</td>
										</tr>


									</table>


								</div>

								<div class="col-md-6">

									<table class="table" style="width:100%;">
										<tr>
											<td>
												<div class="row">
													<div class="col-md-6">
														Núm. de Matrícula
													</div>
													<div class="col-md-6">
														{!! $afiliado->matri !!}
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="row">
													<div class="col-md-6">
														Núm. de Ítem
													</div>
													<div class="col-md-6">
														{!! $afiliado->item !!}
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="row">
													<div class="col-md-6">
														Fecha de Ingreso
													</div>
													<div class="col-md-6">
														{!! $afiliado->getFullDateIng() !!}
													</div>
												</div>
											</td>
										</tr>

									</table>

								</div>
							</div>

						</div>
					</div>
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

							<div class="row">
								<div class="col-md-12">
									<table class="table" style="width:100%;font-size: 14px">
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
											<td>Total Cotizable</td>
											<td style="text-align: right">{{ $totalCotizableAd }}</td>
										</tr>
									</table>

									<table class="table" style="width:100%;font-size: 14px">
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

		</div>
	</div>
</div>

<div id="myModal-personal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content panel-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Editar Información Personal</h4>
            </div>
            <div class="modal-body">

                {!! Form::model($afiliado, ['method' => 'PATCH', 'route' => ['afiliado.update', $afiliado->id], 'class' => 'form-horizontal']) !!}

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
								{!! Form::label('ci', 'CARNET IDENTIDAD', ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-8">
								{!! Form::text('ci', $afiliado->ci, ['class'=> 'form-control']) !!}
							</div>
						</div>
						<div class="form-group">
								{!! Form::label('pat', 'APELLIDO PATERNO', ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-8">
								{!! Form::text('pat', $afiliado->pat, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
								<span class="help-block">Apellido paterno</span>
							</div>
						</div>	
						<div class="form-group">
								{!! Form::label('mat', 'APELLIDO MATERNO', ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-8">
								{!! Form::text('mat', $afiliado->mat, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
								<span class="help-block">Apellido Materno</span>
							</div>
						</div>								
						<div class="form-group">
								{!! Form::label('nom', 'PRIMER NOMBRE', ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-8">
								{!! Form::text('nom', $afiliado->nom, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
								<span class="help-block">Primer nombre</span>
							</div>
						</div>
						<div class="form-group">
								{!! Form::label('nom2', 'SEGUNDO NOMBRE', ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-8">
								{!! Form::text('nom2', $afiliado->nom2, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
								<span class="help-block">Segundo nombre</span>
							</div>
						</div>
						@if ($afiliado->sex == 'F')
							<div class="form-group">
									{!! Form::label('ap_esp', 'APELLIDO ESPOSO', ['class' => 'col-md-4 control-label']) !!}
								<div class="col-md-8">
									{!! Form::text('ap_esp', $afiliado->ap_esp, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
									<span class="help-block">Apellido esposo (Opcional)</span>
								</div>
							</div>
						@endif
					</div>
					<div class="col-md-6">
						<div class="form-group">
								{!! Form::label('fech_nac', 'FECHA NACIMIENTO', ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-8">
								{!! Form::text('fech_nac', $afiliado->getFullDateNac(), ['class'=> 'form-control']) !!}
							</div>
						</div>
						<div class="form-group">
								{!! Form::label('sex', 'SEXO', ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-8">
								{!! Form::text('sex', $afiliado->getSex(), ['class'=> 'form-control']) !!}
								<span class="help-block">Sexo</span>
							</div>
						</div>
						<div class="form-group">
									{!! Form::label('est_civ', 'ESTADO CIVIL', ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-8">
			              		{!! Form::select('est_civ', $list_est_civ, $afiliado->est_civ, ['class' => 'combobox form-control']) !!}
			                	<span class="help-block">Selecione el estado civil</span>
			              	</div>
						</div>
						<div class="form-group">
									{!! Form::label('depa_nat', 'LUGAR NACIMIENTO', ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-8">
			              		{!! Form::select('depa_nat', $list_depas, $afiliado->depa_nat_id, ['class' => 'combobox form-control']) !!}
			                	<span class="help-block">Selecione el estado civil</span>
			              	</div>
						</div>
					</div>
				</div>

				<div class="row text-center">
		            <div class="form-group">
		              <div class="col-md-12">
		              	<a href="{!! url('afiliado/' . $afiliado->id) !!}" class="btn btn-raised btn-warning">Cancelar</a>
		                <button type="submit" class="btn btn-raised btn-primary">Guardar</button>
		              </div>
		            </div>
	        	</div>
			{!! Form::close() !!}

            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">

	$(document).ready(function(){
		$('.combobox').combobox();
		$('[data-toggle="tooltip"]').tooltip();
	});

	$('.datepicker').datepicker({
	    format: "dd/mm/yyyy",
	    language: "es",
	    orientation: "bottom right",
	    daysOfWeekDisabled: "0,6",
	    autoclose: true
	});

</script>
@endpush