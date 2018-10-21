@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="general-info" data-url="{{url("v")}}" data-refresh="table">
            {{-- Div with general info --}}
        </div>
        <div class="col-md-4" id="html-container">
            @include('profile.card'){{-- Profile card --}}
        </div>

        @include('general_views.photo'){{-- Profile card --}}

        <div class="col-md-8">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#form_user" data-toggle="tab">Datos personales</a></li>
                    <li><a href="#form_address" data-toggle="tab">Configuración de domicilio</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="form_user">
                        {{-- Modify form ttributes --}}
                        <form id="form-data" class="form-horizontal" action="{{url('profile/save')}}" onsubmit="return false;" enctype="multipart/form-data" method="POST" autocomplete="off" data-ajax-type="ajax-form" data-column="0" data-refresh="content" data-redirect="0" data-table_id="example3" data-container_id="html-container">
                            <div class="form-group hide">
                                <label for="id" class="col-sm-2 control-label">ID</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$user->id}}" id="id_customer" name="id" class="form-control not-empty" data-msg="ID" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Nombre(s)</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$user->name}}" id="name" name="name" class="form-control not-empty" data-msg="Nombre(s)" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="col-sm-2 control-label">Apellido(s)</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$user->lastname}}" id="lastname" name="lastname" class="form-control not-empty" data-msg="Apellido(s)" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-sm-2 control-label">Celular</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$user->phone}}" id="phone" name="phone" class="form-control not-empty" data-msg="Celular" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" value="{{$user->email}}" id="email" name="email" class="form-control not-empty email" data-msg="Email" />
                                </div>
                            </div>
                            <div class="form-group hide">
                                <label for="old_email" class="col-sm-2 control-label">Email (actual)</label>
                                <div class="col-sm-10">
                                    <input type="email" value="{{$user->email}}" id="old_email" name="old_email" class="form-control not-empty email" data-msg="Email" />
                                </div>
                            </div>
                             <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Contraseña</label>
                                <div class="col-sm-10">
                                    <input type="text" id="password" name="password" class="form-control pass-font" data-msg="Contraseña" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger save">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="form_address">
                        <form id="form-data-2" class="form-horizontal" action="{{url('profile/save/address')}}" onsubmit="return false;" enctype="multipart/form-data" method="POST" autocomplete="off" data-ajax-type="ajax-form" data-column="0" data-refresh="0" data-redirect="0" data-table_id="example3" data-container_id="html-container">
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Los datos de domicilio aquí mostrados, se usarán para prellenar los campos de envío para los nuevos pedidos.
                            </div>
                            <div class="form-group">
                                <label for="state" class="col-sm-2 control-label">Estado</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$address ? $address->state : ''}}" id="state" name="state" class="form-control not-empty" data-msg="Estado" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city" class="col-sm-2 control-label">Ciudad</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$address ? $address->city : ''}}" id="city" name="city" class="form-control not-empty" data-msg="Ciudad" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="colony" class="col-sm-2 control-label">Colonia</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$address ? $address->colony : ''}}" id="colony" name="colony" class="form-control not-empty" data-msg="Colonia" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="postal_code" class="col-sm-2 control-label">Código postal</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$address ? $address->postal_code : ''}}" id="postal_code" name="postal_code" class="form-control not-empty" data-msg="Código postal" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="street" class="col-sm-2 control-label">Calle</label>
                                <div class="col-sm-10">
                                    <textarea id="street" name="street" class="form-control not-empty" data-msg="Calle">{{$address ? $address->street : ''}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="out_num" class="col-sm-2 control-label">Número exterior</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$address ? $address->out_num : ''}}" id="out_num" name="out_num" class="form-control not-empty" data-msg="Número exterior" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="int_num" class="col-sm-2 control-label">Número interior</label>
                                <div class="col-sm-10">
                                    <input type="text" value="{{$address ? $address->int_num : ''}}" id="int_num" name="int_num" class="form-control" data-msg="Número interior" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger save">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                <!-- /.tab-pane -->
                </div>
            <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
    </div>
@endsection