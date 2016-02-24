@extends('layout')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel-heading"><h3>Editar Afiliado</h3></div>
			<div class="panel panel-default">
				<div class="panel-body">
					{!! Form::model($afiliado, ['method' => 'PATCH', 'route' => ['afiliado.update', $afiliado->id], 'class' => 'form-horizontal']) !!}
						<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

						<div class="row">
							<div class="col-md-6">
								<div class="form-group form-group-lg">
										{!! Form::label('ci', 'CARNET IDENTIDAD', ['class' => 'col-md-4 control-label']) !!}
									<div class="col-md-6">
										{!! Form::text('ci', $afiliado->ci, ['class'=> 'form-control', 'disabled' => '']) !!}
									</div>
								</div>
								<div class="form-group form-group-lg">
										{!! Form::label('pat', 'APELLIDO PATERNO', ['class' => 'col-md-4 control-label']) !!}
									<div class="col-md-6">
										{!! Form::text('pat', $afiliado->pat, ['class'=> 'form-control', 'required' => 'required']) !!}
										<span class="help-block">Apellido paterno</span>
									</div>
								</div>									
								<div class="form-group form-group-lg">
										{!! Form::label('nom', 'PRIMER NOMBRE', ['class' => 'col-md-4 control-label']) !!}
									<div class="col-md-6">
										{!! Form::text('nom', $afiliado->nom, ['class'=> 'form-control', 'required' => 'required']) !!}
										<span class="help-block">Primer nombre</span>
									</div>
								</div>
								<div class="form-group form-group-lg">
										{!! Form::label('est_civ', 'ESTADO CIVIL', ['class' => 'col-md-4 control-label']) !!}
									<div class="col-md-6">
										{!! Form::text('est_civ', $afiliado->getCivil(), ['class'=> 'form-control', 'required' => 'required']) !!}
										<span class="help-block">Estado civil</span>
									</div>
								</div>

								<div class="form-group form-group-lg">
										{!! Form::label('ap_esp', 'APELLIDO ESPOSO', ['class' => 'col-md-4 control-label']) !!}
									<div class="col-md-6">
										{!! Form::text('ap_esp', $afiliado->ap_esp, ['class'=> 'form-control', 'required' => 'required']) !!}
										<span class="help-block">Apellido esposo (Opcional)</span>
									</div>
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group form-group-lg">
										{!! Form::label('fech_nac', 'FECHA NACIMIENTO', ['class' => 'col-md-4 control-label']) !!}
									<div class="col-md-6">
										{!! Form
											::text('fech_nac', $afiliado->getFullDateNac(), ['class'=> 'form-control', 'disabled' => '']) !!}
									</div>
								</div>
								<div class="form-group form-group-lg">
										{!! Form::label('mat', 'APELLIDO MATERNO', ['class' => 'col-md-4 control-label']) !!}
									<div class="col-md-6">
										{!! Form::text('mat', $afiliado->mat, ['class'=> 'form-control', 'required' => 'required']) !!}
										<span class="help-block">Apellido Materno</span>
									</div>
								</div>
								<div class="form-group form-group-lg">
										{!! Form::label('nom2', 'SEGUNDO NOMBRE', ['class' => 'col-md-4 control-label']) !!}
									<div class="col-md-6">
										{!! Form::text('nom2', $afiliado->nom2, ['class'=> 'form-control', 'required' => 'required']) !!}
										<span class="help-block">Segundo nombre</span>
									</div>
								</div>
								<div class="form-group form-group-lg">
										{!! Form::label('sex', 'SEXO', ['class' => 'col-md-4 control-label']) !!}
									<div class="col-md-6">
										{!! Form::text('sex', $afiliado->getSex(), ['class'=> 'form-control', 'disabled' => 'disabled']) !!}
										<span class="help-block">Sexo</span>
									</div>
								</div>						
							</div>	
						</div>


						<div class="row text-center">
				            <div class="form-group form-group-lg">
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
	</div>
</div>
@endsection