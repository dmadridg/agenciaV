@if(count($banners))
	@php
		$count = 0;
	@endphp
	@foreach($banners as $key => $banner)
		@php
			$count ++;
		@endphp
		@if($count == 1)
			<div class="row">
				<div class="card-blank">
		@endif
		<div class="col-md-4 col-sm-6">
			<div class="card hover-product">
				<div class="box">
					<img src="{{asset($banner->photo)}}" alt="" />
				</div>
				<div class="pro-box-content">
					<h4>Comercio</h4>
					<p>{{$banner->business ? $banner->business->name : 'No asignado'}}</p>
					<a href="{{url('espacios-fotos-app/form/'.$banner->id)}}"><button type="button" class="btn btn-outline btn-primary btn-rounded">Editar</button></a>
					<button type="button" class="btn btn-outline btn-danger btn-rounded delete-row special-row" data-row-id="{{$banner->id}}">Eliminar</button>
				</div>
			</div>
		</div>

		@if($count == 3 || $key == count($banners)-1)
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
			    <h3><i class="fa fa-warning text-red"></i>No han creado banners.</h3>
			    <p>
			    	Cuando cree banners podrá visualizarlos en éste módulo.
			    </p>
			</div>
		</div>
	</div>
@endif