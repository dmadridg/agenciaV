@extends('layouts.main')
@section('content')
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="card form-card">
				<div class="card-header">
					<h4 class="card-title m-b-0">{{$banner ? 'Editar' : 'Nuevo'}} espacio para foto publicitaria</h4>
				</div>
				<div class="card-body">
                    <form id="form-data" action="{{url('espacios-fotos-app')}}/{{ $banner ? 'update' : 'save' }}" onsubmit="return false;" enctype="multipart/form-data" method="POST" autocomplete="off" data-ajax-type="ajax-form" data-column="0" data-refresh="0" data-redirect="1" data-table_id="example3" data-container_id="table-container">
					  	<div class="box-body">
					  		<div class="form-group hide">
						  		<label for="id">ID</label>
                                <input type="text" class="form-control" value="{{$banner ? $banner->id : ''}}" id="id" name="id">
							</div>
							<div class="form-group">
						  		<label for="lastname">Comercio</label>
						  		<select name="business_id" id="business_id" class="form-control" data-msg="Comercio">
                                    <option value="0" selected>Seleccione una opción</option>
                                    @if ($banner)
                                        @foreach($businesses as $business)
                                            <option value="{{$business->id}}" {{$banner->business_id == $business->id ? 'selected' : ''}}>{{$business->name}}</option>
                                        @endforeach
                                    @else
                                        @foreach($businesses as $business)
                                            <option value="{{$business->id}}">{{$business->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
							</div>
                            <div class="form-group">
                                <label for="imagenes">
                                    Imágen
									@if($banner)
                                    	<a class="document-read" href="{{asset($banner->photo)}}" data-lightbox='preview' data-title='Imágen'>Ver foto actual <i class="fa fa-file-image-o" aria-hidden="true"></i></a>
                                    @endif
                                </label>
                                <input type="file" class="form-control file image {{$banner ? '' : 'not-empty'}}" id="photo" name="photo" data-msg="Imágen">
                            </div>
					  	</div>
					  	<div class="box-footer">
							<button type="button" class="btn btn-default"><a href="{{url('espacios-fotos-app')}}">Regresar</a></button>
							<button type="submit" class="btn btn-primary save">Guardar</button>
					  	</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection