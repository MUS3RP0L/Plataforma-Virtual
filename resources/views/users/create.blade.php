@extends('layout')

@section('content')
<div class="container-fluid">
	{!! Breadcrumbs::render('create_user') !!}
    <div class="row">
        <div class="col-md-12">

			{!! Form::open(['method' => 'POST', 'route' => ['user.store'], 'class' => 'form-horizontal']) !!}
			    
			    <div class="row">
			        <div class="col-md-6">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Datos Personales</h3>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
												{!! Form::label('first_name', 'Nombres', ['class' => 'col-md-4 control-label']) !!}
											<div class="col-md-6">
												{!! Form::text('first_name', null, ['class'=> 'form-control', 'required' => 'required', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
												<span class="help-block">Primer y Segundo Nombre</span>
											</div>
										</div>	
										<div class="form-group">
												{!! Form::label('last_name', 'Apellidos', ['class' => 'col-md-4 control-label']) !!}
											<div class="col-md-6">
												{!! Form::text('last_name', null, ['class'=> 'form-control', 'required' => 'required', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
												<span class="help-block">Apellido Paterno y Apellido Materno</span>
											</div>
										</div>								
										<div class="form-group">
												{!! Form::label('phone', 'Núm de Teléfono', ['class' => 'col-md-4 control-label']) !!}
											<div class="col-md-6">
												{!! Form::text('phone', null, ['class'=> 'form-control', 'required' => 'required']) !!}
												<span class="help-block">Teléfono Celular</span>
											</div>
										</div>
										<div class="form-group"><br><br></div>
									</div>
								</div>							
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Datos de Ingreso</h3>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
												{!! Form::label('username', 'Carnet de Indentidad', ['class' => 'col-md-4 control-label']) !!}
											<div class="col-md-6">
												{!! Form::text('username', null, ['class'=> 'form-control', 'required' => 'required', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
													<span class="help-block">Número de Carnet de Identidad</span>
											</div>
										</div>
										<div class="form-group">
												{!! Form::label('password', 'Contraseña', ['class' => 'col-md-4 control-label']) !!}
											<div class="col-md-6">
												{!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
												<span class="help-block">Ingrese la Contraseña</span>
											</div>
										</div>
										<div class="form-group">
												{!! Form::label('confirm_password', 'Repetir Contraseña', ['class' => 'col-md-4 control-label']) !!}
											<div class="col-md-6">
												{!! Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required']) !!}
												<span class="help-block">Ingrese de nuevo la Contraseña</span>
											</div>
										</div>

							            <div class="form-group">
							              	{!! Form::label('role', 'Tipo de Usuario', ['class' => 'col-md-4 control-label']) !!}
							              <div class="col-md-6">
							              	{!! Form::select('role', $list_roles, null, ['class' => 'combobox form-control', 'required' => 'required']) !!}
						                	<span class="help-block">Selecione el Tipo de Usuario</span>							                
							              </div>
							            </div>								
									</div>	
								</div>
							</div>
						</div>
					</div>
				</div>
				<br><br>

				<div class="row text-center">
		            <div class="form-group">
						<div class="col-md-12">
							<a href="{!! url('usuario') !!}" data-target="#" class="btn btn-raised btn-warning">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;&nbsp;</a>
							&nbsp;&nbsp;<button type="submit" class="btn btn-raised btn-success">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;</button>
						</div>
		            </div>
	        	</div>

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection

@push('scripts')

<script type="text/javascript">

	  $(document).ready(function(){

	  	$('.combobox').combobox();

	  });

</script>

@endpush