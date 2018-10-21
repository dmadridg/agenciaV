@if(count($events))
	@php
		$count = 0;
	@endphp
	@foreach($events as $key => $event)
		@php
			$count ++;
		@endphp
		@if($count == 1)
			<div class="row">
		@endif
		<div class="col-md-4 col-sm-12" data-id="{{$event->id}}">
			<div class="service-box">
				<div class="service-icon">
					<i class="fa fa-laptop"></i>
				</div>
				<div class="service-content">
					<h3>
						<a href="#">{{$event->title}}</a>
					</h3>
					<p>
						{{$event->description_short}}
					</p>
			    	<span><span class="bold">Fecha:</span> {{$event->date}}</span><br>
				</div>
				<div class="">
					<a class="btn btn-danger option delete-row special-row" data-change-to="0" href="javascript:;" data-row-id="{{$event->id}}" data-toggle="tooltip" data-placement="top" title="Eliminar">
						<i class="fa fa-trash" aria-hidden="true"></i>
					</a>
					<a class="btn btn-info option edit-row" data-change-to="0" href="{{url('eventos-y-actividades/form/'.$event->id)}}" data-toggle="tooltip" data-placement="top" title="Editar">
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</a>
				</div>
			</div>
		</div>
		
		@if($count == 3 || $key == count($events)-1)
			@php
				$count = 0;
			@endphp
			</div>
		@endif
	@endforeach
@else
	<div class="col-md-12 col-sm-12">
		<div class="widget default-widget">
			<div class="error-content">
				<h1 class="four-four-error">Oops!</h1>
			    <h3><i class="fa fa-warning text-red"></i>No han creado eventos.</h3>
			    <p>
			    	Cree eventos para poder ver su información y dar de alta su galería.
			    </p>
			</div>
		</div>
	</div>
@endif