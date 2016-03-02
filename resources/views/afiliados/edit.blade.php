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
							<h3 class="panel-title">Información Personal</h3>
						</div>
						<div class="panel-body" style="font-size: 16px">
							<div class="row">
								<div class="col-md-6">
									

									<div class="form-group form-group-lg">
											{!! Form::label('ci', 'CARNET IDENTIDAD', ['class' => 'col-md-4 control-label']) !!}
										<div class="col-md-8">
											{!! Form::text('ci', $afiliado->ci, ['class'=> 'form-control', 'disabled' => '']) !!}
										</div>
									</div>
									<div class="form-group form-group-lg">
											{!! Form::label('pat', 'APELLIDO PATERNO', ['class' => 'col-md-4 control-label']) !!}
										<div class="col-md-8">
											{!! Form::text('pat', $afiliado->pat, ['class'=> 'form-control', 'required' => 'required']) !!}
											<span class="help-block">Apellido paterno</span>
										</div>
									</div>									
									<div class="form-group form-group-lg">
											{!! Form::label('nom', 'PRIMER NOMBRE', ['class' => 'col-md-4 control-label']) !!}
										<div class="col-md-8">
											{!! Form::text('nom', $afiliado->nom, ['class'=> 'form-control', 'required' => 'required']) !!}
											<span class="help-block">Primer nombre</span>
										</div>
									</div>
									<div class="form-group form-group-lg">
											{!! Form::label('est_civ', 'ESTADO CIVIL', ['class' => 'col-md-4 control-label']) !!}
										<div class="col-md-8">
											{!! Form::text('est_civ', $afiliado->getCivil(), ['class'=> 'form-control', 'required' => 'required']) !!}
											<span class="help-block">Estado civil</span>
										</div>
									</div>

									<div class="form-group form-group-lg">
											{!! Form::label('ap_esp', 'APELLIDO ESPOSO', ['class' => 'col-md-4 control-label']) !!}
										<div class="col-md-8">
											{!! Form::text('ap_esp', $afiliado->ap_esp, ['class'=> 'form-control', 'required' => 'required']) !!}
											<span class="help-block">Apellido esposo (Opcional)</span>
										</div>
									</div>

								</div>
								<div class="col-md-6">
									<div class="form-group form-group-lg">
											{!! Form::label('fech_nac', 'FECHA NACIMIENTO', ['class' => 'col-md-4 control-label']) !!}
										<div class="col-md-8">
											{!! Form::text('fech_nac', $afiliado->getFullDateNac(), ['class'=> 'form-control', 'disabled' => '']) !!}
										</div>
									</div>
									<div class="form-group form-group-lg">
											{!! Form::label('mat', 'APELLIDO MATERNO', ['class' => 'col-md-4 control-label']) !!}
										<div class="col-md-8">
											{!! Form::text('mat', $afiliado->mat, ['class'=> 'form-control', 'required' => 'required']) !!}
											<span class="help-block">Apellido Materno</span>
										</div>
									</div>
									<div class="form-group form-group-lg">
											{!! Form::label('nom2', 'SEGUNDO NOMBRE', ['class' => 'col-md-4 control-label']) !!}
										<div class="col-md-8">
											{!! Form::text('nom2', $afiliado->nom2, ['class'=> 'form-control', 'required' => 'required']) !!}
											<span class="help-block">Segundo nombre</span>
										</div>
									</div>
									<div class="form-group form-group-lg">
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
@endsection