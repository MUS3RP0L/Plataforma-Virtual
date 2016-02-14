@extends('layout')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Inicio</div>

				<div class="panel-body">
					
					    {!! Form::open(['url' => 'ir_totales', 'role' => 'form', 'class' => 'form-horizontal', 'files' => true ]);!!}					

				              	{!! Form::label('email', 'Mes', ['class' => 'col-md-4 control-label']) !!}

				              	{!! Form::select('mes', $anios, null,['class' => 'form-control']) !!}
				              	
				              	{!! Form::select('mes', $meses, null,['class' => 'form-control']) !!}

					 <button type="submit" class="btn btn-default">Buscar</button>
					{!! Form::close() !!}

				</div>
			</div>
		</div>
	</div>
</div>
@endsection