<div class="box box-primary">
    <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="{{asset(auth()->user()->photo)}}" alt="User profile picture" />

        <h3 class="profile-username text-center">{{auth()->user()->name}} {{auth()->user()->fullname}}</h3>

        <p class="text-muted text-center">{{auth()->user()->email}} ({{auth()->user()->phone}})</p>
        {{-- <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-photo"><b>Editar</b></a> --}}

        <ul class="profile-group">
            {{-- <li>
                <b>{{$user->cards->count()}}</b> Tarjetas
            </li>
            <li>
                <b>${{$user->services->count() > 0 ? $user->services->sum('total')/100 : 0}} MXN</b>Total comprado
            </li>
            <li>
                <b>{{$user->services->count()}}</b> Pedidos
            </li> --}}
        </ul>
    </div>
</div>

<div class="card-blank">
    <div class="card simple-card">
        <div class="cardheader" style="background:url({{asset($comercio->cover_photo)}});">
        </div>
        <div class="avatar">
            <img alt="" src="{{asset($comercio->logo)}}" />
        </div>
        <div class="info">
            <div class="title">
               <h3>{{$comercio->name}}</h3>
            </div>
            <p class="desc">{{$comercio->description_short}}</p>
            <p>
                Status de información: <span class="pointer sw-dt-data-status" data-toggle="tooltip" data-placement="top" title="Ver más...">{!!($comercio->data->status == 0 ? '<span class="label label-warning"> Esperando aprobación </span>' : ($comercio->data->status == 1 ? '<span class="label label-success"> Aprobado </span>' : '<span class="label label-danger"> Datos rechazados </span>'))!!}</span>
            </p>
            <p>
                Visibilidad de comercio: <span class="pointer sw-dt-b-status" data-toggle="tooltip" data-placement="top" title="Ver más...">{!!($comercio->status == 0 ? '<span class="label label-warning"> Oculto de la app. </span>' : ($comercio->status == 1 ? '<span class="label label-success"> Visible desde la app. </span>' : '<span class="label label-danger"> Marcado como eliminado </span>'))!!}</span>
            </p>
            {{-- <a class="btn btn-info option edit-row" data-change-to="0" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Ver detalles">
                <i class="fa fa-eye" aria-hidden="true"></i>
            </a> --}}
        </div>
        <div class="bottom">
            <ul class="social-detail">
                <li>Likes <span>{{$comercio->likes->count()}}</span></li>
                <li>Fotos <span>{{$comercio->photos->count()}}</span></li>
                <li>Vistas <span>{{$comercio->views}}</span></li>
            </ul>
        </div>
    </div>
</div>