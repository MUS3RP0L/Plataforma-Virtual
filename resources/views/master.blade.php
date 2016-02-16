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

		<!-- Scripts -->
		
		{!! Html::script('bower_components/jquery/dist/jquery.min.js') !!}
		{!! Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
        {!! Html::script('bower_components/bootstrap-material-design/dist/js/ripples.min.js') !!} 
        {!! Html::script('bower_components/bootstrap-material-design/dist/js/material.min.js') !!}

        <script type="text/javascript">
            $(document).on('ready', function(){
                $.material.init();
            });
        </script>

</body>
</html>