@extends('layout')

@section('content')
<div class="container-fluid">
	{!! Breadcrumbs::render('show_contribution', $affiliate) !!}
    <div class="row">
        <div class="col-md-12">
        	<div class="row">  
                <div class="col-md-12 text-right"> 
					<a href="{!! url('affiliate/' . $affiliate->id) !!}" style="margin:-6px 1px 12px;" class="btn btn-raised btn-warning" data-toggle="tooltip" data-placement="top" data-original-title="Atrás">&nbsp;<span class="glyphicon glyphicon-share-alt"></span>&nbsp;</a>
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
									<table class="table table-striped table-hover" id="affiliate-table">
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
				                            	<th class="text-right"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="% Fondo de Retiro">F.R.</div></th>
				                            	<th class="text-right"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title=" % Seguro de Vida">S.V.</div></th>
				                            	<th class="text-right"><div data-toggle="tooltip" data-placement="top" data-container="body" data-original-title="Total Aporte Muserpol">Aporte</div></th>
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
	    $('#affiliate-table').DataTable({
	    	"dom": '<"top">t<"bottom"p>',
	    	"order": [[ 0, "desc" ]],
	        processing: true,
	        serverSide: true,
	        pageLength: 100,
	        bFilter: false,
	        ajax: {
	            url: '{!! route('get_contribution') !!}',
	            data: function (d) {
	                d.affiliate_id = {{ $affiliate->id }};
	            }
	        },
	        columns: [
	            { data: 'month_year' },
	            { data: 'degree_id', "sClass": "text-right", bSortable: false },
	            { data: 'unit_id', "sClass": "text-right", bSortable: false },
	            { data: 'item', "sClass": "text-right", bSortable: false },
	            { data: 'base_wage', "sClass": "text-right", bSortable: false },
	            { data: 'seniority_bonus', "sClass": "text-right", bSortable: false },
	            { data: 'study_bonus', "sClass": "text-right", bSortable: false },
	            { data: 'position_bonus', "sClass": "text-right", bSortable: false },
	            { data: 'border_bonus', "sClass": "text-right", bSortable: false },
	            { data: 'east_bonus', "sClass": "text-right", bSortable: false },
	            { data: 'public_security_bonus', "sClass": "text-right", bSortable: false },
	            { data: 'gain', "sClass": "text-right", bSortable: false },
	            { data: 'quotable', "sClass": "text-right", bSortable: false },
	            { data: 'retirement_fund', "sClass": "text-right", bSortable: false },
	            { data: 'mortuary_quota', "sClass": "text-right", bSortable: false },
	            { data: 'total', "sClass": "text-right", bSortable: false }  
	        ]
	    });
	});

</script>
@endpush