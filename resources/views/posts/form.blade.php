@extends('layouts.main')
@section('content')
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="card form-card">
				<div class="card-header">
					<h4 class="card-title m-b-0">{{$post ? 'Editar' : 'Nuevo'}} post</h4>
				</div>
				<div class="card-body">
                    <form id="form-data" action="{{url('posts')}}/{{ $post ? 'update' : 'save' }}" onsubmit="return false;" enctype="multipart/form-data" method="POST" autocomplete="off" data-ajax-type="ajax-form" data-column="0" data-refresh="0" data-redirect="1" data-table_id="example3" data-container_id="table-container">
					  	<div class="box-body">
					  		<div class="form-group hide">
						  		<label for="id">ID</label>
                                <input type="text" class="form-control" value="{{$post ? $post->id : ''}}" id="id" name="id">
							</div>
							<div class="form-group">
						  		<label for="lastname">Título</label>
                                <input type="text" class="form-control not-empty" value="{{$post ? $post->title : ''}}" id="title" name="title" data-msg="Título" placeholder="Título">
							</div>
							<div class="form-group">
						  		<label for="content">Contenido</label>
						  		<textarea class="form-control not-empty" rows="10" id="content" name="content" data-msg="Contenido" placeholder="Contenido">{{$post ? $post->content : ''}}</textarea>
							</div>
							<div class="form-group">
						  		<label for="place">Lugar</label>
                                <input type="text" class="form-control not-empty" value="{{$post ? $post->place : ''}}" id="place" name="place" data-msg="Lugar" placeholder="Lugar">
							</div>
							<div class="form-group">
						  		<label for="date">Fecha</label>
                                <input type="text" class="form-control not-empty date-picker" value="{{$post ? $post->date : ''}}" id="date" name="date" data-msg="Fecha" placeholder="Fecha">
							</div>
							<div class="form-group">
						  		<label for="author">Autor</label>
                                <input type="text" class="form-control not-empty" value="{{$post ? $post->author : ''}}" id="author" name="author" data-msg="Autor" placeholder="Autor">
							</div>
                            @if($post)
	                            <div class="row">
									<div class="row-fluid dropzone" id="dropzoneDiv">
									</div>
								</div>
							@endif
					  	</div>
					  	<div class="box-footer">
							<button type="button" class="btn btn-default"><a href="{{url('posts')}}">Regresar</a></button>
							<button type="submit" class="btn btn-primary save">Guardar</button>
					  	</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var data = "";
		var post = "{{$post}}";
		console.log(post ? 'dropzone ready': 'dropzone not loaded');

		if ( post ){
			data = '<?php echo @$post->photos;?>';
			data = JSON.parse(data.replace(/&quot;/g,'"'));
		}

		if ( data ){
			$('div.dz-default.dz-message').remove()
		}

		$(function(){
			Dropzone.autoDiscover = false;

			if (post) {
				var myDropzone = new Dropzone("div#dropzoneDiv", {
					url: "{{url('posts/upload-content')}}",
					addRemoveLinks: true,
					paramName: 'photo',
					init: function() {
						this.on("sending", function(file, xhr, formData){
							formData.append("_method", "POST");
							formData.append("path", 'img/posts');
							formData.append("rename", true);
							formData.append("post_id", '{{@$post->id}}');
						});
					},
					removedfile: function(file) {
						swal({
							title: '¿Quieres eliminar este archivo adjunto?',
							icon: "warning",
							buttons: ["Cancelar", "Eliminar"],
							dangerMode: true,
						}).then((accept) => {
							if (accept) {
								$.ajax({
									url: "{{url('posts/delete-content')}}",
									method:'post',
									type:'post',
									data:{
										photo_id   : file.photo_id,
										photo_name : file.name,
									},
									success:function(response){
										file.previewElement.remove();
										if ( response.status ){
											swal('Éxito', response.msg, 'success');
										} else {
											swal('Error', response.msg, 'warning');
										}
									}
								})
							}
						})
					}
				});
				if ( data ){
					$.each(data, function(key, value){
						var mockFile = { name: value.photo, size: value.size, photo_id: value.id ,post_id: "{{@$post->id}}"};
						myDropzone.options.addedfile.call(myDropzone, mockFile);
						myDropzone.options.thumbnail.call(myDropzone, mockFile, "{{asset('')}}"+value.photo);
					})
				}
			}
		})
	</script>
@endsection