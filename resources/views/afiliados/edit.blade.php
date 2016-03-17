@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-heading">
            	<div class="row">  
	             	<div class="col-md-8">
	                    <h4><b>Editar Afiliado</b></h4>
	                </div>
            	</div>
        	</div>
	
			{!! Form::model($afiliado, ['method' => 'PATCH', 'route' => ['afiliado.update', $afiliado->id], 'class' => 'form-horizontal']) !!}

		    <div class="row">
		        <div class="col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Datos Personales</h3>
						</div>
						<div class="panel-body" style="font-size: 14px">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
											{!! Form::label('ci', 'CARNET IDENTIDAD', ['class' => 'col-md-4 control-label']) !!}
										<div class="col-md-8">
											{!! Form::text('ci', $afiliado->ci, ['class'=> 'form-control', 'disabled' => '']) !!}
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
											{!! Form::label('nom', 'PRIMER NOMBRE', ['class' => 'col-md-4 control-label']) !!}
										<div class="col-md-8">
											{!! Form::text('nom', $afiliado->nom, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
											<span class="help-block">Primer nombre</span>
										</div>
									</div>
									<div class="form-group">
												{!! Form::label('est_civ', 'ESTADO CIVIL', ['class' => 'col-md-4 control-label']) !!}
											<div class="col-md-8">
							              		{!! Form::select('est_civ', $list_est_civ, $afiliado->est_civ,['class' => 'combobox form-control']) !!}
							                	<span class="help-block">Selecione el estado civil</span>
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
											{!! Form::text('fech_nac', $afiliado->getFullDateNac(), ['class'=> 'form-control', 'disabled' => '']) !!}
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
											{!! Form::label('nom2', 'SEGUNDO NOMBRE', ['class' => 'col-md-4 control-label']) !!}
										<div class="col-md-8">
											{!! Form::text('nom2', $afiliado->nom2, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
											<span class="help-block">Segundo nombre</span>
										</div>
									</div>
									<div class="form-group">
											{!! Form::label('sex', 'SEXO', ['class' => 'col-md-4 control-label']) !!}
										<div class="col-md-8">
											{!! Form::text('sex', $afiliado->getSex(), ['class'=> 'form-control', 'disabled' => 'disabled']) !!}
											<span class="help-block">Sexo</span>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Datos Policiales</h3>
						</div>
						<div class="panel-body" style="font-size: 14px">

							<div class="row">
								<div class="col-md-12">		
									<div class="form-group">
											{!! Form::label('afi_state_id', 'ESTADO', ['class' => 'col-md-3 control-label']) !!}
										<div class="col-md-9">
						              		{!! Form::select('afi_state_id', $list_afi_states, $afiliado->afi_state_id,['class' => 'combobox form-control']) !!}
						                	<span class="help-block"></span>
						              	</div>
									</div>
	
									<div class="form-group">
										{!! Form::label('fech_dece', 'FECHA DECESO', ['class' => 'col-md-3 control-label']) !!}
			                            <div class="col-md-3">
				                            <div class="input-group">
				                                <input type="text" class="form-control datepicker" name="fech_dece">
				                                <div class="input-group-addon">
				                                    <span class="glyphicon glyphicon-calendar"></span>
				                                </div>
				                            </div>
				                        </div>
			                        </div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">		
									<div class="form-group">
											{!! Form::label('unidad_id', 'UNIDAD', ['class' => 'col-md-3 control-label']) !!}
										<div class="col-md-9">
						              		{!! Form::select('unidad_id', $list_unidades, $afiliado->unidad_id,['class' => 'combobox form-control']) !!}
						                	<span class="help-block"></span>
						                </div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">		
									<div class="form-group">
											{!! Form::label('grado_id', 'GRADO', ['class' => 'col-md-3 control-label']) !!}
										<div class="col-md-9">
						              		{!! Form::select('grado_id', $list_grados, $afiliado->grado_id,['class' => 'combobox form-control']) !!}
						                	<span class="help-block"></span>
						                </div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Datos de Domicilio</h3>
						</div>
						<div class="panel-body" style="font-size: 14px">
							<div class="row">
								<div class="col-md-6">

									<div class="form-group">
											{!! Form::label('zona', 'ZONA', ['class' => 'col-md-4 control-label']) !!}
										<div class="col-md-8">
											{!! Form::text('zona', $afiliado->zona, ['class'=> 'form-control']) !!}
										</div>
									</div>
									<div class="form-group">
											{!! Form::label('num_domi', 'NÚMERO DOMICILIO', ['class' => 'col-md-4 control-label']) !!}
										<div class="col-md-8">
											{!! Form::text('num_domi', $afiliado->num_domi, ['class'=> 'form-control']) !!}
											<span class="help-block">Apellido paterno</span>
										</div>
									</div>									
									<div class="form-group">
											{!! Form::label('email', 'CORREO ELECTRÓNICO', ['class' => 'col-md-4 control-label']) !!}
										<div class="col-md-8">
											{!! Form::text('email', $afiliado->email, ['class'=> 'form-control']) !!}
											<span class="help-block">Primer nombre</span>
										</div>
									</div>

								</div>
								<div class="col-md-6">
									<div class="form-group">
											{!! Form::label('calle', 'CALLE', ['class' => 'col-md-4 control-label']) !!}
										<div class="col-md-8">
											{!! Form::text('calle', $afiliado->calle, ['class'=> 'form-control']) !!}
										</div>
									</div>
									<div class="form-group">
											{!! Form::label('tele', 'TELÉFONO', ['class' => 'col-md-4 control-label']) !!}
										<div class="col-md-8">
											{!! Form::text('tele', $afiliado->tele, ['class'=> 'form-control']) !!}
											<span class="help-block">Apellido Materno</span>
										</div>
									</div>
									<div class="form-group">
											{!! Form::label('celu', 'CELULAR', ['class' => 'col-md-4 control-label']) !!}
										<div class="col-md-8">
											{!! Form::text('celu', $afiliado->celu, ['class'=> 'form-control']) !!}
											<span class="help-block">Segundo nombre</span>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row text-center">
	            <div class="form-group">
	              <div class="col-md-12">
	              	<a href="{!! url('afiliado/' . $afiliado->id) !!}" class="btn btn-raised btn-warning">Cancelar</a>
	                <button type="submit" class="btn btn-raised btn-primary">Aceptar</button>
	              </div>
	            </div>
        	</div>
			{!! Form::close() !!}

		</div>
	</div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">

	$(document).ready(function(){
		$('.combobox').combobox();
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