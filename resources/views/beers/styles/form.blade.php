@extends('layouts.main')
@section('content')
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="card form-card">
				<div class="card-header">
					<h4 class="card-title m-b-0">{{$style ? 'Editar' : 'Nueva'}} estilo de cerveza</h4>
				</div>
				<div class="card-body">
                    <form id="form-data" action="{{url('cervezas/estilos/'.($style ? 'update' : 'save'))}}" onsubmit="return false;" enctype="multipart/form-data" method="POST" autocomplete="off" data-ajax-type="ajax-form" data-column="0" data-refresh="" data-redirect="1" data-table_id="example3" data-container_id="table-container">
					  	<div class="box-body">
					  		{{-- {{csrf_field()}} --}}
					  		<div class="form-group hide">
						  		<label for="id">ID</label>
                                <input type="text" class="form-control" value="{{$style ? $style->id : ''}}" id="id" name="id">
							</div>
							<div class="form-group">
                                <label for="beer_id">Cerveza</label>
                                <select name="beer_id" class="form-control not-empty" data-msg="Cerveza">
                                    <option value="0" disabled selected>Seleccione una opción</option>
	                                @if($style) 
	                                    @foreach($beers as $beer)
	                                        <option value="{{$beer->id}}" {{$style->beer_id == $beer->id ? 'selected' : ''}}>{{$beer->title}}</option>
	                                    @endforeach
	                                @else
	                                	@foreach($beers as $beer)
	                                        <option value="{{$beer->id}}">{{$beer->title}}</option>
	                                    @endforeach
	                                @endif
                                </select>
                            </div>
					  		<div class="form-group">
						  		<label for="title">Nombre</label>
                                <input type="text" class="form-control not-empty" value="{{$style ? $style->title : ''}}" name="title" data-msg="Nombre">
							</div>
							<div class="form-group">
						  		<label for="description">Descripción</label>
						  		<textarea class="form-control not-empty" name="description" data-msg="Descripción">{{$style ? $style->description : ''}}</textarea>
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