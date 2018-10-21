@if(count($users))
	@php
		$count = 0;
	@endphp
	@foreach($users as $key => $user)
		@php
			$count ++;
		@endphp
		@if($count == 1)
			<div class="row">
		@endif
		<div class="col-lg-4 col-md-4 col-sm-12" data-id="{{$user->id}}">
			<div class="contact-box">
				<div class="top-box">
					{{-- <div class="col-md-2 col-sm-4 pull-right">
						<div class="material-switch">
							<input id="someSwitchOptionSuccess{{$user->id}}" name="someSwitchOption{{$user->id}}" type="checkbox" value="1"/>
							<label for="someSwitchOptionSuccess{{$user->id}}" class="label-success"></label>
						</div>
					</div> --}}
					<div class="contact-action">
						@if ($user->status == 1)
							<a class="delete-can special-row disable-row" data-toggle="tooltip" data-placement="top" title="Deshabilitar" data-change-to="0" data-row-id="{{$user->id}}" href="javascript:;" aria-label="Acciones">
								<i class="fa fa-trash" aria-hidden="true"></i>
							</a>
	                    @else
	                    	<a class="enable-can special-row enable-row" data-toggle="tooltip" data-placement="top" title="Habilitar" data-change-to="1" data-row-id="{{$user->id}}" href="javascript:;" aria-label="Acciones">
								<i class="fa fa-check" aria-hidden="true"></i>
							</a>
	                    @endif

	                    <a class="edit-can" href="{{url("clientes/form/$user->id")}}" data-toggle="tooltip" data-placement="top" title="Editar" data-row-id="{{$user->id}}" aria-label="Acciones">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						</a> 

					</div>
				</div>
				<div class="contact-img">
					<img src="{{asset($user->photo)}}" class="img-circle img-responsive" alt="" />
				</div>
				<div class="contact-caption">
					<h4>{{$user->name}} {{$user->lastname}}</h4>
					<span>{{$user->email}}</span>
					@if($user->phone)
						<span>({{$user->phone}})</span>
					@endif
				</div>
				<div class="contact-footer">
					<a href="javascript:;" class="col-half"><span class="con-message"><i class="fa fa-shopping-cart"></i>Comentarios: {{$user->comments->count()}}</span></a>
					<a href="javascript:;" class="left-br col-half"><span class="con-profile"><i class="ti-user"></i>Status: {!!$user->status == 1 ? '<span class="label label-info"> Activo </span>' : '<span class="label label-danger"> Inactivo </span>' !!}</span></a>
				</div>
			</div>
		</div>
		@if($count == 3 || $key == count($users)-1)
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
			    <h3><i class="fa fa-warning text-red"></i>No existen usuarios registrados.</h3>
			    <p>
			    	Cuando los usuarios se registren podrá ver su información aquí.
			    </p>
			</div>
		</div>
	</div>
@endif