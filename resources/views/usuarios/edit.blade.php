@extends('layout')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel-heading"><h3>Editar Usuario</h3></div>
			<div class="panel panel-default">
				<div class="panel-body">
					{!! Form::model($user, ['method' => 'PATCH', 'route' => ['usuario.update', $user->id], 'class' => 'form-horizontal']) !!}
						<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

						<div class="row">
							<div class="col-md-6">
								<div class="form-group form-group-lg">
										{!! Form::label('ape', 'APELLIDOS', ['class' => 'col-md-4 control-label']) !!}
									<div class="col-md-6">
										{!! Form::text('ape', $user->ape, ['class'=> 'form-control', 'required' => 'required']) !!}
										<span class="help-block">Apellido paterno y apellido materno</span>
									</div>
								</div>
								<div class="form-group form-group-lg">
										{!! Form::label('nom', 'NOMBRES', ['class' => 'col-md-4 control-label']) !!}
									<div class="col-md-6">
										{!! Form::text('nom', $user->nom, ['class'=> 'form-control', 'required' => 'required']) !!}
										<span class="help-block">Primer y segundo nombre</span>
									</div>
								</div>									
								<div class="form-group form-group-lg">
										{!! Form::label('tel', 'TELÉFONO', ['class' => 'col-md-4 control-label']) !!}
									<div class="col-md-6">
										{!! Form::text('tel', $user->tel, ['class'=> 'form-control', 'required' => 'required']) !!}
										<span class="help-block">Teléfono celular</span>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group form-group-lg">
										{!! Form::label('username', 'NOMBRE USUARIO', ['class' => 'col-md-4 control-label']) !!}
									<div class="col-md-6">
										{!! Form
											::text('username', $user->username, ['class'=> 'form-control', 'required' => 'required']) !!}
											<span class="help-block">Número de Carnet</span>
									</div>
								</div>
								<div class="form-group form-group-lg">
										{!! Form::label('password', 'CONTRASEÑA', ['class' => 'col-md-4 control-label']) !!}
									<div class="col-md-6">
										{!! Form::password('password', ['class' => 'form-control']) !!}
										<span class="help-block">Ingrese la Contraseña</span>
									</div>
								</div>
								<div class="form-group form-group-lg">
										{!! Form::label('confirm_password', 'CONFIRMAR', ['class' => 'col-md-4 control-label']) !!}
									<div class="col-md-6">
										{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
										<span class="help-block">Ingrese de nuevo la contraseña</span>
									</div>
								</div>

					            <div class="form-group form-group">
					              	{!! Form::label('role', 'Tipo', ['class' => 'col-md-4 control-label-lg']) !!}
					              <div class="col-md-6">
					              	{!! Form::select('role', $role, null,['class' => 'form-control'],$user->role) !!}
					                <span class="help-block">Selecione el tipo de usuario</span>
					              </div>
					            </div>								
							</div>	
						</div>


						<div class="row text-center">
				            <div class="form-group form-group-lg">
				              <div class="col-md-12">
				              	<a href="{!! url('usuario') !!}" class="btn btn-raised btn-warning">Cancelar</a>
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