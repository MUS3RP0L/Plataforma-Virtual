@extends('layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel-heading"><h3>Importar Archivo de Aportes</h3></div>
			<div class="panel panel-default">
				<div class="panel-body">

			    	<div class="col-md-10 col-md-offset-1">
					    {!! Form::open(['url' => 'import', 'role' => 'form', 'class' => 'form-horizontal', 'files' => true ])!!}
							<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

							<div class="row">
								<div class="col-md-12">							
									<div class="form-group form-group-lg">
											{!! Form::label('archive', 'ARCHIVO ', ['class' => 'col-md-4 control-label']) !!}
										<div class="col-md-8">
				              				<input type="file" id="inputFile" name="archive">
				              				<input type="text" readonly="" class="form-control " placeholder="Seleccione el Archivo Proporcionado por Comando General...">
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">	
								<div class="row text-center">
						            <div class="form-group form-group-lg">
						              <div class="col-md-12">
					                <button type="submit" class="btn btn-raised btn-primary">Subir</button>
						              </div>
						            </div>
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