@extends('layouts.main')
@section('content')
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="card form-card">
				<div class="card-header">
					<h4 class="card-title m-b-0">{{$user ? 'Editar' : 'Nuevo'}} cliente</h4>
				</div>
				<div class="card-body">
                    <form id="form-data" action="{{url('clientes')}}/{{ $user ? 'update' : 'save' }}" onsubmit="return false;" enctype="multipart/form-data" method="POST" autocomplete="off" data-ajax-type="ajax-form" data-column="0" data-refresh="0" data-redirect="1" data-table_id="example3" data-container_id="table-container">
					  	<div class="box-body">
					  		<div class="form-group hide">
						  		<label for="id">ID</label>
                                <input type="text" class="form-control" value="{{$user ? $user->id : ''}}" id="id" name="id">
							</div>
							<div class="form-group">
						  		<label for="lastname">Nombre completo</label>
                                <input type="text" class="form-control not-empty" value="{{$user ? $user->fullname : ''}}" id="fullname" name="fullname" data-msg="Nombre completo" placeholder="Nombre completo">
							</div>
							<div class="form-group">
						  		<label for="phone">Celular</label>
                                <input type="text" class="form-control not-empty" value="{{$user ? $user->phone : ''}}" id="phone" name="phone" data-msg="Celular" placeholder="Celular">
							</div>
							<div class="form-group">
						  		<label for="email">Correo</label>
                                <input type="text" class="form-control not-empty email" value="{{$user ? $user->email : ''}}" id="email" name="email" data-msg="Correo" placeholder="Correo">
							</div>
							@if($user)
								<div class="form-group hide">
							  		<label for="email">Correo</label>
	                                <input type="text" class="form-control not-empty email" value="{{$user ? $user->email : ''}}" id="old_email" name="old_email" data-msg="Correo" placeholder="Correo">
								</div>
							@endif
							<div class="form-group">
						  		<label for="password">Contraseña</label>
                                <input type="text" class="form-control pass-font {{$user ? '' : 'not-empty'}}" id="password" name="password" data-msg="Contraseña" placeholder="">
							</div>
							@if($user)
                                <div class="form-group">
                                    <label for="imagenes">
                                        Imágen
                                        <a class="document-read" href="{{asset($user->photo)}}" data-lightbox='preview' data-title='Imágen'>Ver foto actual <i class="fa fa-file-image-o" aria-hidden="true"></i></a>
                                    </label>
                                    <input type="file" class="form-control file image" id="photo" name="photo" data-msg="Imagen">
                                </div>
                            @endif
					  	</div>
					  	<div class="box-footer">
							<button type="button" class="btn btn-default"><a href="{{url('clientes')}}">Regresar</a></button>
							<button type="submit" class="btn btn-primary save">Guardar</button>
					  	</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection