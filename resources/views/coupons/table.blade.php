<table class="table table-striped" id="example3">
	<thead>
		<tr class="row-name">
			<th class="hide">Check</th>
			<th>ID</th>
			@if(auth()->user()->role->name == 'Administrador')
				<th>Negocio</th>
			@endif
			<th>Código</th>
			<th class="hide">Tipo</th>
			<th>Descripción</th>
			<th class="hide">Porcentaje descuento</th>
			<th>Acciones</th>
		</tr>
	</thead>   
	<tbody>
		@foreach($coupons as $coupon)
			<tr class="row-content">
				<td class="check hide"> <label><input id="checkbox{{$coupon->id}}" type="checkbox" class="checkDelete" value="" /></label></td>
				<td>{{$coupon->id}}</td>
				@if(auth()->user()->role->name == 'Administrador')
					<td>{{$coupon->business->name}}</td>
				@endif
				<td>{{$coupon->code}}</td>
				<td class="hide">{{$coupon->type == 1 ? 'Descuento' : 'Estampado'}}</td>
				<td>{{$coupon->description}}</td>
				<td class="hide">{{$coupon->type == 1 ? $coupon->percentage.'%' : 'No aplica'}}</td>
				<td>
					<a class="btn btn-danger option delete-row" data-change-to="0" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Eliminar">
						<i class="fa fa-trash" aria-hidden="true"></i>
					</a>
					<a class="btn btn-info option edit-row" data-change-to="0" href="{{url('cupones/form/'.$coupon->id)}}" data-toggle="tooltip" data-placement="top" title="Editar">
						<i class="fa fa-pencil" aria-hidden="true"></i>
					</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>