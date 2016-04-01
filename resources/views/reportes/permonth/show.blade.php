@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-heading">
               
                <div class="row">  
                    <div class="col-md-8">
                        <h2>Reporte</h2>
                        <h3>Gestión {!! $anio !!}</h3>
                    </div>
                    <div class="col-md-4 text-right"> 
                        {!! link_to(URL::previous(), 'volver', ['class' => 'btn btn-raised btn-warning']) !!}
                    </div>
                </div>

            </div>
            <div class="panel panel-default">
                <div class="panel-body">

					<div class="row">
						<div class="col-md-4">  
					        <div class="panel panel-default">
					            <div class="jumbotron">
					                <div style="overflow:hidden">
					                    <div class="in-thin">
					                        <p>Total de Servidores Públicos Policiales</p>
					                    </div>
					                    <div class="in-bold">
											{{-- <p>{!! $totalRegistros !!}</p> --}}
					                    </div>
					                </div>
					            </div>
					        </div>

					    </div>

					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection