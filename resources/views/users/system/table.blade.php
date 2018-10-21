<table class="table table-hover" id="example3">
    <thead class="centered">  
        <th></th>  
        <th>ID</th>
        <th>Email</th>
        <th>Nombre</th>
        <th>Rol</th>
        <th>Foto</th>
        <th>Status</th>
        <th>Acciones</th>
    </thead>
    <tbody>
        @if($users)                    
            @foreach($users as $user)
                <tr id="{{$user->id}}">
                    <td class="small-cell v-align-middle">
                        <div class="checkbox check-success">
                            <input id="checkbox{{$user->id}}" type="checkbox" class="checkDelete" value="1">
                            <label for="checkbox{{$user->id}}"></label>
                        </div>
                    </td>
                    <td>{{$user->id}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->name}} {{$user->lastname}}</td>
                    <td>
                        {!! 
                            ( $user->role->role == 'Administrador' ? "<span class='label label-success'>Administrador</span>" : 
                                ( $user->role->role == 'Barra' ? "<span class='label label-primary'>Barra</span>" : 
                                    ( $user->role->role = 'Acceso' ? "<span class='label label-warning'>Acceso</span>" : "<span class='label label-danger'>Desconocido</span>"
                                    )
                                )
                            ) 
                        !!}
                    </td>
                    <td>
                        <a class="user-system" href="{{url($user->img)}}" data-lightbox='preview' data-title="Imágen">Ver foto actual <i class="fa fa-file-image-o" aria-hidden="true"></i></a>
                    </td>
                    <td>
                        {!! (
                            $user->status == 1 ? "<span class='label label-success'>Habilitado</span>" : "<span class='label label-default'>Inhabilitado</span>"
                        ) !!}
                    </td>
                    <td>
                        <a href="{{url("admin/usuarios/sistema/form/$user->id")}}"><button type="button" class="btn btn-info edit-row">Editar</button></a>
                        @if ($user->status == 1)
                            <button type="button" class="btn btn-default disable-row" data-change-to="0">Inhabilitar</button>
                        @else
                            <button type="button" class="btn btn-primary enable-row" data-change-to="1">Habilitar</button>
                        @endif
                        <button type="button" class="btn btn-danger delete-row" change-to="0">Borrar</button>
                    </td>
                </tr>
            @endforeach
        @endif  
    </tbody>
</table>