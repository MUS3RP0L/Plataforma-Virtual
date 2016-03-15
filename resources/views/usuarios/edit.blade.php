@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-heading">
            	<div class="row">  
	             	<div class="col-md-8">
	                    <h4><b>Editar Usuario</b></h4>
	                </div>
            	</div>
        	</div>
			{!! Form::model($user, ['method' => 'PATCH', 'route' => ['usuario.update', $user->id], 'class' => 'form-horizontal']) !!}
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
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
												{!! Form::label('ape', 'APELLIDOS', ['class' => 'col-md-4 control-label']) !!}
											<div class="col-md-6">
												{!! Form::text('ape', $user->ape, ['class'=> 'form-control', 'required' => 'required']) !!}
												<span class="help-block">Apellido Paterno y Apellido Materno</span>
											</div>
										</div>
										<div class="form-group">
												{!! Form::label('nom', 'NOMBRES', ['class' => 'col-md-4 control-label']) !!}
											<div class="col-md-6">
												{!! Form::text('nom', $user->nom, ['class'=> 'form-control', 'required' => 'required']) !!}
												<span class="help-block">Primer y Segundo Nombre</span>
											</div>
										</div>									
										<div class="form-group">
												{!! Form::label('tel', 'TELÉFONO', ['class' => 'col-md-4 control-label']) !!}
											<div class="col-md-6">
												{!! Form::text('tel', $user->tel, ['class'=> 'form-control', 'required' => 'required']) !!}
												<span class="help-block">Teléfono Celular</span>
											</div>
										</div>
									</div>
								</div>							
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Datos Usuario</h3>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
												{!! Form::label('username', 'NOMBRE USUARIO', ['class' => 'col-md-4 control-label']) !!}
											<div class="col-md-6">
												{!! Form
													::text('username', $user->username, ['class'=> 'form-control', 'required' => 'required']) !!}
													<span class="help-block">Número de Carnet</span>
											</div>
										</div>
										<div class="form-group">
												{!! Form::label('password', 'CONTRASEÑA', ['class' => 'col-md-4 control-label']) !!}
											<div class="col-md-6">
												{!! Form::password('password', ['class' => 'form-control']) !!}
												<span class="help-block">Ingrese la Contraseña</span>
											</div>
										</div>
										<div class="form-group">
												{!! Form::label('confirm_password', 'CONFIRMAR', ['class' => 'col-md-4 control-label']) !!}
											<div class="col-md-6">
												{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
												<span class="help-block">Ingrese de nuevo la Contraseña</span>
											</div>
										</div>

							            <div class="form-group">
							              	{!! Form::label('role', 'TIPO', ['class' => 'col-md-4 control-label']) !!}
							              <div class="col-md-6">
							              	{!! Form::select('role', $role, $user->role, ['class' => 'combobox form-control']) !!}
						                	<span class="help-block">Selecione el Tipo de Usuario</span>							                
							              </div>
							            </div>								
									</div>	
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row text-center">
		            <div class="form-group">
						<div class="col-md-12">

							<a href="{!!URL::previous()!!}" data-target="#" class="btn btn-raised btn-warning">Cancelar&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span></a>
							<button type="submit" class="btn btn-raised btn-primary">Guardar&nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></button>
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