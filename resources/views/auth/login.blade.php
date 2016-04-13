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
        		<div class="panel-heading"><h4 class="text-center">Plataforma Virtual Muserpol</h4></div>
        			<div class="panel-body">

			        	{!! Form::open(['url' => 'login', 'role' => 'form', 'class' => 'form-horizontal'])!!}
							<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

				            <div class="form-group form-group-lg">
				              	{!! Form::label('usermane', 'USUARIO', ['class' => 'col-md-4 control-label']) !!}
				              	<div class="col-md-6">
	                  				{!! Form::text('username', null, ['class' => 'form-control', 'required' => 'required']) !!}
				                	<span class="help-block">Ingrese su Número de Carnet</span>
				              	</div>
				            </div>

				            <div class="form-group form-group-lg">
				                {!! Form::label('password', 'CONTRASEÑA', ['class' => 'col-md-4 control-label']) !!}
				              	<div class="col-md-6">
				                	{!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
				                	<span class="help-block">Ingrese su Contraseña</span>
				              	</div>
				            </div>

							<div class="row text-center">
					            <div class="form-group form-group-lg">
					              <div class="col-md-12">
					                <button type="submit" class="btn btn-raised btn-primary">Ingresar</button>
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