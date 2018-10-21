<table class="table table-striped" id="example3">
	<thead>
		<tr class="row-name">
			<th class="hide">Check</th>
			<th>ID</th>
			<th>Pregunta</th>
			<th>Respuesta</th>
			<th>Acciones</th>
		</tr>
	</thead>   
	<tbody>
		@foreach($faqs as $faq)
			<tr class="row-content">
				<td class="check hide"> <label><input id="checkbox{{$faq->id}}" type="checkbox" class="checkDelete" value="" /></label></td>
				<td>{{$faq->id}}</td>
				<td>{{$faq->question}}</td>
				<td>{{$faq->answer}}</td>
				<td>
					<a class="btn btn-danger option delete-row" data-change-to="0" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Eliminar">
						<i class="fa fa-trash" aria-hidden="true"></i>
					</a>
					<a class="btn btn-info option edit-row" data-change-to="0" href="{{url('faqs/form/'.$faq->id)}}" data-toggle="tooltip" data-placement="top" title="Editar">
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>