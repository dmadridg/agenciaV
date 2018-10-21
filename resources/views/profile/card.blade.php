<div class="box box-primary">
    <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="{{asset($user->img)}}" alt="User profile picture" />

        <h3 class="profile-username text-center">{{$user->name}} {{$user->lastname}}</h3>

        <p class="text-muted text-center">{{$user->email}} ({{$user->phone}})</p>
        <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-photo"><b>Editar</b></a>

        <ul class="profile-group">
            <li>
                <b>{{$user->cards->count()}}</b> Tarjetas
            </li>
            <li>
                <b>${{$user->services->count() > 0 ? $user->services->sum('total')/100 : 0}} MXN</b>Total comprado
            </li>
            <li>
                <b>{{$user->services->count()}}</b> Pedidos
            </li>
        </ul>
    </div>
</div>