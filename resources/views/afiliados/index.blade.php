@extends('layout')

@section('content')
<div class="container-fluid">

        {!! Breadcrumbs::render('afiliado') !!}

    <div class="row">
        <div class="col-md-12">
        
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Búsqueda</h3>
                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-12">

                            <form method="POST" id="search-form" role="form" class="form-inline">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                                {!! Form::label('pat', 'APELLIDO PATERNO', ['class' => 'col-md-4 control-label']) !!}
                                            <div class="col-md-8">
                                                {!! Form::text('pat', '', ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                                <span class="help-block">Escriba el Apellido Paterno</span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                                {!! Form::label('mat', 'APELLIDO MATERNO', ['class' => 'col-md-4 control-label']) !!}
                                            <div class="col-md-8">
                                                {!! Form::text('mat', '', ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                                <span class="help-block">Escriba el Apellido Materno</span>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-4">
                                        <div class="form-group">
                                                {!! Form::label('nom', 'PRIMER NOMBRE', ['class' => 'col-md-4 control-label']) !!}
                                            <div class="col-md-8">
                                                {!! Form::text('nom', '', ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                                <span class="help-block">Escriba el Primer Nombre</span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                                {!! Form::label('nom2', 'SEGUNDO NOMBRE', ['class' => 'col-md-4 control-label']) !!}
                                            <div class="col-md-8">
                                                {!! Form::text('nom2', '', ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                                <span class="help-block">Escriba el Segundo Nombre</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                                {!! Form::label('mat', 'NÚMERO MATRÍCULA', ['class' => 'col-md-4 control-label']) !!}
                                            <div class="col-md-8">
                                                {!! Form::text('mat', '', ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                                <span class="help-block">Escriba el Número de Matrícula</span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                                {!! Form::label('car', 'NÚMERO CARNET', ['class' => 'col-md-4 control-label']) !!}
                                            <div class="col-md-8">
                                                {!! Form::text('car', '', ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                                <span class="help-block">Escriba el Número de Carnet de Identidad</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="reset" class="btn btn-raised btn-warning">Limpiar&nbsp;&nbsp;<span class="glyphicon glyphicon-erase"></span></button>
                                            &nbsp;&nbsp;<button type="submit" class="btn btn-raised btn-primary">&nbsp;&nbsp;Buscar&nbsp;&nbsp;<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>&nbsp;&nbsp;</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>  

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-hover" id="afiliados-table">
                                <thead>
                                    <tr class="success">
                                        {{-- <th>Matrícula</th> --}}
                                        <th>Núm. Carnet</th>
                                        {{-- <th>Grado</th> --}}
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Nombres</th> 
                                        <th>Estado</th>    
                                        <th>Acción</th>
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
@endsection

@push('scripts')
<script>

        var oTable = $('#afiliados-table').DataTable({
        "dom": '<"top">t<"bottom"p>',   
        processing: true,
        serverSide: true,
        ajax: {
            url: '{!! route('getAfiliado') !!}',
            data: function (d) {
                d.pat = $('input[name=pat]').val();
                d.mat = $('input[name=mat]').val();
                d.nom = $('input[name=nom]').val();
                d.nom2 = $('input[name=nom2]').val();
                d.mat = $('input[name=mat]').val();
                d.car = $('input[name=car]').val();
                d.post = $('input[name=post]').val();
            }
        },
        columns: [
            // { data: 'matri', name: 'matri', sWidth: '11%' },
            { data: 'ci', name: 'ci', sWidth: '12%', bSortable: false },
            // { data: 'gra', name: 'gra', sWidth: '12%', bSortable: false },
            { data: 'pat', name: 'pat', sWidth: '15%', bSortable: false },
            { data: 'mat', name: 'mat', sWidth: '15%', bSortable: false },
            { data: 'noms', name: 'noms', sWidth: '15%', bSortable: false },
            { data: 'est', name: 'est', sWidth: '15%', bSortable: false },
            
            { data: 'action', name: 'action', sWidth: '5%', orderable: false, searchable: false, bSortable: false, sClass: "text-center" }
        ]
    });

    $('#search-form').on('submit', function(e) {
        oTable.draw();
        e.preventDefault();
    });

</script>
@endpush
