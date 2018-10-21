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
        <span class="col-xs-12" style="color: white;font-weight: 600;font-size: 2rem;">SOCIOS GLOBOHOTEL<br>
        Gana dinero desde tu computadora! </span>
        <div class="col-xs-12" style="text-align: center; margin-top: 2rem">
            <button type="button" class="btn btn-blue">REGÍSTRATE</button>
        </div>  
        <span class="col-xs-12" style="color: white;font-weight: 600;margin-top: 1rem;font-size: 2rem;">
        Llámanos: 01 (33) 3942 6000 </span>
    </div>
</div>
<div class="container-fluid" style="background-color: white; background: url({{asset('img/fondo2.png')}});
                background-size: contain;
                background-repeat: no-repeat;
                background-position: center top;
                padding: 25px 30px 25px 30px;">
    <div class="container" style="">
        <div class="row" style="text-align: center;display: flex;  align-items: center;  justify-content: center;  flex-direction: row;">        
            <div class="col-xs-12 col-sm-6" style="text-align: center;background-color: #252a2e;
    border-radius: 1rem;">            
                <p style="color: white;font-weight: 600;font-size: 2.5rem;">¿Eres emprendedor?</p>
                <p style="color: white;font-weight: 600;font-size: 2.1rem;">
                    Gana dinero desde tu computadora!
                    Reserva las vacaciones de tus amigos, y
                    vuélvete un promotor de viajes
                    independiente. 
                </p>
                <img src="{{asset('img/msi.png')}}" class="col-xs" style="width: 30%;" alt="Emprendedor" /> 
            </div>
            <div class="col-xs-12 col-sm-6" style="text-align: center;">
               <img src="{{asset('img/emprendedores.png')}}" class="col-xs" style="width: 90%;" alt="Emprendedores" />
            </div>  
        </div>        
    </div>
</div>
<div class="container-fluid" style="background-color: white; background: url({{asset('img/fondo3.png')}});
                background-size: contain;
                background-repeat: no-repeat;
                background-position: center bottom;
                padding: 25px 30px 25px 30px;">
    <div class="container" style="text-align: center;">
            <p style="color: #00bff0;font-weight: 600;font-size: 2.5rem;">Vuélvete un promotor de viajes independiente, </p>
            <p style="color: black;font-weight: 600;font-size: 1.8rem;">¡Gana dinero reservando ls viajes de tu familia y amigos!  </p>
            <button type="button" class="btn btn-primary" style="margin-top: 1rem;">REGISTRARME</button>        
    </div>
    <div class="container" style="text-align: center; margin-top: 3rem;">
        <p style="color: black;font-weight: 600;font-size: 1.8rem;">Mira como funciona la plataforma</p>
        <div class="col-xs-10 col-xs-offset-1" style="text-align: center;">
           <iframe width="100%" height="315" src="https://www.youtube.com/embed/9hSz3pB4UC4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
    </div>
    <p style="font-weight: 600; color: #00bff0; font-size: 4rem; text-align: center;">Beneficios</p>
    <div class="container" style="    background-color: #1a92d3;    border-radius: 10px;    padding: 2rem;">
        <div class="row" style="margin: 1rem;">
            <div class="col-xs-6" style="">
                <div class="col-xs-4" style="">
                    <div class="pull-right" style="height: 50px; background-color: #00bff0; border-radius: 50%; width: 50px;">                    
                    </div>
                </div>
                <div class="col-xs-8" style="">
                    <p class="col-xs" style="text-align: left; color: white;">Tarifas 100% competitivas ¡Garantizado!
                    </p>
                </div>
            </div>
            <div class="col-xs-6" style="">
                <div class="col-xs-4" style="">
                    <div class="pull-right" style="height: 50px; background-color: #00bff0; border-radius: 50%; width: 50px;">                    
                    </div>
                </div>
                <div class="col-xs-8" style="">
                    <p class="col-xs" style="text-align: left; color: white;">Amplios tiempos limite de pago, hasta 4 días antes del viaje, con la modalidad pago pendiente!
                    </p>
                </div>
            </div>
        </div>
        <div class="row" style="margin: 1rem;">
            <div class="col-xs-6" style="">
                <div class="col-xs-4" style="">
                    <div class="pull-right" style="height: 50px; background-color: #00bff0; border-radius: 50%; width: 50px;">                    
                    </div>
                </div>
                <div class="col-xs-8" style="">
                    <p class="col-xs" style="text-align: left; color: white;">¡Las mejores comisiones! Gana 16% de por cada reserva!
                    </p>
                </div>
            </div>
            <div class="col-xs-6" style="">
                <div class="col-xs-4" style="">
                    <div class="pull-right" style="height: 50px; background-color: #00bff0; border-radius: 50%; width: 50px;">                    
                    </div>
                </div>
                <div class="col-xs-8" style="">
                    <p class="col-xs" style="text-align: left; color: white;">Descuenta comisiones de reservas con tarjeta en tus próximas ventas de pago en efectivo...
                    </p>
                </div>
            </div>
        </div>
        <div class="row" style="margin: 1rem;">
            <div class="col-xs-6" style="">
                <div class="col-xs-4" style="">
                    <div class="pull-right" style="height: 50px; background-color: #00bff0; border-radius: 50%; width: 50px;">                    
                    </div>
                </div>
                <div class="col-xs-8" style="">
                    <p class="col-xs" style="text-align: left; color: white;">Obten la misma comision para culquier servicio que reserves.
                    </p>
                </div>
            </div>
            <div class="col-xs-6" style="">
                <div class="col-xs-4" style="">
                    <div class="pull-right" style="height: 50px; background-color: #00bff0; border-radius: 50%; width: 50px;">                    
                    </div>
                </div>
                <div class="col-xs-8" style="">
                    <p class="col-xs" style="text-align: left; color: white;">Reserva en línea 24 horas los x365 del año, siempre contaras con ayuda de un asesor.
                    </p>
                </div>
            </div>
        </div>
        <div class="row" style="margin: 1rem;">
            <div class="col-xs-6" style="">
                <div class="col-xs-4" style="">
                    <div class="pull-right" style="height: 50px; background-color: #00bff0; border-radius: 50%; width: 50px;">                    
                    </div>
                </div>
                <div class="col-xs-8" style="">
                    <p class="col-xs" style="text-align: left; color: white;">Chat de asistencia en línea, siempre estamos para ayudarte.
                    </p>
                </div>
            </div>
            <div class="col-xs-6" style="">
                <div class="col-xs-4" style="">
                    <div class="pull-right" style="height: 50px; background-color: #00bff0; border-radius: 50%; width: 50px;">                    
                    </div>
                </div>
                <div class="col-xs-8" style="">
                    <p class="col-xs" style="text-align: left; color: white;">Tú cuenta te permite tener ilimitados usuarios registrador con diferentes permisos.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="text-align: center; color: white; margin-top: 3rem">
        <p style="color: white;font-weight: 600;font-size: 3.2rem;">
            Llámanos: 01 (33) 3942 6000
        </p>
        <p style="color: white;font-weight: 600;font-size: 3.2rem;">
            ó inicia un chat en vivo!
        </p>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function () {
    $("#second").height($("#first").height());
    $(window).resize(function () {
        $("#second").height($("#first").height());
    });
});
</script>
@endsection