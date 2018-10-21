@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header" style="text-align: center;">
                    <div class="btn-group">
                        <div class="general-info" data-url="{{url("eventos-y-actividades")}}" data-refresh="content">
                            <a href="{{url('eventos-y-actividades/form')}}" class="btn-top check-all btn bg-success new-row"> <i class="fa fa-plus" aria-hidden="true"></i>Agregar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="content-container" style="display: none;">
                        @include('events.content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection