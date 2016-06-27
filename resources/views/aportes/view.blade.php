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
							<h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> Despliegue de Aportes por Planilla</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<table class="table table-striped table-hover" id="afiliados-table">
				                        <thead>
				                            <tr class="success">
				                            	<th class="text-center"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Gestión">Gestión</div></th>
				                            	<th class="text-right"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Grado">Grado</div></th>
				                            	<th class="text-right"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Unidad">Unidad</div></th>
				                            	<th class="text-right"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Ítem">Ítem</div></th>
				                            	<th class="text-right"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Sueldo">Sueldo</div></th>
				                            	<th class="text-right"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Bono Antigüedad">B Antigüedad</div></th>
				                            	<th class="text-right"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Bono Estudio">B Estudio</div></th>
				                            	<th class="text-right"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Bono al Cargo">B al Cargo</div></th>
				                            	<th class="text-right"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Bono Frontera">B Frontera</div></th>
				                            	<th class="text-right"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Bono Oriente">B Oriente</div></th>
				                            	<th class="text-right"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Bono Seguridad Ciudadana">B Seguridad</div></th>
				                            	<th class="text-right"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Total Ganado">Ganado</div></th>
				                            	<th class="text-right"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Total Cotizable">Cotizable</div></th>
				                            	<th class="text-right"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Total Aporte Muserpol">Aporte</div></th>
				                            	<th class="text-right"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="% Fondo de Retiro">F.R.</div></th>
				                            	<th class="text-right"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title=" % Seguro de Vida">S.V.</div></th>
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
	    	"dom": '<"top">t<"bottom"p>',
	    	"order": [[ 0, "desc" ]],
	        processing: true,
	        serverSide: true,
	        pageLength: 100,
	        bFilter: false,
	        ajax: {
	            url: '{!! route('getAporte') !!}',
	            data: function (d) {
	                d.id = {{ $afiliado->id }};
	            }
	        },
	        columns: [
	            { data: 'gest' },
	            { data: 'grado_id', "sClass": "text-right", bSortable: false },
	            { data: 'unidad_id', "sClass": "text-right", bSortable: false },
	            { data: 'item', "sClass": "text-right", bSortable: false },
	            { data: 'sue', "sClass": "text-right", bSortable: false },
	            { data: 'b_ant', "sClass": "text-right", bSortable: false },
	            { data: 'b_est', "sClass": "text-right", bSortable: false },
	            { data: 'b_car', "sClass": "text-right", bSortable: false },
	            { data: 'b_fro', "sClass": "text-right", bSortable: false },
	            { data: 'b_ori', "sClass": "text-right", bSortable: false },
	            { data: 'b_seg', "sClass": "text-right", bSortable: false },
	            { data: 'gan', "sClass": "text-right", bSortable: false },
	            { data: 'cot', "sClass": "text-right", bSortable: false },
	            { data: 'mus', "sClass": "text-right", bSortable: false },
	            { data: 'fr', "sClass": "text-right", bSortable: false },
	            { data: 'sv', "sClass": "text-right", bSortable: false }  
	        ]
	    });
	});

</script>
@endpush