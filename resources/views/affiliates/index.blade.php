@extends('layout')

@section('content')
<div class="container-fluid">
    {!! Breadcrumbs::render('affiliates') !!}
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Lista de Afiliados</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" id="search-form" role="form">
                                <div class="row"><br>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('first_name', 'Primer Nombre', ['class' => 'col-md-5 control-label']) !!}
                                            <div class="col-md-7">
                                                {!! Form::text('first_name', '', ['class'=> 'form-control']) !!}
                                                <span class="help-block">Escriba el Primer Nombre</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('second_name', 'Segundo Nombre', ['class' => 'col-md-5 control-label']) !!}
                                            <div class="col-md-7">
                                                {!! Form::text('second_name', '', ['class'=> 'form-control']) !!}
                                                <span class="help-block">Escriba el Segundo Nombre</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('identity_card', 'Número Carnet', ['class' => 'col-md-5 control-label']) !!}
                                            <div class="col-md-7">
                                                {!! Form::text('num_identity_card', '', ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                                <span class="help-block">Escriba el Número de Carnet de Identidad</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('last_name', 'Apellido Paterno', ['class' => 'col-md-5 control-label']) !!}
                                            <div class="col-md-7">
                                                {!! Form::text('last_name', '', ['class'=> 'form-control']) !!}
                                                <span class="help-block">Escriba el Apellido Paterno</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('mothers_last_name', 'Apellido Materno', ['class' => 'col-md-5 control-label']) !!}
                                            <div class="col-md-7">
                                                {!! Form::text('mothers_last_name', '', ['class'=> 'form-control']) !!}
                                                <span class="help-block">Escriba el Apellido Materno</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label('registration', 'Número Matrícula', ['class' => 'col-md-5 control-label']) !!}
                                            <div class="col-md-7">
                                                {!! Form::text('registration', '', ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
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
                            <table class="table table-hover" id="affiliates-table">
                                <thead>
                                    <tr class="success">
                                        <th>Núm. Carnet</th>
                                        <th>Matrícula</th>
                                        <th>Grado</th>
                                        <th>Nombres</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
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

    var oTable = $('#affiliates-table').DataTable({
        "dom": '<"top">t<"bottom"p>',
        processing: true,
        serverSide: true,
        pageLength: 8,
        ajax: {
            url: '{!! route('get_affiliate') !!}',
            data: function (d) {
                d.last_name = $('input[name=last_name]').val();
                d.mothers_last_name = $('input[name=mothers_last_name]').val();
                d.first_name = $('input[name=first_name]').val();
                d.second_name = $('input[name=second_name]').val();
                d.registration = $('input[name=registration]').val();
                d.identity_card = $('input[name=num_identity_card]').val();
                d.post = $('input[name=post]').val();
            }
        },
        columns: [
            { data: 'identity_card' },
            { data: 'registration', bSortable: false },
            { data: 'degree', bSortable: false },
            { data: 'names', bSortable: false },
            { data: 'last_name', bSortable: false },
            { data: 'mothers_last_name', bSortable: false },
            { data: 'state', bSortable: false },
            { data: 'action', name: 'action', orderable: false, searchable: false, bSortable: false, sClass: 'text-center' }
        ]
    });

    $('#search-form').on('submit', function(e) {
        oTable.draw();
        e.preventDefault();
    });

</script>
@endpush
