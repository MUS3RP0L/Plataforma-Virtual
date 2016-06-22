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
				                                <th>Gest</th>
				                                {{-- <th>Niv Gra</th> --}}
				                                <th>Uni</th>
				                                <th>Ite</th>
												<th>Sue</th>
												<th>Bon Ant</th>
												<th>Bon Est</th>
												<th>Bon Car</th>
												<th>Bon Fro</th>
												<th>Bon Ori</th>
												<th>Bon Seg</th>
												<th>Def</th>
												<th>Nat</th>
												<th>Lac</th>
												<th>Pre</th>
												<th>Sub</th>
												<th>Gan</th>
												<th>Cot</th>
												<th>Mus</th> 
												<th>F.R.P</th> 
												<th>S.V.</th> 
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
	    	"scrollX": true,
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
	            { data: 'gest', name: 'gest' },
	            // { data: 'grado_id', name: 'grado_id' },
	            { data: 'unidad_id', name: 'unidad_id' },
	            { data: 'item', name: 'item' },
	            { data: 'sue', name: 'sue' },
	            { data: 'b_ant', name: 'b_ant' },
	            { data: 'b_est', name: 'b_est' },
	            { data: 'b_car', name: 'b_car' },
	            { data: 'b_fro', name: 'b_fro' },
	            { data: 'b_ori', name: 'b_ori' },
	            { data: 'b_seg', name: 'b_seg' },
	            { data: 'dfu', name: 'dfu' },
	            { data: 'nat', name: 'nat' },
	            { data: 'lac', name: 'lac' },
	            { data: 'pre', name: 'pre' },
	            { data: 'sub', name: 'sub' },
	            { data: 'gan', name: 'gan' },
	            { data: 'cot', name: 'cot' },
	            { data: 'mus', name: 'mus' },
	            { data: 'fon', name: 'fon' },
	            { data: 'vid', name: 'vid' },
	            
	        ]
	    });
	});

</script>
@endpush