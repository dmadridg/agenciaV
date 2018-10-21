@extends('layouts.main')
@section('content')
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="card form-card">
				<div class="card-header">
					<h4 class="card-title m-b-0">Nueva tarjeta</h4>
				</div>
				<div class="card-body">
                    <form id="form-data" action="{{url('faqs/'.($faq ? 'update' : 'save'))}}" onsubmit="return false;" enctype="multipart/form-data" method="POST" autocomplete="off" data-ajax-type="ajax-form" data-column="0" data-refresh="" data-redirect="1" data-table_id="example3" data-container_id="table-container">
					  	<div class="box-body">
					  		{{-- {{csrf_field()}} --}}
					  		<div class="form-group hide">
						  		<label for="id">ID</label>
                                <input type="text" class="form-control" value="{{$faq ? $faq->id : ''}}" id="id" name="id">
							</div>
					  		<div class="form-group">
						  		<label for="">Pregunta</label>
						  		<textarea class="form-control not-empty" name="question" id="question" data-msg="Pregunta">{{$faq ? $faq->question : ''}}</textarea>
							</div>
							<div class="form-group">
						  		<label for="">Respuesta</label>
						  		<textarea class="form-control not-empty" name="answer" id="answer" data-msg="Respuesta">{{$faq ? $faq->answer : ''}}</textarea>
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