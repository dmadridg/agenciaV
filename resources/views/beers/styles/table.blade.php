<table class="table table-striped" id="example3">
	<thead>
		<tr class="row-name">
			<th class="hide">Check</th>
			<th>ID</th>
			<th>Cerveza</th>
			<th>Nombre</th>
			<th>Description</th>
			<th>Acciones</th>
		</tr>
	</thead>   
	<tbody>
		@foreach($styles as $style)
			<tr class="row-content">
				<td class="check hide"> <label><input id="checkbox{{$style->id}}" type="checkbox" class="checkDelete" value="" /></label></td>
				<td>{{$style->id}}</td>
				<td>{{$style->beer->title}}</td>
				<td>{{$style->title}}</td>
				<td>{{$style->description}}</td>
				<td>
					<a class="btn btn-danger option delete-row" data-change-to="0" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Eliminar">
						<i class="fa fa-trash" aria-hidden="true"></i>
					</a>
					<a class="btn btn-info option edit-row" data-change-to="0" href="{{url('cervezas/estilos/form/'.$style->id)}}" data-toggle="tooltip" data-placement="top" title="Editar">
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>