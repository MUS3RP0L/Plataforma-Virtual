@extends('layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			@if(!$afiliado->isEmpty())
			<div class="panel panel-default">
				<div class="panel-heading">Despliegue Afiliados</div>
				<div class="panel-body">
					
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>CI</th>
								<th>nombre</th>
							</tr>

						</thead>
						<tbody>
							@foreach($afiliado as $afiliado)
								<tr>
									<th>{{ $afiliado->nom }}</th>
									<th>{{ $afiliado->ci }}</th>
								</tr>
							@endforeach
						</tbody>
					</table>

					{!! $afiliados->render() !!}
				</div>
			</div>
			 @endif
		</div>
	</div>
</div>
@endsection

