@extends('layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading"><h4 class="text-center">Reporte de Planillas</h4></div>
				<div class="panel-body">
					
					{!! Form::open(['url' => 'ir_totales', 'role' => 'form', 'class' => 'form-horizontal']) !!}					
						<div class="row">
				            <div class="form-group form-group col-md-6">
				              	{!! Form::label('mes', 'Mes', ['class' => 'col-md-4 control-label-lg']) !!}
				              <div class="col-md-6">
				              	{!! Form::select('mes', $meses, null,['class' => 'form-control']) !!}
				                <span class="help-block">Selecione el mes</span>
				              </div>
				            </div>

				            <div class="form-group form-group col-md-6">
				              	{!! Form::label('mes', 'Año', ['class' => 'col-md-4 control-label-lg']) !!}
				              <div class="col-md-6">
				              	{!! Form::select('anio', $anios, null,['class' => 'form-control']) !!}
				                <span class="help-block">Selecione el año</span>

				              </div>
				            </div>
				        </div>
						<div class="row text-center">
				            <div class="form-group form-group-lg">
				              <div class="col-md-12">
				                <button type="submit" class="btn btn-raised btn-primary">Buscar</button>
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