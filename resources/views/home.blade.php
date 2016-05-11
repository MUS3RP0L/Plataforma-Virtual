@extends('layout')

@section('content')
<div class="container-fluid">
	
	{!! Breadcrumbs::render('home') !!}

	<div class="col-md-10 col-md-offset-1">

		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-default">
				  <div class="panel-body" style="font-size: 26px;">
				    <div>
         				Afiliados en Servicio<br>
         				{!! $totalAfiServ !!}
        			</div>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
				  <div class="panel-body" style="font-size: 26px;">
				    <div>
         				Afiliados en Comisión<br>
         				{!! $totalAfiComi !!}
        			</div>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
				  <div class="panel-body" style="font-size: 26px;">
				    <div>
         				Total de Afiliados<br>
         				{!! $totalAfi !!}
        			</div>
				  </div>
				</div>
			</div>
		</div>

	  	<div class="row">
			<div class="col-md-8">
					<div class="panel panel-primary">
						<div class="panel-heading">Actividades</div>

						<div class="panel-body">
							<ul class="panel-body list-group">
						      @foreach ($activities as $activity)
						        <li class="list-group-item">
						          <span style="color:#888;font-style:italic">{!! $activity->created_at !!}:</span>
						          {!! $activity->message !!}
						        </li>
						      @endforeach
						      </ul>
						</div>
					</div>
				</div>
			
		</div>
	</div>
</div>
@endsection