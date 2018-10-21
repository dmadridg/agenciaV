@extends('layouts.main')

@section('content')
<div class="container-fluid" style="background-color: #00bff0; padding: 25px 30px 25px 30px;">
    <div class="container" style="">
        <div class="row" style="text-align: center; display: flex;  align-items: center;  justify-content: center;  flex-direction: row;"">        
            <div class="col-sm-8" style="text-align: center;">            
                <span class="col-sm-12" style="color: black;font-weight: 600;font-size: 2rem;">¡SI YA TIENES UNA CUENTA! </span>
                <span class="col-sm-12" style="color: white;font-weight: 600;font-size: 2rem;">INICIA SESION PARA RESERVAR Y ADMINISTRAR</span>
            </div>
            <div class="col-sm-4" style="text-align: center;">
                <button type="button" class="btn btn-blue">Iniciar sesión</button>
            </div>  
        </div>        
    </div>
</div>
<div class="container-fluid" style="background-color: white; 
                background: url({{asset('img/MXfondo.jpg')}});
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center top;
                padding: 25px 30px 25px 30px;
                min-height: 400px;
                display: flex;  align-items: center;  justify-content: center;  flex-direction: row;"">
    <div class="container" style="">
        <div class="col-sm-6 col-sm-offset-6" style="text-align: center;">            
            <span class="col-sm-12" style="color: white;font-weight: 600;font-size: 2rem;">UNETE A Y TEN ACCESO A<br>
            LOS BENEFICIOS QUE TIENES<br>
            AL SER SER PARTE DE GLOBOHOTEL </span>
            <div class="col-sm-12" style="text-align: center; margin-top: 3rem">
                <button type="button" class="btn btn-blue">REGÍSTRATE</button>
            </div>  
        </div>
    </div>
</div>
<div class="container-fluid" style="background-color: white; padding: 25px 30px 25px 30px;">
    <div class="container" style="">
        <div class="row" style="text-align: center;display: flex;  align-items: center;  justify-content: center;  flex-direction: row;"">        
            <div class="col-sm-6" style="text-align: center;">            
                <p style="color: #0086cf;font-weight: 600;font-size: 2.5rem;">¡POTENCIALIZA TU AGENCIA DE VIAJES </p>
                <p style="color: black;font-weight: 600;font-size: 1.4rem; text-align: justify;">
                    Formar parte de la red de Agentes de Viajes
                    más grande de México y ofrece rapidez,
                    precisión e imagen tecnológica a tús clientes
                    al momento de reservar sus viajes.<br>
                    Obtén acceso a la más poderosa plataforma
                    de reservaciones online que existe hasta
                    ahora, ya que globohotel.mx te ofrece más de
                    180,000 opciones turísticas para reservar
                    alrededor del mundo, con disponibilidad real y
                    confirmaciones inmediatas, siempre con el
                    soporte humano de nuestro equipo de
                    atención a clientes.
                </p>
                <p style="color: black;font-weight: 600;font-size: 1.4rem; text-align: left;">
                    ¡Las mejores comisiones!<br>
                    <b>Gana 16%</b> de por cada reserva!
                </p>
            </div>
            <div class="col-sm-6" style="text-align: center;">
               <iframe width="100%" height="315" src="https://www.youtube.com/embed/9hSz3pB4UC4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>  
        </div>        
    </div>
</div>
<div class="container-fluid" style="background-color: white; background: url({{asset('img/fondo2.png')}});
                background-size: contain;
                background-repeat: no-repeat;
                background-position: center top;
                padding: 25px 30px 25px 30px;">
    <div class="container" style="">
        <div class="row" style="text-align: center;background-color: #0086cf;display: flex;  align-items: center;  justify-content: center;  flex-direction: row;"">
            <div class="col-sm-6" style="text-align: center;">
                <p style="color: white;font-weight: 600;font-size: 2.5rem;">Mira como funciona la plataforma</p>
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/9hSz3pB4UC4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>        
            <div class="col-sm-6" style="text-align: center;">            
                <p style="color: white;font-weight: 600;font-size: 2.5rem;">Especialmente para<br>Agencias de Viajes</p>
                <p style="color: white;font-weight: 600;font-size: 1.4rem; text-align: center;">
                    que deseanestar siempre<br>
                    a la vanguadia
                </p>
                <div class="col-sm-12" style="text-align: center; margin-top: 3rem">
                    <button type="button" class="btn btn-default">REGISTRARME!</button>
                </div>  
            </div>              
        </div>  
    </div>
</div>
<div class="container-fluid" style="background-color: white; background: url({{asset('img/fondo3.png')}});
                background-size: contain;
                background-repeat: no-repeat;
                background-position: center bottom;
                padding: 25px 30px 25px 30px;">
    <div class="container" style="display: flex;  align-items: center;  justify-content: center;  flex-direction: row;"">
        <div class="col-sm-6" >
            <div class="row" style="background-color: white;border-radius: 1rem;border: 1px solid; margin: 2rem; text-align: center;">
                <p style="color: #00bff0;font-weight: 600;font-size: 2.5rem;">¡POTENCIALIZA</p>
                <p style="color: black;font-weight: 600;font-size: 2.5rem;">TU AGENCIA DE VIAJES</p>
                <p style="color: black;font-weight: 600;font-size: 1.4rem;">
                    Nuestra plataforma es tan amigable que de
                    manera rápida e intuitiva podrás navegar
                    obteniendo de forma inmediata todas las
                    opciones de búsqueda que realices.
                </p>
            </div>
        </div> 
        <div class="col-sm-6" style="text-align: center;">
            <p style="color: #00bff0;font-weight: 600;font-size: 2.5rem;">¡MÁS FACÍL DE LO QUE IMAGINAS!</p>
            <p style="color: black;font-weight: 600;font-size: 1.4rem; text-align: justify;">
                Contamos con diferentes filtros que permiten
                encontrar de forma ágil y sencilla la mejor opción
                de viaje, ofreciéndote información detalla del
                servicio a contratar, como;
            </p>
            <div class="col-sm-7" style="color: black;font-weight: 600;font-size: 1.4rem; text-align: left;">
                <ul>
                  <li style="list-style-type: disc;">Descripciones</li>
                  <li style="list-style-type: disc;">Fotografías</li>
                  <li style="list-style-type: disc;">Mapas geográficos</li>
                  <li style="list-style-type: disc;">Tipos de habitaciones, etc.</li>
                </ul>
            </div>
            <div class="col-sm-5" style="color: black;font-weight: 600;font-size: 1.4rem; text-align: left;">
                <img src="{{asset('img/lap.png')}}" class="pull-right" style="width: 100px" alt="Lap" />
            </div>
        </div> 
    </div>
    <div class="container" style="text-align: center;">
        <div class="col-sm-10 col-sm-offset-1" style="text-align: center;">
            <p style="color: black;font-weight: 600;font-size: 1.7  rem;">
                Existe la facilidad de comparar entre Hoteles de manera simultanea, visualizándolos en tu pantalla,
                además de poder compartir vía correo electrónico esta información con otras personas.
            </p>
            <p style="color: black;font-weight: 600;font-size: 1.7rem;">
                Todo esto con una confirmación inmediata ya que todas las opciones mostradas son 100% disponibles
                con la ¡Mejor Tarifa Garantizada!
            </p>
        </div>
    </div>
    <p style="font-weight: 600; color: #00bff0; font-size: 4rem; text-align: center;">Beneficios</p>
    <div class="container" style="    background-color: #1a92d3;    border-radius: 10px;    padding: 2rem;">
        <div class="row" style="margin: 1rem;">
            <div class="col-sm-6" style="">
                <div class="col-sm-4" style="">
                    <div class="pull-right" style="height: 50px; background-color: #00bff0; border-radius: 50%; width: 50px;">                    
                    </div>
                </div>
                <div class="col-sm-8" style="">
                    <p class="col-sm" style="text-align: left; color: white;">Tarifas 100% competitivas ¡Garantizado!
                    </p>
                </div>
            </div>
            <div class="col-sm-6" style="">
                <div class="col-sm-4" style="">
                    <div class="pull-right" style="height: 50px; background-color: #00bff0; border-radius: 50%; width: 50px;">                    
                    </div>
                </div>
                <div class="col-sm-8" style="">
                    <p class="col-sm" style="text-align: left; color: white;">Amplios tiempos limite de pago, hasta 4 días antes del viaje, con la modalidad pago pendiente!
                    </p>
                </div>
            </div>
        </div>
        <div class="row" style="margin: 1rem;">
            <div class="col-sm-6" style="">
                <div class="col-sm-4" style="">
                    <div class="pull-right" style="height: 50px; background-color: #00bff0; border-radius: 50%; width: 50px;">                    
                    </div>
                </div>
                <div class="col-sm-8" style="">
                    <p class="col-sm" style="text-align: left; color: white;">¡Las mejores comisiones! Gana 16% de por cada reserva!
                    </p>
                </div>
            </div>
            <div class="col-sm-6" style="">
                <div class="col-sm-4" style="">
                    <div class="pull-right" style="height: 50px; background-color: #00bff0; border-radius: 50%; width: 50px;">                    
                    </div>
                </div>
                <div class="col-sm-8" style="">
                    <p class="col-sm" style="text-align: left; color: white;">Descuenta comisiones de reservas con tarjeta en tus próximas ventas de pago en efectivo...
                    </p>
                </div>
            </div>
        </div>
        <div class="row" style="margin: 1rem;">
            <div class="col-sm-6" style="">
                <div class="col-sm-4" style="">
                    <div class="pull-right" style="height: 50px; background-color: #00bff0; border-radius: 50%; width: 50px;">                    
                    </div>
                </div>
                <div class="col-sm-8" style="">
                    <p class="col-sm" style="text-align: left; color: white;">Obten la misma comision para culquier servicio que reserves.
                    </p>
                </div>
            </div>
            <div class="col-sm-6" style="">
                <div class="col-sm-4" style="">
                    <div class="pull-right" style="height: 50px; background-color: #00bff0; border-radius: 50%; width: 50px;">                    
                    </div>
                </div>
                <div class="col-sm-8" style="">
                    <p class="col-sm" style="text-align: left; color: white;">Reserva en línea 24 horas los x365 del año, siempre contaras con ayuda de un asesor.
                    </p>
                </div>
            </div>
        </div>
        <div class="row" style="margin: 1rem;">
            <div class="col-sm-6" style="">
                <div class="col-sm-4" style="">
                    <div class="pull-right" style="height: 50px; background-color: #00bff0; border-radius: 50%; width: 50px;">                    
                    </div>
                </div>
                <div class="col-sm-8" style="">
                    <p class="col-sm" style="text-align: left; color: white;">Chat de asistencia en línea, siempre estamos para ayudarte.
                    </p>
                </div>
            </div>
            <div class="col-sm-6" style="">
                <div class="col-sm-4" style="">
                    <div class="pull-right" style="height: 50px; background-color: #00bff0; border-radius: 50%; width: 50px;">                    
                    </div>
                </div>
                <div class="col-sm-8" style="">
                    <p class="col-sm" style="text-align: left; color: white;">Tú cuenta te permite tener ilimitados usuarios registrador con diferentes permisos.
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