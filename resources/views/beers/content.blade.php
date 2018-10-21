@if(count($beers))
	@php
		$count = 0;
	@endphp
	@foreach($beers as $key => $beer)
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
					<img src="{{asset($beer->photo)}}" alt="" />
				</div>
				<div class="pro-box-content">
					<h4>{{$beer->title}}</h4>
					<p>{{$beer->description}}</p>
					<a href="{{url('cervezas/form/'.$beer->id)}}"><button type="button" class="btn btn-outline btn-primary btn-rounded">Editar</button></a>
					<button type="button" class="btn btn-outline btn-danger btn-rounded delete-row special-row" data-row-id="{{$beer->id}}">Eliminar</button>
				</div>
			</div>
		</div>

		@if($count == 3 || $key == count($beers)-1)
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
			    <h3><i class="fa fa-warning text-red"></i>No han creado beers.</h3>
			    <p>
			    	Cuando cree beers podrá visualizarlos en éste módulo.
			    </p>
			</div>
		</div>
	</div>
@endif