@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-heading">
                <h3>Reporte del mes de: {!! $mes !!} - {!! $anio !!}</h3>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">

					<div class="row">
						<div class="col-md-4">  
					        <div class="panel panel-default">
					            <div class="jumbotron">
					                <div style="overflow:hidden">
					                    <div class="in-thin">
					                        <p>Total Sueldo</p>
					                    </div>
					                    <div class="in-bold">
											<p>{!! $totalSueldo !!}</p>
					                    </div>
					                </div>
					            </div>
					        </div>
					    </div>
						<div class="col-md-4">  
					        <div class="panel panel-default">
					            <div class="jumbotron">
					                <div style="overflow:hidden">
					                    <div class="in-thin">
					                        <p>Total Antigüedad</p>
					                    </div>
					                    <div class="in-bold">
											<p>{!! $totalAnti !!}</p>
					                    </div>
					                </div>
					            </div>
					        </div>
					    </div>
					    <div class="col-md-4">  
					        <div class="panel panel-default">
					            <div class="jumbotron">
					                <div style="overflow:hidden">
					                    <div class="in-thin">
					                        <p>Total de Bono Estudio</p>
					                    </div>
					                    <div class="in-bold">
											<p>{!! $totalB_est !!}</p>
					                    </div>
					                </div>
					            </div>
					        </div>
					    </div>
					</div>

					<div class="row">
						<div class="col-md-4">  
					        <div class="panel panel-default">
					            <div class="jumbotron">
					                <div style="overflow:hidden">
					                    <div class="in-thin">
					                        <p>Total de Bono Cargo</p>
					                    </div>
					                    <div class="in-bold">
											<p>{!! $totalB_car !!}</p>
					                    </div>
					                </div>
					            </div>
					        </div>
					    </div>
						<div class="col-md-4">  
					        <div class="panel panel-default">
					            <div class="jumbotron">
					                <div style="overflow:hidden">
					                    <div class="in-thin">
					                        <p>Total de Bono Frontera</p>
					                    </div>
					                    <div class="in-bold">
											<p>{!! $totalB_fro !!}</p>
					                    </div>
					                </div>
					            </div>
					        </div>
					    </div>
					    <div class="col-md-4">  
					        <div class="panel panel-default">
					            <div class="jumbotron">
					                <div style="overflow:hidden">
					                    <div class="in-thin">
					                        <p>Total de Bono Oriente</p>
					                    </div>
					                    <div class="in-bold">
											<p>{!! $totalB_ori !!}</p>
					                    </div>
					                </div>
					            </div>
					        </div>
					    </div>
					</div>

					<div class="row">
						<div class="col-md-4">  
					        <div class="panel panel-default">
					            <div class="jumbotron">
					                <div style="overflow:hidden">
					                    <div class="in-thin">
					                        <p>Total de Bono Seguridad Ciudadana</p>
					                    </div>
					                    <div class="in-bold">
											<p>{!! $totalB_seg !!}</p>
					                    </div>
					                </div>
					            </div>
					        </div>
					    </div>
						<div class="col-md-4">  
					        <div class="panel panel-default">
					            <div class="jumbotron">
					                <div style="overflow:hidden">
					                    <div class="in-thin">
					                        <p>Total Ganado</p>
					                    </div>
					                    <div class="in-bold">
											<p>{!! $totalGanado !!}</p>
					                    </div>
					                </div>
					            </div>
					        </div>
					    </div>
					    <div class="col-md-4">  
					        <div class="panel panel-default">
					            <div class="jumbotron">
					                <div style="overflow:hidden">
					                    <div class="in-thin">
					                        <p>Total de Aporte Muserpol</p>
					                    </div>
					                    <div class="in-bold">
											<p>{!! $totalMuserpol !!}</p>
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