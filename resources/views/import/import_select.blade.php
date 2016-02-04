@extends('layout')
@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Subir Archivo</div>
				<div class="panel-body">
					
				<form method='post' action='{{url("import")}}' enctype='multipart/form-data'>
					{{csrf_field()}}
					<div class='form-group'>
						<label for='image'>Excel: </label>
						<input type="file" name="image" />
						<div class='text-danger'>{{$errors->first('image')}}</div>
					</div>
					<button type='submit' class='btn btn-primary'>subir archivo</button>
				</form>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection