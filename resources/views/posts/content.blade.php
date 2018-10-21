@if(count($posts))
	@php
		$count = 0;
	@endphp
	@foreach($posts as $key => $post)
		@php
			$count ++;
		@endphp
		@if($count == 1)
			<div class="row">
		@endif
		<div class="col-md-4 col-sm-12" data-id="{{$post->id}}">
			<div class="service-box">
				<div class="service-icon">
					<i class="fa fa-laptop"></i>
				</div>
				<div class="service-content">
					<h3>
						<a href="#">{{$post->title}}</a>
					</h3>
					<p>
						{{$post->content}}
					</p>
			    	<span><span class="bold">Autor:</span> {{$post->author}}</span><br>
			    	<span><span class="bold">Fecha:</span> {{$post->date}}</span><br>
			    	<span><span class="bold">Clics al botón:</span> {{$post->button_clicks}}</span> <span><span class="bold">Visto:</span> {{$post->views}}</span><br>
				</div>
				<div class="">
					<a class="btn btn-danger option delete-row special-row" data-change-to="0" href="javascript:;" data-row-id="{{$post->id}}" data-toggle="tooltip" data-placement="top" title="Eliminar">
						<i class="fa fa-trash" aria-hidden="true"></i>
					</a>
					<a class="btn btn-info option edit-row" data-change-to="0" href="{{url('posts/form/'.$post->id)}}" data-toggle="tooltip" data-placement="top" title="Editar">
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</a>
				</div>
			</div>
		</div>
		
		@if($count == 3 || $key == count($posts)-1)
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
			    <h3><i class="fa fa-warning text-red"></i>No han creado posts.</h3>
			    <p>
			    	Cree posts para poder ver su información y dar de alta su galería.
			    </p>
			</div>
		</div>
	</div>
@endif