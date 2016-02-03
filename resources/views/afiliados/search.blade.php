@extends('layout')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Inicio</div>

				<div class="panel-body">
					

					<form class="navbar-form navbar-left" role="search" action="{{url('searchafi')}}">
					 <div class="form-group">
					  <input type="text" class="form-control" name='search' placeholder="Buscar ..." />
					 </div>
					 <button type="submit" class="btn btn-default">Buscar</button>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection