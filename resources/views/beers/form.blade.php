@extends('layouts.main')
@section('content')
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="card form-card">
				<div class="card-header">
					<h4 class="card-title m-b-0">{{$beer ? 'Editar' : 'Nueva'}} cerveza</h4>
				</div>
				<div class="card-body">
                    <form id="form-data" action="{{url('cervezas/'.($beer ? 'update' : 'save'))}}" onsubmit="return false;" enctype="multipart/form-data" method="POST" autocomplete="off" data-ajax-type="ajax-form" data-column="0" data-refresh="" data-redirect="1" data-table_id="example3" data-container_id="table-container">
					  	<div class="box-body">
					  		<div class="form-group hide">
						  		<label for="id">ID</label>
                                <input type="text" class="form-control" value="{{$beer ? $beer->id : ''}}" name="id">
							</div>
							<div class="form-group">
						  		<label for="title">Nombre</label>
                                <input type="text" class="form-control not-empty" value="{{$beer ? $beer->title : ''}}" name="title" data-msg="Nombre">
							</div>
							<div class="form-group">
						  		<label for="description">Descripción</label>
						  		<textarea class="form-control not-empty" name="description" data-msg="Descripción">{{$beer ? $beer->description : ''}}</textarea>
							</div>
							<div class="form-group">
                                <label for="imagenes">
                                    Imágen
                                    <div class="alert alert-primary">
                                        Las medidas de la fotografía para la cerveza deben ser de <strong>600 x 440 px</strong> o su equivalente a escala, el sistema redimensionará automáticamente la imágen subida.
                                    </div>
                        			@if($beer)
                                    	<a class="document-read" href="{{asset($beer->photo)}}" data-lightbox='preview' data-title='Imágen'>Ver foto actual <i class="fa fa-file-image-o" aria-hidden="true"></i></a>
			                        @endif
                                </label>
                                <input type="file" class="form-control file image {{$beer ? '' : 'not-empty'}}" id="photo" name="photo" data-msg="Imagen">
                            </div>
					  	</div>
					  	<div class="box-footer">
							<button type="submit" class="btn btn-primary save">Guardar</button>
					  	</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection