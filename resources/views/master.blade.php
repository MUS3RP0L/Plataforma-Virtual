<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>
		
	    {!! Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
        {!! Html::style('bower_components/bootstrap-material-design/dist/css/bootstrap-material-design.min.css') !!}
        {!! Html::style('bower_components/bootstrap-material-design/dist/css/ripples.min.css') !!}

</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">MUSERPOL</a>
			</div>

		</div>
	</nav>

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