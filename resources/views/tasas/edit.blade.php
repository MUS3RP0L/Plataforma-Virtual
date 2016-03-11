@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-heading">
            	<div class="row">  
	             	<div class="col-md-8">
	                    <h4><b>Actualizar Aportes de {!! $date !!}</b></h4>
	                </div>
            	</div>
        	</div>
	
				{!! Form::model($aporTasa, ['method' => 'PATCH', 'route' => ['tasa.update', $aporTasa->id], 'class' => 'form-horizontal']) !!}

		    <div class="row">
		    	
				<div class="col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">SECTOR ACTIVO</h3>
						</div>
						<div class="panel-body" style="font-size: 14px">

							<div class="row">
								<div class="col-md-12">		
									<div class="form-group form-group-lg">
											{!! Form::label('apor_a', 'APORTE MUSERPOL', ['class' => 'col-md-5 control-label']) !!}
										<div class="col-md-4">
											{!! Form::text('apor_a', $aporTasa->apor_a, ['class'=> 'form-control', 'required' => 'required']) !!}
											<span class="help-block">Nuevo Aporte Muserpol </span>
										</div>
									</div>
									<div class="form-group form-group-lg">
											{!! Form::label('apor_fr_a', 'FONDO DE RETIRO', ['class' => 'col-md-5 control-label']) !!}
										<div class="col-md-4">
											{!! Form::text('apor_fr_a', $aporTasa->apor_fr_a, ['class'=> 'form-control', 'required' => 'required']) !!}
											<span class="help-block">Nuevo Aporte de Fondo de Retiro</span>
										</div>
									</div>
									<div class="form-group form-group-lg">
											{!! Form::label('apor_sv_a', 'SEGURO DE VIDA', ['class' => 'col-md-5 control-label']) !!}
										<div class="col-md-4">
											{!! Form::text('apor_sv_a', $aporTasa->apor_sv_a, ['class'=> 'form-control', 'required' => 'required']) !!}
											<span class="help-block">Nuevo Aporte de Seguro de Vida</span>
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
							<h3 class="panel-title">SECTOR PASIVO</h3>
						</div>
						<div class="panel-body" style="font-size: 14px">

							<div class="row">
								<div class="col-md-12">		
									<div class="form-group form-group-lg">
											{!! Form::label('apor_p', 'APORTE MUSERPOL', ['class' => 'col-md-5 control-label']) !!}
										<div class="col-md-4">
											{!! Form::text('apor_p', $aporTasa->apor_p, ['class'=> 'form-control', 'required' => 'required']) !!}
											<span class="help-block">Nuevo Aporte Muserpol</span>
										</div>
									</div>
									<div class="form-group form-group-lg">
											{!! Form::label('apor_fr_p', 'FONDO DE RETIRO', ['class' => 'col-md-5 control-label']) !!}
										<div class="col-md-4">
											{!! Form::text('apor_fr_p', $aporTasa->apor_fr_p, ['class'=> 'form-control', 'required' => 'required']) !!}
											<span class="help-block">Nuevo Aporte de Fondo de Retiro</span>
										</div>
									</div>
									<div class="form-group form-group-lg">
											{!! Form::label('apor_sv_p', 'SEGURO DE VIDA', ['class' => 'col-md-5 control-label']) !!}
										<div class="col-md-4">
											{!! Form::text('apor_sv_p', $aporTasa->apor_sv_p, ['class'=> 'form-control', 'required' => 'required']) !!}
											<span class="help-block">Nuevo Aporte de Seguro de Vida</span>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

				</div>
			</div>

			<div class="row text-center">
	            <div class="form-group form-group">
	              <div class="col-md-12">
	              	<a href="{!! url('tasa') !!}" class="btn btn-raised btn-warning">Cancelar</a>
	                <button type="submit" class="btn btn-raised btn-primary">Aceptar</button>
	              </div>
	            </div>
        	</div>
			{!! Form::close() !!}

		</div>
	</div>
</div>
@endsection