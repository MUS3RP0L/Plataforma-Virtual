@extends('layout')

@section('content')
<div class="container-fluid">
    {!! Breadcrumbs::render('editar_tasas_aporte', $gest) !!}
    <div class="row">
        <div class="col-md-12">
	
			{!! Form::model($aporTasaLast, ['method' => 'PATCH', 'route' => ['tasa.update', $aporTasaLast->id], 'class' => 'form-horizontal']) !!}

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
											{!! Form::label('apor_fr_a', 'Fondo de Retiro', ['class' => 'col-md-5 control-label']) !!}
										<div class="col-md-4">
											{!! Form::text('apor_fr_a', $aporTasaLast->apor_fr_a, ['class'=> 'form-control', 'required' => 'required']) !!}
											<span class="help-block">Nuevo Aporte de Fondo de Retiro</span>
										</div>
									</div>
									<div class="form-group form-group-lg">
											{!! Form::label('apor_sv_a', 'Seguro de Vida', ['class' => 'col-md-5 control-label']) !!}
										<div class="col-md-4">
											{!! Form::text('apor_sv_a', $aporTasaLast->apor_sv_a, ['class'=> 'form-control', 'required' => 'required']) !!}
											<span class="help-block">Nuevo Aporte de Seguro de Vida</span>
										</div>
									</div>
									<div class="form-group form-group-lg">
											{!! Form::label('apor_a', 'Total Aporte', ['class' => 'col-md-5 control-label']) !!}
										<div class="col-md-4">
											{!! Form::text('apor_a', $aporTasaLast->apor_a, ['class'=> 'form-control', 'required' => 'required']) !!}
											<span class="help-block">Nuevo Aporte Muserpol </span>
										</div>
									</div><br>
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
											{!! Form::label('apor_fr_p', 'Fondo de Retiro', ['class' => 'col-md-5 control-label']) !!}
										<div class="col-md-4">
											{!! Form::text('apor_fr_p', $aporTasaLast->apor_fr_p, ['class'=> 'form-control', 'required' => 'required']) !!}
											<span class="help-block">Nuevo Aporte de Fondo de Retiro</span>
										</div>
									</div>
									<div class="form-group form-group-lg">
											{!! Form::label('apor_sv_p', 'Seguro de Vida', ['class' => 'col-md-5 control-label']) !!}
										<div class="col-md-4">
											{!! Form::text('apor_sv_p', $aporTasaLast->apor_sv_p, ['class'=> 'form-control', 'required' => 'required']) !!}
											<span class="help-block">Nuevo Aporte de Seguro de Vida</span>
										</div>
									</div>
									<div class="form-group form-group-lg">
											{!! Form::label('apor_p', 'Total Aporte', ['class' => 'col-md-5 control-label']) !!}
										<div class="col-md-4">
											{!! Form::text('apor_p', $aporTasaLast->apor_p, ['class'=> 'form-control', 'required' => 'required']) !!}
											<span class="help-block">Nuevo Aporte Muserpol</span>
										</div>
									</div><br>
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
						<a href="{!! url('tasa') !!}" data-target="#" class="btn btn-raised btn-warning">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;&nbsp;</a>
						&nbsp;&nbsp;<button type="submit" class="btn btn-raised btn-primary">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;</button>
					</div>
	            </div>
        	</div>

			{!! Form::close() !!}

		</div>
	</div>
</div>
@endsection