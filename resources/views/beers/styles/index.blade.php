@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header" style="text-align: center;">
                    <div class="btn-group">
                        <div class="general-info" data-url="{{url("cervezas/estilos")}}" data-refresh="table">
                            <a href="{{url('cervezas/estilos/form')}}" class="btn-top check-all btn bg-success new-row"> <i class="fa fa-plus" aria-hidden="true"></i>Agregar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="" id="table-container">
                        @include('beers.styles.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection