@extends('layouts.main')
@section('content')
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="card form-card">
				<div class="card-header">
					<h4 class="card-title m-b-0">{{$coupon ? 'Actualizar' : 'Guardar'}} Cupón</h4>
				</div>
				<div class="card-body">
                    <form id="form-data" action="{{url('cupones/'.($coupon ? 'update' : 'save'))}}" onsubmit="return false;" enctype="multipart/form-data" method="POST" autocomplete="off" data-ajax-type="ajax-form" data-column="0" data-refresh="" data-redirect="1" data-table_id="example3" data-container_id="table-container">
					  	<div class="box-body">
					  		<div class="form-group hide">
						  		<label for="id">ID</label>
                                <input type="text" class="form-control" value="{{$coupon ? $coupon->id : ''}}" name="id">
							</div>
					  		{{-- <div class="form-group">
							  	<label for="type">Tipo de cupón</label>
								<select name="type" class="form-control not-empty" data-msg="Tipo de cupón">
	                                <option value="0" disabled selected>Seleccione una opción</option>
	                                <option value="1" {{$coupon && $coupon->type == 1 ? 'selected' : ''}}>Descuento</option>
	                                <option value="2" {{$coupon && $coupon->type == 2 ? 'selected' : ''}}>Estampado</option>
	                            </select>
	                        </div> --}}
					  		<div class="form-group">
						  		<label for="code">Código</label>
                                <input type="text" class="form-control not-empty" value="{{$coupon ? $coupon->code : ''}}" name="code" data-msg="Código">
							</div>
							<div class="form-group hide">
						  		<label for="old_code">Viejo Código</label>
                                <input type="text" class="form-control" value="{{$coupon ? $coupon->code : ''}}" name="old_code" data-msg="Código viejo">
							</div>
							{{-- <div class="form-group" {{$coupon && $coupon->type == 2 ? 'hide' : ''}}>
						  		<label for="percentage">Porcentaje de descuento</label>
                                <input type="text" class="form-control {{$coupon && $coupon->type == 1 ? 'not-empty' : ''}}" value="{{$coupon ? $coupon->percentage : ''}}" name="percentage" data-msg="Porcentaje de descuento">
							</div> --}}
							<div class="form-group">
						  		<label for="description">Descripción</label>
						  		<textarea class="form-control not-empty" name="description" data-msg="Descripción">{{$coupon ? $coupon->description : ''}}</textarea>
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