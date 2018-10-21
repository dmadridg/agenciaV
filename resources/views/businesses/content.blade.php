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
				<div class="cardheader" style="background:url({{asset($comercio->cover_photo)}});">
				</div>
				<div class="avatar">
					<img alt="" src="{{asset($comercio->logo)}}" />
				</div>
				<div class="info">
					<div class="title">
					   <h3>{{$comercio->name}}</h3>
					</div>
					<p class="desc">{{$comercio->description_short}}</p>
					<p>
						<span>{!!($comercio->status == 0 ? '<span class="label label-warning"> Inhabilitado </span>' : ($comercio->status == 1 ? '<span class="label label-success"> Habilitado </span>' : '<span class="label label-danger"> Eliminado </span>'))!!}</span>
					</p>
					<a class="btn btn-danger option delete-row special-row" data-change-to="0" href="javascript:;" data-row-id="{{$comercio->id}}" data-toggle="tooltip" data-placement="top" title="Eliminar">
						<i class="fa fa-trash" aria-hidden="true"></i>
					</a>
					@if($comercio->status == 1){{-- It's Enabled --}}
						<a class="btn btn-warning option disable disable-row special-row" data-change-to="0" href="javascript:;" data-row-id="{{$comercio->id}}" data-toggle="tooltip" data-placement="top" title="Inhabilitar">
							<i class="fa fa-close" aria-hidden="true"></i>
						</a>
					@else{{-- It's disabled --}}
						<a class="btn btn-primary option enable-row special-row" data-change-to="1" href="javascript:;" data-row-id="{{$comercio->id}}" data-toggle="tooltip" data-placement="top" title="Habilitar">
							<i class="fa fa-check" aria-hidden="true"></i>
						</a>
					@endif
					<a class="btn btn-default option {{-- edit edit-row --}} modal-info" data-row-id="{{$comercio->id}}" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Ver detalles">
						<i class="fa fa-eye" aria-hidden="true"></i>
					</a>
					<a class="btn btn-info option edit-row" data-row-id="{{$comercio->id}}" data-content="{{$comercio}}" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Editar opciones">
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</a>
				</div>
				<div class="bottom">
					<ul class="social-detail">
						<li>Likes <span>{{$comercio->likes->count()}}</span></li>
						<li>Fotos <span>{{$comercio->photos->count()}}</span>	</li>
						<li>Vistas <span>{{$comercio->views}}</span></li>
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
			    <h3><i class="fa fa-warning text-red"></i>No han creado comercios.</h3>
			    <p>
			    	Cree comercios para poder ver su información y dar de alta su galería.
			    </p>
			</div>
		</div>
	</div>
@endif