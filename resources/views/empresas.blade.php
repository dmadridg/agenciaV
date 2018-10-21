@extends('layouts.main')

@section('content')
<div class="container-fluid" style="background-color: #00bff0; padding: 25px 30px 25px 30px;">
    <div class="container" style="">
        <div class="row" style="text-align: center;display: flex;  align-items: center;  justify-content: center;  flex-direction: row;"">        
            <div class="col-xs-8" style="text-align: center;">            
                <span class="col-xs-12" style="color: black;font-weight: 600;font-size: 2rem;">¡SI YA TIENES UNA CUENTA! </span>
                <span class="col-xs-12" style="color: white;font-weight: 600;font-size: 2rem;">INICIA SESION PARA RESERVAR Y ADMINISTRAR</span>
            </div>
            <div class="col-xs-4" style="text-align: center;">
                <button type="button" class="btn btn-blue">Iniciar sesión</button>
            </div>  
        </div>        
    </div>
</div>
<div class="container-fluid" style="background-color: white; 
                background: url({{asset('img/socios.jpg')}});
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center top;
                padding: 25px 30px 25px 30px;
                min-height: 400px;display: flex;  align-items: center;  justify-content: center;  flex-direction: row;"">
    <div class="container" style="text-align: center;">          
        <span class="col-xs-12" style="color: white;font-weight: 600;font-size: 2rem;">Globohotel<br>
        Conoce más sobre nosotros</span>
        <span class="col-xs-12" style="color: white;font-weight: 600;font-size: 2rem;">
        Llámanos: 01 (33) 3942 6000 </span>
    </div>
</div>
<div class="container-fluid" style="background-color: #eef5f9;padding: 25px 30px 25px 30px;">
    <div class="container" style="">
               
    </div>
</div>

@endsection