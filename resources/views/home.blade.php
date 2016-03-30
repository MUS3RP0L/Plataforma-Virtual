@extends('layout')

@section('content')
<div class="container-fluid">

  	<div class="row" style="margin: 2% 0 0 0;">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">Reporte</div>

				<div class="panel-body">
					<ul class="panel-body list-group">
      @foreach ($activities as $activity)
        <li class="list-group-item">
          <span style="color:#888;font-style:italic">{!! $activity->created_at !!}:</span>
          {!! $activity->message !!}
        </li>
      @endforeach
      </ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection