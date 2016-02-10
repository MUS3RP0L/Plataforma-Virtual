@extends('master')

@section('content')
<div class="container-fluid" style="margin: 5% 0 0 0;">

  	<div class="row">
    	<div class="col-md-6 col-md-offset-3">
      		<div class="panel panel-primary">
        		<div class="panel-heading"><h4 class="text-center">Plataforma Virtual</h4></div>
        			<div class="panel-body">
          				@if (count($errors) > 0)
            			<div class="alert alert-danger">
							Por favor corrige los siguientes errores:<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

			          {!! Form::open(['url' => 'login', 'role' => 'form', 'class' => 'form-horizontal'])!!}

				            <div class="form-group form-group-lg">
				              	{!! Form::label('email', 'USUARIO', ['class' => 'col-md-4 control-label']) !!}
				              <div class="col-md-6">
				                {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
				                <span class="help-block">Ingrese su Correo Electrónico</span>
				              </div>
				            </div>

				            <div class="form-group form-group-lg">
				                {!! Form::label('password', 'CONTRASEÑA', ['class' => 'col-md-4 control-label']) !!}
				              <div class="col-md-6">
				                {!! Form::password('password', ['class' => 'form-control']) !!}
				                <span class="help-block">Ingrese su Contraseña</span>

				              </div>
				            </div>

				            <div class="form-group form-group-lg">
				              <div class="col-md-2 col-md-offset-8">
				                <button type="submit" class="btn btn-raised btn-primary">Ingresar</button>
				              </div>
				            </div>

			          {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection