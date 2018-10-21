@extends('layouts.main')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header" style="text-align: center;">
                            <div class="btn-group">
                                <div class="general-info" data-url="{{url("clientes")}}" data-refresh="content">
                                    <a href="{{url('clientes/form')}}" class="btn-top check-all btn bg-success new-row"> <i class="fa fa-plus" aria-hidden="true"></i>Agregar</a>
                                    {{-- <a href="javascript:;" data-change-to="0" class="btn-top check-all btn bg-danger disable-rows" disabled="disabled"><i class="fa fa-trash" aria-hidden="true"></i> Deshabilitar</a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="content-container" style="display: none;">
                                @include('users.customers.content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection