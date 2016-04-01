@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-heading">
                <h3>Reporte</h3>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
					
					{!! Form::open(['url' => 'ir_totales', 'role' => 'form', 'class' => 'form-horizontal']) !!}					
						<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
						
						<div class="row">
							<div class="col-md-10 col-md-offset-1">
{{-- 					            <div class="form-group">
										{!! Form::label('grado_id', 'GRADO', ['class' => 'col-md-4 control-label']) !!}
									<div class="col-md-6">
					              		{!! Form::select('grado_id', $list_grados, '',['class' => 'combobox form-control']) !!}
					                	<span class="help-block"></span>
					                </div>
								</div> --}}

					            <div class="form-group">
					              	{!! Form::label('year', 'Año', ['class' => 'col-md-4 control-label-lg']) !!}
					              <div class="col-md-6">
					              	{!! Form::select('year', $anios, null,['class' => 'combobox form-control']) !!}
					                <span class="help-block">Selecione el año</span>

					              </div>
					            </div>
				            </div>
				        </div>
						<div class="row text-center">
				            <div class="form-group form-group-lg">
				              <div class="col-md-12">
				                <button type="submit" class="btn btn-raised btn-primary">Generar</button>
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

@push('scripts')
<script type="text/javascript">

	  $(document).ready(function(){
	    $('.combobox').combobox();
	  });

</script>
@endpush