@extends('layout')

@section('content')
<div class="container-fluid">
     {!! Breadcrumbs::render('monthly_reports') !!}
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Reporte por Mes</h3>
                </div>
                <div class="panel-body">
					{!! Form::open(['url' => 'monthly_report', 'role' => 'form', 'class' => 'form-horizontal']) !!}
						<div class="row">
							<div class="col-md-6">
								<div class="form-group form-group-lg">
                                        {!! Form::label('year', 'AÑO', ['class' => 'col-md-3 control-label']) !!}
                                    <div class="col-md-9">
                                        {!! Form::select('year', $years_list, $year, ['class' => 'combobox form-control', 'required' => 'required']) !!}
                                        <span class="help-block">Seleccione el Año</span>
                                    </div>
                                </div>
							</div>
							<div class="col-md-6">
					        	<div class="form-group form-group-lg">
                                        {!! Form::label('month', 'MES', ['class' => 'col-md-3 control-label']) !!}
                                    <div class="col-md-9">
                                        {!! Form::select('month', $months_list, $month, ['class' => 'combobox form-control', 'required' => 'required']) !!}
                                        <span class="help-block">Seleccione el Mes</span>
                                    </div>
                            	</div>
                            </div>
						</div>

						<div class="row text-center">
                            <div class="form-group form-group">
                              <div class="col-md-12">
                                <button type="submit" class="btn btn-raised btn-primary">Generar</button>
                              </div>
                            </div>
                       	</div>

					{!! Form::close() !!}

				</div>

			</div>
			@if($result)
			<div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="panel-title">Totales</h3>
                        </div>
                        <div class="col-md-6">
                            <h3 class="panel-title"style="text-align: right">Bolivianos</h3>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover" style="width:100%;font-size: 14px">
                                <tr class="success">
                                    <th></th>
                                    <th>Comando</th>
                                    <th>Batallón</th>
                                    <th>Totales</th>
                                </tr>
                                <tr>
                                    <th>Total de Registros</th>
                                    <td style="text-align: right">{{ $totalC }}</td>
                                    <td style="text-align: right">{{ $totalB }}</td>
                                    <td style="text-align: right">{{ $total }}</td>
                                </tr>
                                <tr>
                                    <th>Sueldo</th>
                                    <td style="text-align: right">{{ $totalSueldoC }}</td>
                                    <td style="text-align: right">{{ $totalSueldoB }}</td>
                                    <td style="text-align: right">{{ $totalSueldo }}</td>
                                </tr>
                                <tr>
                                    <th>Bono Antigüedad</th>
                                    <td style="text-align: right">{{ $totalAntiC }}</td>
                                    <td style="text-align: right">{{ $totalAntiB }}</td>
                                    <td style="text-align: right">{{ $totalAnti }}</td>
                                </tr>
                                <tr>
                                    <th>Bono Estudio</th>
                                    <td style="text-align: right">{{ $totalB_estC }}</td>
                                    <td style="text-align: right">{{ $totalB_estB }}</td>
                                    <td style="text-align: right">{{ $totalB_est }}</td>
                                </tr>
                                <tr>
                                    <th>Bono Cargo</th>
                                    <td style="text-align: right">{{ $totalB_carC }}</td>
                                    <td style="text-align: right">{{ $totalB_carB }}</td>
                                    <td style="text-align: right">{{ $totalB_car }}</td>
                                </tr>
                               	<tr>
                                    <th>Bono Frontera</th>
                                    <td style="text-align: right">{{ $totalB_froC }}</td>
                                    <td style="text-align: right">{{ $totalB_froB }}</td>
                                    <td style="text-align: right">{{ $totalB_fro }}</td>
                                </tr>
                                <tr>
                                    <th>Bono Oriente</th>
                                    <td style="text-align: right">{{ $totalB_oriC }}</td>
                                    <td style="text-align: right">{{ $totalB_oriB }}</td>
                                    <td style="text-align: right">{{ $totalB_ori }}</td>
                                </tr>
                                <tr>
                                    <th>Bono Seguridad Ciudadana</th>
                                    <td style="text-align: right">{{ $totalB_segC }}</td>
                                    <td style="text-align: right">{{ $totalB_segB }}</td>
                                    <td style="text-align: right">{{ $totalB_seg }}</td>
                                </tr>
                                <tr>
                                    <th>Ganancia</th>
                                    <td style="text-align: right">{{ $totalGanadoC }}</td>
                                    <td style="text-align: right">{{ $totalGanadoB }}</td>
                                    <td style="text-align: right">{{ $totalGanado }}</td>
                                </tr>
                               	<tr>
                                    <th>Cotizable</th>
                                    <td style="text-align: right">{{ $totalCotiC }}</td>
                                    <td style="text-align: right">{{ $totalCotiB }}</td>
                                    <td style="text-align: right">{{ $totalCoti }}</td>
                                </tr>
                                <tr>
                                    <th>Fondo de Retiro</th>
                                    <td style="text-align: right">{{ $totalFrC }}</td>
                                    <td style="text-align: right">{{ $totalFrB }}</td>
                                    <td style="text-align: right">{{ $totalFr }}</td>
                                </tr>
                                <tr>
                                    <th>Seguro de Vida</th>
                                    <td style="text-align: right">{{ $totalSvC }}</td>
                                    <td style="text-align: right">{{ $totalSvB }}</td>
                                    <td style="text-align: right">{{ $totalSv }}</td>
                                </tr>
                                <tr class="active">
                                    <th>Aporte Muserpol</th>
                                    <td style="text-align: right">{{ $totalMuserpolC }}</td>
                                    <td style="text-align: right">{{ $totalMuserpolB }}</td>
                                    <td style="text-align: right">{{ $totalMuserpol }}</td>
                                </tr>
                            </table>

                        </div>

                    </div>

                </div>
            </div>
            @endif
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
