@extends('layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading"><h4 class="text-center">Editar Usuario</h4></div>
					<div class="panel-body">

						{!! Form::model($user, ['method' => 'PATCH', 'route' => ['usuario.update', $user->id], 'class' => 'form-horizontal']) !!}

							<div class="form-group form-group-lg">
									{!! Form::label('name', 'NOMBRE', ['class' => 'col-md-4 control-label']) !!}
								<div class="col-md-6">
									{!! Form::text('name', $user->name, ['class'=> 'form-control']) !!}
								</div>
							</div>

							<div class="form-group form-group-lg">
									{!! Form::label('email', 'CORREO ELECTRÓNICO', ['class' => 'col-md-4 control-label']) !!}
								<div class="col-md-6">
									{!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
								</div>
							</div>

							<div class="form-group form-group-lg">
									{!! Form::label('password', 'NUEVA CONTRASEÑA', ['class' => 'col-md-4 control-label']) !!}
								<div class="col-md-6">
									{!! Form::password('password', ['class' => 'form-control']) !!}
								</div>
							</div>

							<div class="form-group form-group-lg">
									{!! Form::label('confirm_password', 'CONFIRMAR CONTRASEÑA', ['class' => 'col-md-4 control-label']) !!}
								<div class="col-md-6">
									{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
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
</div>
@endsection