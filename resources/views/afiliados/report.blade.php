@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        	
        	<div class="row">  
             	<div class="col-md-8">
                    <h4><b>{!! $grado->lit !!}</b></h4><h3>{!! $afiliado->pat !!} {!! $afiliado->mat !!}  {!! $afiliado->nom !!} {!! $afiliado->nom2 !!} {!! $afiliado->ap_esp !!}</h3>
                </div>
                <div class="col-md-4 text-right"> 
					<a href="{!! url('afiliado/' . $afiliado->id) !!}" class="btn btn-raised btn-warning">Volver</a>
                </div>
        	</div>

		    <div class="row">
		        <div class="col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Información Personal</h3>
						</div>
						<div class="panel-body" style="font-size: 16px">
							<div class="row"><p>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>Carnet Identidad</b>
										</div>
										<div class="col-md-6">
											 {!! $afiliado->ci !!} 
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>Fecha Nacimiento</b>
										</div>
										<div class="col-md-6">
											 {!! $afiliado->getFullDateNac() !!}
										</div>
									</div>
								</div></p>
							</div>
							<div class="row"><p>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>Apellido Paterno</b>
										</div>
										<div class="col-md-6">
											 {!! $afiliado->pat !!}
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>Apellido Materno</b>
										</div>
										<div class="col-md-6">
											 {!! $afiliado->mat !!}
										</div>
									</div>
								</div></p>
							</div>
							<div class="row"><p>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>1er Nombre</b>
										</div>
										<div class="col-md-6">
											 {!! $afiliado->nom !!}
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>2do Nombre</b>
										</div>
										<div class="col-md-6">
											 {!! $afiliado->nom2 !!}
										</div>
									</div>
								</div></p>
							</div>
							@if ($afiliado->ap_esp)
							<div class="row"><p>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>Apellido Esposo</b>
										</div>
										<div class="col-md-6">
											 {!! $afiliado->ap_esp !!}
										</div>
									</div>
								</div></p>
							</div>
							@endif
							<div class="row"><p>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>Estado Civil</b>
										</div>
										<div class="col-md-6">
											 {!! $afiliado->getCivil() !!}
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>Sexo</b>
										</div>
										<div class="col-md-6">
											 {!! $afiliado->getSex() !!}
										</div>
									</div>
								</div></p>
							</div>
						</div>
					</div>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Información Policial</h3>
						</div>
						<div class="panel-body" style="font-size: 16px">
							<div class="row"><p >
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>Unidad</b>
										</div>
										<div class="col-md-6">
											{!! $unidad->lit !!}
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>Grado</b>
										</div>
										<div class="col-md-6">
											 {!! $grado->lit !!}
										</div>
									</div>
								</div></p>
							</div>
							<div class="row"><p>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>Número de Ítem</b>
										</div>
										<div class="col-md-6">
											{!! $lastAporte->item !!}
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>Matrícula</b>
										</div>
										<div class="col-md-6">
											{!! $afiliado->matri !!}
										</div>
									</div>
								</div></p>
							</div>
							<div class="row"><p>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-6">
											<b>Fecha Ingreso</b>
										</div>
										<div class="col-md-6">
											{!! $afiliado->getFullDateIng() !!}
										</div>
									</div>
								</div></p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading">						
							<div class="row">
								<div class="col-md-6">
									<h3 class="panel-title">Totales Fondo de Retiro</h3>
								</div>
								<div class="col-md-6">
									<h3 class="panel-title"style="text-align: right">Bolivianos</h3>
								</div>
							</div>
						</div>
						<div class="panel-body">
							<div class="row"><p>
								<div class="col-md-12">
									<table class="table" style="width:100%;font-size: 16px">
										<tr>
											<td>Total Aporte de Fondo de Retiro</td>
											<td style="text-align: right">{{ $totalFon }}</td>
										</tr>
										<tr>
											<td>Total Garantía de Fondo de Retiro</td>
											<td style="text-align: right">{!! Form::text('garan', '') !!}</td>
										</tr>
										<tr>
											<td>Total Movimiento de Fondo de Retiro</td>
											<td style="text-align: right">{{ $totalFon }}</td>
										</tr>
										<tr>
											<td>Rendimiento Obtenido por Inversión de Prestamos</td>
											<td style="text-align: right">{!! Form::text('rendi', '') !!}</td>
										</tr>
										<tr>
											<td>Total Movimientos de Fondo de Retiro</td>
											<td style="text-align: right">{{ $totalFon }}</td>
										</tr>
									</table>
									<div class="row text-center">
							            <div class="form-group-lg">
							              <div class="col-md-12">
							                <button type="submit" class="btn btn-raised btn-primary">Actualizar</button>
							              </div>
							            </div>
						        	</div>
								</div>
							</div>					
						</div>

					</div>

					<div class="panel panel-primary">
						<div class="panel-heading">						
							<div class="row">
								<div class="col-md-6">
									<h3 class="panel-title">Totales Seguro de Vida</h3>
								</div>
								<div class="col-md-6">
									<h3 class="panel-title"style="text-align: right">Bolivianos</h3>
								</div>
							</div>
						</div>
						<div class="panel-body">
							<div class="row"><p>
								<div class="col-md-12">
									<table class="table" style="width:100%;font-size: 16px">
										<tr>
											<td>Total Movimiento de Fondo de Retiro</td>
											<td style="text-align: right">{{ $totalSegVid }}</td>
										</tr>
									</table>
								</div>
							</div>					
						</div>
					</div>

					<div class="panel panel-primary">
						<div class="panel-heading">						
							<div class="row">
								<div class="col-md-6">
									<h3 class="panel-title">Modalidad de Pago Único</h3>
								</div>
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									
								      <div class="col-md-10">
								        <div class="radio radio-primary">
								          <label>
								            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
								            Jubilación
								          </label>
								        </div>
								        <div class="radio radio-primary">
								          <label>
								            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
								            Fallecimiento del Titular
								          </label>
								        </div>
								        <div class="radio radio-primary">
								          <label>
								            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
								            Retiro Forzoso
								          </label>
								        </div>
								        <div class="radio radio-primary">
								          <label>
								            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
								            Retiro Voluntario
								          </label>
								        </div>
								      </div>
									    <div class="row text-center">
								            <div class="form-group-lg">
								              <div class="col-md-12">
								                <button type="submit" class="btn btn-raised btn-primary">Actualizar</button>
								              </div>
								            </div>
							        	</div>
								</div>
							</div>					
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Información General</h3>
						</div>
						<div class="panel-body">
						
							<div class="row">
								<div class="col-md-12">
									
									<table class="table table-striped table-hover ">
									  <thead>
									  <tr>
									    <th>Empleador</th>
									    <th>Período de Cotización</th>
									    <th>Total Ganado</th>
									    <th>Total Cotización</th>
									    <th>Total Cotización Adicional</th>
									    <th>Total Aporte F.R.P.</th>
									    <th>Total Aporte S.V.</th>
									    <th>Total Muserpol</th>
									  </tr>
									  </thead>
									  <tbody>
									  <tr>
									    <td>{!! $unidad->lit !!}</td>
									    <td>{!! $firstAporte->desde !!} a {!! $lastAporte->hasta !!}</td>
									    <td>{{ $totalGanado }}</td>
									    <td>{{ $totalCotizable }}</td>
									    <td>0.00</td>
									    <td>{{ $totalFon }}</td>
									    <td>{{ $totalSegVid }}</td>
									    <td>{{ $totalMuserpol }}</td>
									    
									  </tr>
									 
									  
									  </tbody>
									</table>
									

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