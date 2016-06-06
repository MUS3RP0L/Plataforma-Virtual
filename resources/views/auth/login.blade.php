@extends('master')

@section('content')

<div class="container-fluid">
	
    @if($errors->has())
        <div class="alert alert-warning" role="alert">
           @foreach ($errors->all() as $error)
              <div>{{ $error }}</div>
          @endforeach
        </div>
    @endif

  	<div class="row" style="margin: 6% 0 0 0;">
    	<div class="col-md-6 col-md-offset-3">
      		<div class="panel panel-primary">
        		<div class="panel-heading"><h4 class="text-center">Plataforma Virtual - Mutual de Servicios al Policía</h4></div>
        			<div class="panel-body">

			        	{!! Form::open(['url' => 'login', 'role' => 'form', 'class' => 'form-horizontal']) !!}
				            <br>
				            <div class="form-group">
				              	{!! Form::label('usermane', 'Carnet de Identidad', ['class' => 'col-md-5 control-label']) !!}
				              	<div class="col-md-4">
	                  				{!! Form::text('username', null, ['class' => 'form-control', 'required' => 'required']) !!}
				                	<span class="help-block">Ingrese su número de carnet</span>
				              	</div>
				            </div>

				            <div class="form-group">
				                {!! Form::label('password', 'Contraseña', ['class' => 'col-md-5 control-label']) !!}
				              	<div class="col-md-4">
				                	{!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
				                	<span class="help-block">Ingrese su contraseña</span>
				              	</div>
				            </div>

					        <div class="row text-center">
			                    <div class="form-group">
			                        <div class="col-md-12">
			                            <button type="submit" class="btn btn-raised btn-primary">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;</button>
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