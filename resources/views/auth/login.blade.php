@extends('layout')

@section('content')
<div class="container-fluid">
  	<div class="row">
    	<div class="col-md-8 col-md-offset-2">
      		<div class="panel panel-default">
        		<div class="panel-heading">Ingreso</div>
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
			              <div class="col-md-6 col-md-offset-4">
			                <div class="checkbox">
			                  <label>
			                    <input type="checkbox" name="remember"> Recordar
			                  </label>
			                </div>
			              </div>
			            </div>

			            <div class="form-group">
			              <div class="col-md-6 col-md-offset-5">
			                <button type="submit" class="btn btn-primary">Ingresar</button>

			                <a class="btn btn-link" href="{!! url('/password/email') !!}">Olvidó su Contraseña?</a>
			              </div>
			            </div>
			          {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection