@if(count($comments))
	@php
		$count = 0;
	@endphp
	@foreach($comments as $key => $comment)
		@php
			$count ++;
		@endphp
		@if($count == 1)
			<div class="row">
		@endif
		<div class="col-md-4 col-sm-6">
			<div class="card emp-card">
				<div class="row">
					<div class="employee-box">
						<div class="col-xs-5">
							<div class="emp-avater">
								<img src="{{asset($comment->user->photo)}}" class="img-responsive img-circle" alt="" />
								<span class="emp-status bg-busy"><i class="ti ti-check"></i></span>
							</div>
						</div>
						<div class="left-br col-xs-7">
							<div class="emp-caption">
								<h4 class="real-name">{{$comment->user->fullname}}</h4>
								{{-- Aditional data (Required for modal) --}}
								<p class="row-id hide">{{$comment->id}}</p>
								<p class="real-score hide">{{$comment->score}}</p>
								<p class="emp-designation">{{$comment->content_m}}</p>
								<p class="real-comment hide">{{$comment->content}}</p>
								<p class="real-user-photo hide">{{asset($comment->user->photo)}}</p>
								{{-- End aditional data --}}
								<p class="real-date hide">{{$comment->date}}</p>
								<p class="real-business"><span class="bold">Negocio:</span> <span class="data-span">{{$comment->business->name}}</span></p>
								<div class="emp-flix">
									<a href="javascript:;" class="special-row modal-info" data-toggle="tooltip" data-placement="top" title="Ver detalle" data-row-id="{{$comment->id}}">
										<i class="fa fa-eye"></i>
									</a>
									<a href="javascript:;" class="enable-can special-row enable-row" data-toggle="tooltip" data-placement="top" title="Habilitar" data-change-to="1" data-row-id="{{$comment->id}}">
										<i class="fa fa-check"></i>
									</a>
									<a class="delete-can special-row disable-row" data-toggle="tooltip" data-placement="top" title="Deshabilitar" data-change-to="2" data-row-id="{{$comment->id}}" href="javascript:;" aria-label="Acciones">
										<i class="fa fa-trash" aria-hidden="true"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		@if($count == 3 || $key == count($comments)-1)
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
			    <h3><i class="fa fa-warning text-red"></i>No hay comentarios para validar.</h3>
			    <p>
			    	Espere a que los usuarios hagan comentarios sobre los negocios para poder validarlo.
			    </p>
			</div>
		</div>
	</div>
@endif