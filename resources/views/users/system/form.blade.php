@extends('layouts.main')
@section('content')
<link rel="stylesheet" href="{{ asset('plugins/jquery-datatable/css/jquery.dataTables.css')}}"  type="text/css" media="screen"/>
<div class="text-center" style="margin: 20px;">
    <h2>{{$user ? 'Editar' : 'Nuevo'}} usuario de sistema</h2>
    <div class="row-fluid">
        <div class="span12">
            <div class="grid simple form-container" style="display: none">
                <div class="grid-title">
                    <div class="grid-body">
                        <h3>Datos</h3>
                        <div class="container-fluid content-body">
                            <form id="form-data" action="{{url('admin/usuarios/sistema')}}/{{ $user ? 'update' : 'save' }}" onsubmit="return false;" enctype="multipart/form-data" method="POST" autocomplete="off" data-ajax-type="ajax-form" data-column="0" data-refresh="0" data-redirect="1" data-table_id="example3" data-container_id="table-container">
                                <div class="row">
                                    <div class="form-group col-sm-6 col-xs-12 hide">
                                        <label for="id">ID</label>
                                        <input type="text" class="form-control" value="{{$user ? $user->id : ''}}" id="id" name="id">
                                    </div>
                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label for="name">Nombre</label>
                                        <input type="text" class="form-control not-empty" value="{{$user ? $user->name : ''}}" id="name" name="name" data-msg="Nombre(s)" placeholder="Nombre(s)">
                                    </div>
                                    <div class="form-group col-sm-12 col-xs-12">
                                        <label for="lastname">Apellido</label>
                                        <input type="text" class="form-control not-empty" value="{{$user ? $user->lastname : ''}}" id="lastname" name="lastname" data-msg="Apellido(s)" placeholder="Apellido(s)">
                                    </div>
                                    <div class="form-group col-md-12 col-xs-12">
                                        <label for="role_id">Rol</label>
                                        <select name="role_id" id="role_id" class="form-control not-empty" data-msg="Rol">
                                            <option value="0" disabled selected>Seleccione una opción</option>
                                            @if ($user)
                                                @foreach($roles as $role)
                                                    <option value="{{$role->id}}" {{$user->role_id == $role->id ? 'selected' : ''}}>{{$role->role}}</option>
                                                @endforeach
                                            @else
                                                @foreach($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->role}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-xs-12">
                                        <label for="email">Correo</label>
                                        <input type="text" class="form-control not-empty email" value="{{$user ? $user->email : ''}}" id="email" name="email" data-msg="Correo" placeholder="Correo">
                                    </div>
                                    @if($user)
                                        <div class="form-group col-md-6 col-xs-12 hide">
                                            <label for="old_email">Correo</label>
                                            <input type="text" class="form-control" value="{{$user ? $user->email : ''}}" id="old_email" name="old_email" data-msg="Correo" placeholder="Correo">
                                        </div>
                                    @endif
                                    <div class="form-group col-md-6 col-xs-12">
                                        <label for="password">Contraseña</label>
                                        <input type="text" class="form-control pass-font {{$user ? '' : 'not-empty'}}" id="password" name="password" data-msg="Contraseña" placeholder="">
                                    </div>
                                    @if($user)
                                        <div class="form-group col-sm-12 col-xs-12">
                                            <label for="imagenes">
                                                Imágen
                                                <a class="document-read" href="{{url($user->img)}}" data-lightbox='preview' data-title='Imágen'>Ver foto actual <i class="fa fa-file-image-o" aria-hidden="true"></i></a>
                                            </label>
                                            <input type="file" class="form-control file image" id="img" name="img" data-msg="Imagen">
                                        </div>
                                    @endif
                                </div>
                                <a href="{{url('admin/usuarios/sistema')}}"><button type="button" class="btn btn-default" data-dismiss="modal">Regresar</button></a>
                                <button type="submit" class="btn btn-primary save">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection