@extends('layout')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="panel-heading">
                <h4 ><b>Afiliados</b></h4>
            </div>
        
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Despliegue de Afiliados</h3>
                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-8">

                            <form method="POST" id="search-form" role="form" class="form-inline">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                                {!! Form::label('pat', 'APELLIDO PATERNO', ['class' => 'col-md-4 control-label']) !!}
                                            <div class="col-md-8">
                                                {!! Form::text('pat', '', ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                                <span class="help-block">Apellido Paterno</span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                                {!! Form::label('mat', 'APELLIDO MATERNO', ['class' => 'col-md-4 control-label']) !!}
                                            <div class="col-md-8">
                                                {!! Form::text('mat', '', ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                                <span class="help-block">Apellido Materno</span>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6">
                                        <div class="form-group">
                                                {!! Form::label('nom', 'PRIMER NOMBRE', ['class' => 'col-md-4 control-label']) !!}
                                            <div class="col-md-8">
                                                {!! Form::text('nom', '', ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                                <span class="help-block">Primer Nombre</span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                                {!! Form::label('nom2', 'SEGUNDO NOMBRE', ['class' => 'col-md-4 control-label']) !!}
                                            <div class="col-md-8">
                                                {!! Form::text('nom2', '', ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                                <span class="help-block">Segundo Nombre</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="reset" class="btn btn-raised btn-warning">Limpiar&nbsp;&nbsp;<span class="glyphicon glyphicon-erase"></span></button>
                                            &nbsp;&nbsp;<button type="submit" class="btn btn-raised btn-primary">&nbsp;&nbsp;Buscar&nbsp;&nbsp;<span class="glyphicon glyphicon-zoom-out" aria-hidden="true"></span>&nbsp;&nbsp;</button>
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
                                        <th>Matrícula</th>
                                        <th>Estado</th>
                                        <th>Núm. Carnet</th>
                                        {{-- <th>Grado</th> --}}
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Nombres</th>     
                                        <th>Opciones</th>
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
        "dom": '<"top"l>t<"bottom"ip>',   
        processing: true,
        serverSide: true,
        ajax: {
            url: '{!! route('getAfiliado') !!}',
            data: function (d) {
                d.pat = $('input[name=pat]').val();
                d.mat = $('input[name=mat]').val();
                d.nom = $('input[name=nom]').val();
                d.nom2 = $('input[name=nom2]').val();
                d.post = $('input[name=post]').val();
            }
        },
        columns: [
            { data: 'matri', name: 'matri', sWidth: '8%' },
            { data: 'est', name: 'est', sWidth: '8%' },
            { data: 'ci', name: 'ci', sWidth: '10%' },
            // { data: 'gra', name: 'gra', sWidth: '10%' },
            { data: 'pat', name: 'pat', sWidth: '15%' },
            { data: 'mat', name: 'mat', sWidth: '15%' },
            { data: 'mons', name: 'mons', sWidth: '15%' },
            
            { data: 'action', name: 'action', sWidth: '10%', orderable: false, searchable: false, bSortable: false, sClass: "text-center" }
        ]
    });

    $('#search-form').on('submit', function(e) {
        oTable.draw();
        e.preventDefault();
    });

</script>
@endpush
