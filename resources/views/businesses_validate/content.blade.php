@if(count($comercios))
	@php
		$count = 0;
	@endphp
	@foreach($comercios as $key => $comercio)
		@php
			$count ++;
		@endphp
		@if($count == 1)
			<div class="row">
				<div class="card-blank">
		@endif
		<div class="col-md-4 col-sm-12">
			<div class="card simple-card">
				<div class="cardheader" style="background:url({{asset($comercio->data->cover_photo)}});">
				</div>
				<div class="avatar">
					<img alt="" src="{{asset($comercio->data->logo)}}" />
				</div>
				<div class="info">
					<div class="title">
					   <h3>{{$comercio->data->name}}</h3>
					</div>
					<p class="desc">{{$comercio->data->description_short}}</p>
					<a class="btn btn-info option edit-row modal-info" data-row-id="{{$comercio->data->id}}" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Ver detalles">
						<i class="fa fa-eye" aria-hidden="true"></i>
					</a>
				</div>
				<div class="bottom">
					<ul class="social-detail">
						<li>Fotos<span>{{$comercio->photos->count()}}</span></li>
						<li>Status
							<span>{{($comercio->data->status == 0 ? 'Revisar datos' : ($comercio->data->status == 1 ? 'Aprobado' : 'Datos rechazados'))}}</span>
						</li>
						<li>Vistas<span>{{$comercio->views}}</span></li>
					</ul>
				</div>
			</div>
		</div>
		
		@if($count == 3 || $key == count($comercios)-1)
			@php
				$count = 0;
			@endphp
				</div>
			</div>
		@endif
	@endforeach
@else
	<div class="col-md-12 col-sm-12">
		<div class="widget default-widget">
			<div class="error-content">
				<h1 class="four-four-error">Oops!</h1>
			    <h3><i class="fa fa-warning text-red"></i>No hay datos por validar.</h3>
			    <p>
			    	Espere a que usuarios soliciten cambios en sus comercios para poder validarlos aquí.
			    </p>
			</div>
		</div>
	</div>
@endif