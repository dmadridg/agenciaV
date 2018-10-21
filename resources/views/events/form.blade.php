@extends('layouts.main')
@section('content')
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="card form-card">
				<div class="card-header">
					<h4 class="card-title m-b-0">{{$event ? 'Editar' : 'Nuevo'}} evento/actividad</h4>
				</div>
				<div class="card-body">
                    <form id="form-data" action="{{url('eventos-y-actividades')}}/{{ $event ? 'update' : 'save' }}" onsubmit="return false;" enctype="multipart/form-data" method="event" autocomplete="off" data-ajax-type="ajax-form" data-column="0" data-refresh="0" data-redirect="1" data-table_id="example3" data-container_id="table-container">
					  	<div class="box-body">
					  		<div class="form-group hide">
						  		<label for="id">ID</label>
                                <input type="text" class="form-control" value="{{$event ? $event->id : ''}}" id="id" name="id">
							</div>
							<div class="form-group">
						  		<label for="lastname">Título</label>
                                <input type="text" class="form-control not-empty" value="{{$event ? $event->title : ''}}" id="title" name="title" data-msg="Título" placeholder="Título">
							</div>
							<div class="form-group">
						  		<label for="description_short">Descripción corta</label>
						  		<textarea class="form-control not-empty" rows="10" id="description_short" name="description_short" maxlength="250" data-msg="Contenido" placeholder="Hasta 250 caracteres">{{$event ? $event->description_short : ''}}</textarea>
							</div>
							<div class="form-group">
						  		<label for="date">Fecha</label>
                                <input type="text" class="form-control not-empty date-picker" value="{{$event ? $event->date : ''}}" id="date" name="date" data-msg="Fecha" placeholder="Fecha">
							</div>
                            <div class="form-group">
                                <label for="imagenes">
                                    Imágen
                        			@if($event)
                                    	<a class="document-read" href="{{asset($event->photo)}}" data-lightbox='preview' data-title='Imágen'>Ver foto actual <i class="fa fa-file-image-o" aria-hidden="true"></i></a>
			                        @endif
                                </label>
                                <input type="file" class="form-control file image {{$event ? '' : 'not-empty'}}" id="photo" name="photo" data-msg="Imagen">
                            </div>
					  	</div>
					  	<div class="box-footer">
							<button type="button" class="btn btn-default"><a href="{{url('eventos-y-actividades')}}">Regresar</a></button>
							<button type="submit" class="btn btn-primary save">Guardar</button>
					  	</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	</script>
@endsection