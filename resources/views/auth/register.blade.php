@extends('layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Registro</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					
					{!! Form::open(['url' => 'register', 'role' => 'form', 'class' => 'form-horizontal'])!!}

						<div class="form-group">
								{!! Form::label('name', 'Nombre', ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-6">
								{!! Form::input('text', 'name', '', ['class'=> 'form-control']) !!}
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
								{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection