@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header" style="text-align: center;">
                    <div class="btn-group">
                        <div class="general-info" data-url="{{url("cupones")}}" data-refresh="table">
                            <a href="{{url('cupones/form')}}" class="btn-top check-all btn bg-success new-row"> <i class="fa fa-plus" aria-hidden="true"></i>Agregar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="" id="table-container">
                        @include('coupons.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection