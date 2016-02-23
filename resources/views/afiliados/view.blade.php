@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel-heading">
                <h3>Cuenta Individual</h3>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">

					<div class="row">
						<div class="col-md-12">
							<h4>Datos Personales</h4>
						</div>
					</div><br/>
					<div class="row">
						<div class="col-md-4">
							<b>Carnet Identidad</b> {!! $afiliado->ci !!} 
						</div>
						<div class="col-md-4">
							<b>Apellidos </b> {!! $afiliado->pat !!} {!! $afiliado->mat !!}
						</div>
						<div class="col-md-4">
							<b>Nombres </b> {!! $afiliado->nom !!} {!! $afiliado->nom2 !!}
						</div>
					</div><br/>

					<div class="row">
						<div class="col-md-4">
							<b>Fecha Nacimiento </b> {!! $afiliado->getFullDateNac() !!}
						</div>
						<div class="col-md-4">
							<b>Estado Civil </b> {!! $afiliado->getCivil() !!}
						</div>
						<div class="col-md-4">
							<b>Sexo </b> {!! $afiliado->getSex() !!}
						</div>
					</div><br/>

					<div class="row">
						<div class="col-md-12">
							<h4>Datos Policiales</h4>
						</div>
					</div><br/>
					<div class="row">
						<div class="col-md-4">
							<b>Fecha de Ingreso </b> {!! $afiliado->getFullDateIng() !!}
						</div>
						<div class="col-md-4">
							<b>Grado </b> {!! $grado->lit !!}
						</div>
						<div class="col-md-4">
							<b>Unidad </b> {!! $lastAporte->uni !!}
						</div>
					</div><br/>

					<div class="row">
						<div class="col-md-4">
							<b>Número de Ítem </b> {!! $lastAporte->item !!}
						</div>
						<div class="col-md-4">
							<b>Matrícula </b> {!! $afiliado->matri !!}
						</div>
						<div class="col-md-4">
						</div>
					</div><br/>

					<div class="row">
						<div class="col-md-12">
							<h4>Reintegro de Haberes</h4>
						</div>
					</div><br/>

							
							<table class="table table-striped table-hover" id="afiliados-table">
		                        <thead>
		                            <tr>
		                                <th>Mes-Año</th>
		                                <th>Niv-Gra</th>
		                                <th>Unid.</th>
		                                <th>Item</th>
										<th>Suel.</th>
										<th>Bo. Anti.</th>
										<th>Bo. Estu.</th>
										<th>Bo. Carg</th>
										<th>Bo. Fron.</th>
										<th>Bo. Orie.</th>
										<th>Bo. Seg. Cui.</th>
										<th>Def.</th>
										<th>Nat.</th>
										<th>Lac.</th>
										<th>Pre.</th>
										<th>Sub.</th>
										<th>Gan.</th>
										<th>Cot.</th>
										<th>Mus</th> 
		                            </tr>
		                        </thead>
		                    </table>

					<div class="row">
						<div class="col-md-3 col-md-offset-8">
							<h3>Totales
							<table class="table" style="width:100%">
								<tr>
									<td><small>Total Ganado</small></td>
									<td style="text-align: right">{{ $totalGanado }}</td>
								</tr>
								<tr>
									<td><small>Total Aporte Muserpol</small></td>
									<td style="text-align: right">{{ $totalMuserpol }}</td>
								</tr>
							</table>
							</h3>
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
	$(function() {
	    $('#afiliados-table').DataTable({
	    	"order": [[ 0, "asc" ]],
	    	"scrollX": true,

	        ajax: {
	            url: '{!! route('getAporte') !!}',
	            data: function (d) {
	                d.id = {{ $afiliado->id }};
	            }
	        },

	        columns: [
	            { data: 'period', name: 'period' },
	            { data: 'nivgra', name: 'nivgra' },
	            { data: 'uni', name: 'uni' },
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
	            
	        ],
	        
	        initComplete: function () {
	            this.api().columns().every(function () {
	                var column = this;
	                var input = document.createElement("input");
	                $(input).appendTo($(column.footer()).empty())
	                .on('change', function () {
	                    column.search($(this).val(), false, false, true).draw();
	                });
	            });
	        }
	    });
	});
</script>
@endpush