<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mutual de Servicios al Policía</title>		
	{!! Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
    {!! Html::style('bower_components/bootstrap-material-design/dist/css/bootstrap-material-design.min.css') !!}
    {!! Html::style('bower_components/bootstrap-material-design/dist/css/ripples.min.css') !!}
</head>

	<body>

		@yield('content')

		<div id="myModal-error" class="modal fade">
		    <div class="modal-dialog">
		        <div class="alert alert-dismissible alert-danger">
		        	<div class="modal-header">
		                <h3 class="modal-title">Mensaje</h3>
		            </div>
	                <div class="modal-body">
	                    <p>
	                        @foreach ($errors->all() as $error)
			          			<div><h4>{{ $error }}</h4></div>
			      			@endforeach
			      			<div><h4>{{Session::get('error')}}</h4></div>
	                    </p>
	                </div>
	                <div class="modal-footer">
		            	<div class="row text-center">
		            		<button type="button" class="btn btn-raised btn-default" data-dismiss="modal">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;&nbsp;</button>
		            	</div>
		            </div>
		        </div>
		    </div>
		</div>

	</body>
</html>

<!-- Scripts -->
	{!! Html::script('bower_components/jquery/dist/jquery.min.js') !!}
	{!! Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
    {!! Html::script('bower_components/bootstrap-material-design/dist/js/ripples.min.js') !!} 
    {!! Html::script('bower_components/bootstrap-material-design/dist/js/material.min.js') !!}

    <script type="text/javascript">
        $(document).on('ready', function(){
            $.material.init();
        });
	    $(document).ready(function(){
		    $('[data-toggle="tooltip"]').tooltip(); 
		});
    </script>

    @if (Session::has('error'))
		<script type="text/javascript">
	    	$(document).ready(function(){
				$("#myModal-error").modal('show');
			});
       </script>
    @endif
