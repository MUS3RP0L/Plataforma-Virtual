@extends('layout')

@section('content')
<div class="container-fluid">

	<div class="col-md-10 col-md-offset-1">

		<div class="row">  
	        <div class="col-md-6">
	            <h3>Inicio</h3>
	        </div>
	    </div>

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
		</div>

	  	<div class="row">
			<div class="col-md-8">
					<div class="panel panel-primary">
						<div class="panel-heading">Reporte</div>

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
			<div class="col-md-4">
			 	<div class="panel panel-primary">
			        <div class="panel-heading">
			            <div class="row">  
			                <div class="col-md-11">
			                    <h3 class="panel-title">Total de Afiliados</h3>
			                </div>
			                <div class="col-md-1 text-right" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
			                    <div data-toggle="modal" data-target="#myModal-personal"> 
			                        <span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span>
			                    </div>
			                </div>
			            </div>
			        </div>
			        <div class="panel-body" style="font-size: 14px">
						totales
			        </div>
			    </div>
			</div>
		</div>
	</div>
</div>
@endsection