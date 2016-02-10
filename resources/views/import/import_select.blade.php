@extends('layout')
@section('content')

<div class="container-fluid" style="margin: 2% 0 0 0;">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading"><h5 class="text-center">Importar Archivo de Aportes</h5></div>
				<div class="panel-body">
			    	<div class="col-md-10 col-md-offset-1">
					    {!! Form::open(['url' => 'import', 'role' => 'form', 'class' => 'form-horizontal', 'files' => true ])!!}
							
							<div class="form-group is-empty is-fileinput" >
				              <label class="control-label" for="inputFile3">Archivo</label>
				              <input type="file" id="inputFile3" name="image">
				              <input type="text" readonly="" class="form-control " placeholder="Seleccione el Archivo Excel...">

							</div>

				            <div class="form-group form-group-lg">
				                <div class="col-md-2 col-md-offset-8">
				                <button type="submit" class="btn btn-raised btn-primary">Subir</button>
				              </div>
				            </div>

						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection