@extends('layout')

@section('content')
<div class="container-fluid">
	{!! Breadcrumbs::render('aportes_afiliado', $afiliado) !!}
    <div class="row">
        <div class="col-md-12">

        	<div class="row">  
                <div class="col-md-12 text-right"> 
					<a href="{!! url('afiliado/' . $afiliado->id) !!}" style="margin:-6px 1px 12px;" class="btn btn-raised btn-warning" data-toggle="tooltip" data-placement="top" data-original-title="Atrás">
                        &nbsp;&nbsp;<span class="glyphicon glyphicon-share-alt"></span>&nbsp;&nbsp;
                    </a>
                </div>
        	</div>

			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Despliegue</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-2">
											<b>desde</b>
										</div>
										<div class="col-md-3">
											 {!! $firstAporte->desde !!} 
										</div>
										<div class="col-md-2">
											<b>hasta</b>
										</div>
										<div class="col-md-3">
											 {!! $lastAporte->hasta !!} 
										</div>
									</div>
								</div>
							</div><br>
							<div class="row">
								<div class="col-md-12">
									<table class="table table-striped table-hover" id="afiliados-table">
				                        <thead>
				                            <tr class="success">
				                            	<th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Gestión">Ges</div></th>
				                            	<th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Grado">Gra</div></th>
				                            	<th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Unidad">Uni</div></th>
				                            	<th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Ítem">Ite</div></th>
				                            	<th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Sueldo">Sue</div></th>
				                            	<th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Bono Antigüedad">Ant</div></th>
				                            	<th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Bono Estudio">Est</div></th>
				                            	<th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Bono al Cargo">Car</div></th>
				                            	<th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Bono Frontera">Fro</div></th>
				                            	<th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Bono Oriente">Ori</div></th>
				                            	<th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Bono Seguridad Ciudadana">Seg</div></th>
				                            	<th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Total Ganado">Gan</div></th>
				                            	<th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Cotizable">Cot</div></th>
				                            	<th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Aporte Muserpol">Mus</div></th>
				                            	<th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Fondo de Retiro">F.R.</div></th>
				                            	<th><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Seguro de Vida">S.V.</div></th>
				                            </tr>
				                        </thead>
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

@push('scripts')
<script>

	$(document).ready(function(){
	    $('[data-toggle="tooltip"]').tooltip(); 
	});

	$(function() {
	    $('#afiliados-table').DataTable({
	    	"dom": '<"top">t<"bottom"lp>',
	    	"order": [[ 0, "desc" ]],
	        processing: true,
	        serverSide: true,
	        pageLength: 50,
	        bFilter: false,
	        ajax: {
	            url: '{!! route('getAporte') !!}',
	            data: function (d) {
	                d.id = {{ $afiliado->id }};
	            }
	        },
	        columns: [
	            { data: 'gest' },
	            { data: 'grado_id' },
	            { data: 'unidad_id' },
	            { data: 'item' },
	            { data: 'sue', },
	            { data: 'b_ant' },
	            { data: 'b_est' },
	            { data: 'b_car' },
	            { data: 'b_fro' },
	            { data: 'b_ori' },
	            { data: 'b_seg' },
	            { data: 'gan' },
	            { data: 'cot' },
	            { data: 'mus' },
	            { data: 'fr' },
	            { data: 'sv' } 
	        ]
	    });
	});

</script>
@endpush