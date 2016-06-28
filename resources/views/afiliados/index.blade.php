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
                            <form method="POST" id="search-form" role="form">
                                <div class="row"><br>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('nom', 'Primer Nombre', ['class' => 'col-md-5 control-label']) !!}
                                            <div class="col-md-7">
                                                {!! Form::text('nom', '', ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                                <span class="help-block">Escriba el Primer Nombre</span>
                                            </div>
                                        </div>
                                    </div>                       
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('nom2', 'Segundo Nombre', ['class' => 'col-md-5 control-label']) !!}
                                            <div class="col-md-7">
                                                {!! Form::text('nom2', '', ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                                <span class="help-block">Escriba el Segundo Nombre</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('car', 'Número Carnet', ['class' => 'col-md-5 control-label']) !!}
                                            <div class="col-md-7">
                                                {!! Form::text('car', '', ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                                <span class="help-block">Escriba el Número de Carnet de Identidad</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('pat', 'Apellido Paterno', ['class' => 'col-md-5 control-label']) !!}
                                            <div class="col-md-7">
                                                {!! Form::text('pat', '', ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                                <span class="help-block">Escriba el Apellido Paterno</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('mat', 'Apellido Materno', ['class' => 'col-md-5 control-label']) !!}
                                            <div class="col-md-7">
                                                {!! Form::text('mat', '', ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                                <span class="help-block">Escriba el Apellido Materno</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('matri', 'Número Matrícula', ['class' => 'col-md-5 control-label']) !!}
                                            <div class="col-md-7">
                                                {!! Form::text('matri', '', ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                                <span class="help-block">Escriba el Número de Matrícula</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row text-center">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="reset" class="btn btn-raised btn-warning" data-toggle="tooltip" data-placement="bottom" data-original-title="Limpiar">&nbsp;<span class="glyphicon glyphicon-erase"></span>&nbsp;</button>
                                            &nbsp;&nbsp;<button type="submit" class="btn btn-raised btn-success" data-toggle="tooltip" data-placement="bottom" data-original-title="Buscar">&nbsp;<span class="glyphicon glyphicon-search"></span>&nbsp;</button>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-hover" id="afiliados-table">
                                <thead>
                                    <tr class="success">
                                        <th>Núm. Carnet</th>
                                        <th>Matrícula</th>
                                        <th>Grado</th>
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
        pageLength: 8,
        ajax: {
            url: '{!! route('getAfiliado') !!}',
            data: function (d) {
                d.pat = $('input[name=pat]').val();
                d.mat = $('input[name=mat]').val();
                d.nom = $('input[name=nom]').val();
                d.nom2 = $('input[name=nom2]').val();
                d.matri = $('input[name=matri]').val();
                d.car = $('input[name=car]').val();
                d.post = $('input[name=post]').val();
            }
        },
        columns: [
            { data: 'ci' },
            { data: 'matri', bSortable: false },
            { data: 'gra', bSortable: false },
            { data: 'pat', bSortable: false },
            { data: 'mat', bSortable: false },
            { data: 'noms', bSortable: false },
            { data: 'est', bSortable: false },
            { data: 'action', name: 'action', orderable: false, searchable: false, bSortable: false, sClass: "text-center" }
        ]
    });

    $('#search-form').on('submit', function(e) {
        oTable.draw();
        e.preventDefault();
    });

</script>
@endpush
