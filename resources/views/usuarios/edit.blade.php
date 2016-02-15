@extends('layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading"><h4 class="text-center">Editar Usuario</h4></div>
					<div class="panel-body">

						{!! Form::model($user, ['method' => 'PATCH', 'route' => ['usuario.update', $user->id]]) !!}

							<div class="form-group">
									{!! Form::label('name', 'Nombre', ['class' => 'col-md-4 control-label']) !!}
								<div class="col-md-6">
									{!! Form::text('name', old('name'), ['class'=> 'form-control']) !!}
								</div>
							</div>

							<div class="form-group">
									{!! Form::label('email', 'Correo', ['class' => 'col-md-4 control-label']) !!}
								<div class="col-md-6">
									{!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
								</div>
							</div>

							<div class="form-group">
									{!! Form::label('password', 'Contraseña', ['class' => 'col-md-4 control-label']) !!}
								<div class="col-md-6">
									{!! Form::password('password', ['class' => 'form-control']) !!}
								</div>
							</div>

							<div class="form-group">
									{!! Form::label('confirm_password', 'Confirmar Contraseña', ['class' => 'col-md-4 control-label']) !!}
								<div class="col-md-6">
									{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									{!! Form::submit('Aceptar', ['class' => 'btn btn-primary']) !!}
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