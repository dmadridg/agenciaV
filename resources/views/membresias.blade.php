@extends('layouts.main')

@section('content')
<div class="container-fluid" style="background-color: #00bff0; padding: 25px 30px 25px 30px;">
    <div class="container" style="">
        <div class="row">                    
            <span class="col-xs" style="color: white;font-weight: 600;font-size: 2.8rem;font-family: sans-serif;">Membresias</span> 
        </div>
        <div class="row">                    
            <div class="col-xs-12 col-sm-6" id="first" style="padding: 0; color: black;font-size: 1.8rem; text-align: justify;">
                Hemos creado <b>la mejor membresía de viajes,</b>
                accesible para todos, sin limite de reservaciones en
                más de 200,000 Hoteles por todo El mundo, Traslados
                del Aeropuerto al Hotel reservado ó del Hotel al
                Aeropuerto, así como infinidad de Atracciones
                turísticas que le darán la mejor diversión a tus
                vacaciones. ¡Adquiere hoy mismo!
            </div> 
            <div class="col-xs-12 col-sm-6" id="second" style="text-align: center;">
                <img src="{{asset('img/msi.png')}}" class="col-xs" style="height: 100%" alt="Membresias" />
            </div> 
        </div>
    </div>
</div>
<div class="container-fluid" style="background-color: white; background: url({{asset('img/fondo1.png')}});
                background-size: contain;
                background-repeat: no-repeat;
                background-position: center top;
                padding: 25px 30px 25px 30px;">
    <div class="container" style="margin-top: 3rem">
        <div class="row" style="text-align: center;">                    
            <div class="col-xs-8 col-xs-offset-2" style="color: white;font-weight: 600;font-size: 3rem;font-family: sans-serif;">Compra la Membresía de Amigos ó Familiar y Ahorra. ¡Invitalos!
            </div> 
        </div>
        <div class="row" style="text-align: center; color: #02bef0; font-size: 1.4rem; font-weight: 600;">
            Tú membresía se paga sola con lo que te vas ahorrar en tus viaje!
        </div>
        <div class="row" style="text-align: center; color: #0086cd; font-size: 3rem; font-weight: 600;">
            Membresías
        </div>
        <div class="row" style="">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a style="" href="#home" aria-controls="home" role="tab" data-toggle="tab">Individual</a></li>
                <li role="presentation"><a style="" href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Amigos</a></li>
                <li role="presentation"><a style="" href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Familiar</a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content" style="background-color: white;border-radius: 1rem;border: .5rem solid #00bff0;">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <div class="row" style="text-align: center;padding: 1rem;margin: 0;color: black;font-weight: 600;border-bottom: .2rem solid #00bff0;">
                        <div class="col-xs-4">
                            MEMBRESÍA
                        </div>
                        <div class="col-xs-2">
                            2 AÑOS
                        </div>
                        <div class="col-xs-2">
                            2 AÑOS
                        </div>
                        <div class="col-xs-2">
                            5 AÑOS
                        </div>
                        <div class="col-xs-2">
                            USUARIOS
                        </div>
                    </div>
                    <div class="row" style="text-align: center;padding: 1rem;margin: 0;color: black;font-weight: 600;border-bottom: .2rem solid #00bff0;">
                        <div class="col-xs-4">
                            <div class="radio">
                              <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                PERSONAL
                              </label>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            $6,000
                        </div>
                        <div class="col-xs-2">
                            $6,000
                        </div>
                        <div class="col-xs-2">
                            $12,750
                        </div>
                        <div class="col-xs-2">
                            1
                        </div>
                    </div>
                    <div class="row" style="text-align: center;padding: 1rem;margin: 0;color: black;font-weight: 600;border-bottom: .2rem solid #00bff0;">
                        <div class="col-xs-4">
                            <div class="radio">
                              <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                AMIGOS
                              </label>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            $6,000
                        </div>
                        <div class="col-xs-2">
                            $6,000
                        </div>
                        <div class="col-xs-2">
                            $12,750
                        </div>
                        <div class="col-xs-2">
                            1
                        </div>
                    </div>
                    <div class="row" style="text-align: center;padding: 1rem;margin: 0;color: black;font-weight: 600;border-bottom: .2rem solid #00bff0;">
                        <div class="col-xs-4">
                            <div class="radio">
                              <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                FAMILIAR
                              </label>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            $6,000
                        </div>
                        <div class="col-xs-2">
                            $6,000
                        </div>
                        <div class="col-xs-2">
                            $12,750
                        </div>
                        <div class="col-xs-2">
                            1
                        </div>
                    </div>
                    <div class="row" style="text-align: center;padding: 1rem;margin: 0;color: black;font-weight: 600;">
                        <div class="col-xs-4">
                            <div class="form-group" >
                                <label for="destino" style="color: #8c8c8c;font-weight: 600;font-size: 1rem;font-family: sans-serif;">tiempo de la membresía</label><br>
                                <select class="form-control">
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group" >
                                <label for="destino" style="color: #8c8c8c;font-weight: 600;font-size: 1rem;font-family: sans-serif;">precio de la membresía</label><br>
                                <label for="destino" style="color: #00bff0;font-weight: 600;font-size: 2.5rem;font-family: sans-serif;">$8,100 </label>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <br>
                            <button type="button" class="btn btn-blue" style="">comprar membresía</button>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="profile">
                    <div class="row" style="text-align: center;padding: 1rem;margin: 0;color: black;font-weight: 600;border-bottom: .2rem solid #00bff0;">
                        <div class="col-xs-4">
                            MEMBRESÍA
                        </div>
                        <div class="col-xs-2">
                            2 AÑOS
                        </div>
                        <div class="col-xs-2">
                            2 AÑOS
                        </div>
                        <div class="col-xs-2">
                            5 AÑOS
                        </div>
                        <div class="col-xs-2">
                            USUARIOS
                        </div>
                    </div>
                    <div class="row" style="text-align: center;padding: 1rem;margin: 0;color: black;font-weight: 600;border-bottom: .2rem solid #00bff0;">
                        <div class="col-xs-4">
                            <div class="radio">
                              <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                PERSONAL
                              </label>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            $6,000
                        </div>
                        <div class="col-xs-2">
                            $6,000
                        </div>
                        <div class="col-xs-2">
                            $12,750
                        </div>
                        <div class="col-xs-2">
                            1
                        </div>
                    </div>
                    <div class="row" style="text-align: center;padding: 1rem;margin: 0;color: black;font-weight: 600;border-bottom: .2rem solid #00bff0;">
                        <div class="col-xs-4">
                            <div class="radio">
                              <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                AMIGOS
                              </label>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            $6,000
                        </div>
                        <div class="col-xs-2">
                            $6,000
                        </div>
                        <div class="col-xs-2">
                            $12,750
                        </div>
                        <div class="col-xs-2">
                            1
                        </div>
                    </div>
                    <div class="row" style="text-align: center;padding: 1rem;margin: 0;color: black;font-weight: 600;border-bottom: .2rem solid #00bff0;">
                        <div class="col-xs-4">
                            <div class="radio">
                              <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                FAMILIAR
                              </label>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            $6,000
                        </div>
                        <div class="col-xs-2">
                            $6,000
                        </div>
                        <div class="col-xs-2">
                            $12,750
                        </div>
                        <div class="col-xs-2">
                            1
                        </div>
                    </div>
                    <div class="row" style="text-align: center;padding: 1rem;margin: 0;color: black;font-weight: 600;">
                        <div class="col-xs-4">
                            <div class="form-group" >
                                <label for="destino" style="color: #8c8c8c;font-weight: 600;font-size: 1rem;font-family: sans-serif;">tiempo de la membresía</label><br>
                                <select class="form-control">
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group" >
                                <label for="destino" style="color: #8c8c8c;font-weight: 600;font-size: 1rem;font-family: sans-serif;">precio de la membresía</label><br>
                                <label for="destino" style="color: #00bff0;font-weight: 600;font-size: 2.5rem;font-family: sans-serif;">$8,100 </label>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <br>
                            <button type="button" class="btn btn-blue" style="">comprar membresía</button>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="messages">
                    <div class="row" style="text-align: center;padding: 1rem;margin: 0;color: black;font-weight: 600;border-bottom: .2rem solid #00bff0;">
                        <div class="col-xs-4">
                            MEMBRESÍA
                        </div>
                        <div class="col-xs-2">
                            2 AÑOS
                        </div>
                        <div class="col-xs-2">
                            2 AÑOS
                        </div>
                        <div class="col-xs-2">
                            5 AÑOS
                        </div>
                        <div class="col-xs-2">
                            USUARIOS
                        </div>
                    </div>
                    <div class="row" style="text-align: center;padding: 1rem;margin: 0;color: black;font-weight: 600;border-bottom: .2rem solid #00bff0;">
                        <div class="col-xs-4">
                            <div class="radio">
                              <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                PERSONAL
                              </label>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            $6,000
                        </div>
                        <div class="col-xs-2">
                            $6,000
                        </div>
                        <div class="col-xs-2">
                            $12,750
                        </div>
                        <div class="col-xs-2">
                            1
                        </div>
                    </div>
                    <div class="row" style="text-align: center;padding: 1rem;margin: 0;color: black;font-weight: 600;border-bottom: .2rem solid #00bff0;">
                        <div class="col-xs-4">
                            <div class="radio">
                              <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                AMIGOS
                              </label>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            $6,000
                        </div>
                        <div class="col-xs-2">
                            $6,000
                        </div>
                        <div class="col-xs-2">
                            $12,750
                        </div>
                        <div class="col-xs-2">
                            1
                        </div>
                    </div>
                    <div class="row" style="text-align: center;padding: 1rem;margin: 0;color: black;font-weight: 600;border-bottom: .2rem solid #00bff0;">
                        <div class="col-xs-4">
                            <div class="radio">
                              <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                FAMILIAR
                              </label>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            $6,000
                        </div>
                        <div class="col-xs-2">
                            $6,000
                        </div>
                        <div class="col-xs-2">
                            $12,750
                        </div>
                        <div class="col-xs-2">
                            1
                        </div>
                    </div>
                    <div class="row" style="text-align: center;padding: 1rem;margin: 0;color: black;font-weight: 600;">
                        <div class="col-xs-4">
                            <div class="form-group" >
                                <label for="destino" style="color: #8c8c8c;font-weight: 600;font-size: 1rem;font-family: sans-serif;">tiempo de la membresía</label><br>
                                <select class="form-control">
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group" >
                                <label for="destino" style="color: #8c8c8c;font-weight: 600;font-size: 1rem;font-family: sans-serif;">precio de la membresía</label><br>
                                <label for="destino" style="color: #00bff0;font-weight: 600;font-size: 2.5rem;font-family: sans-serif;">$8,100 </label>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <br>
                            <button type="button" class="btn btn-blue" style="">comprar membresía</button>
                        </div>
                    </div>
                </div>
              </div>

            </div>
        </div>
        <div class="row" style="">
            <div class="col-xs-6 col-xs-offset-3" style="text-align: center; color: black;">
                *Cada usuario podrá realizar, administrar y visualizar sus propias reservaciones de forma independinte.
            </div>
        </div>
    </div>
</div>
<div class="container-fluid" style="background-color: #252a2e; padding: 25px 30px 25px 30px; text-align: center; color: #00bff0; font-size: 2rem;">
    ¡PORQUE TE LO MERECES Y TU FAMILIA TAMBIÉN!
</div>
<div class="container-fluid" style="background-color: white; padding: 25px 30px 25px 30px; text-align: justify; color: black; font-size: 1.4rem;">
    <div class="container" style="">
        <p>Hemos creado la mejor membresía de viajes en México, sin limite de reservaciones en más de
        <b>180,000 Hoteles</b> por todo el Mundo, Traslados del Aeropuerto al Hotel reservado ó de tú Hotel
        al Aeropuerto, así como infinidad de Atracciones turísticas que le darán la mejor diversión a tus
        vacaciones.</p>
        <p>A diferencia de otras membresías, osotros no te limitamos a reservar un cierto Hotel ó ciertas
        fechas para tu viaje, ya que entendemos perfectamente que no todas las personas tenemos el
        mismo tiempo disponibleso, los mismos gustos ó necesidades.</p>
        <p>Contamos con convenios con las <b>mejores cadenas Hoteleras,</b> sin embrago también podrás
        reservar pequeños hoteles y cabañas en cualquier destino que te imagines…</p>
        <p style="font-weight: 600; color: #00bff0; font-size: 2rem; text-align: center;">¡PARA QUE TE CONVENZAS MÁS!</p>
        <p>Eso no es todo, tu membresía permite realizar reservaciones para tí y en compañía de quien tu
        quieras, no existe restricción alguna en el numero de acompañantes o duración del viaje. En
        pocas palabras no te restringimos en nada! Elije la membresía que más te convenga, platica con
        tus amigos ó familia, e invítalos a ser parte de todos estos increíbles beneficios y ahorra en el
        costo por usuario.</p>
    </div>
</div>
<div class="container-fluid" style="background-color: #252a2e; padding: 25px 30px 25px 30px; text-align: center; color: #00bff0; font-size: 2rem;">
    <div class="container" style="">
        <p style="font-weight: 600; color: #00bff0; font-size: 2rem; text-align: center;">¡PARA QUE TE CONVENZAS MÁS!</p>
        <div class="col-xs-6 col-xs-offset-3" style="">
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/9hSz3pB4UC4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
    </div>
</div>
<div class="container-fluid" style="background-color: white; padding: 25px 30px 25px 30px; color: black; font-size: 1.4rem;">
    <p style="font-weight: 600; color: #00bff0; font-size: 4rem; text-align: center;">Beneficios</p>
    <div class="container" style="border: 1px solid;    border-radius: 10px;    padding: 2rem;">
        <div class="row" style="margin: 1rem;">
            <div class="col-xs-12 col-sm-6" style="margin-bottom: 1rem">
                <div class="col-xs-4" style="">
                    <div class="pull-right" style="height: 50px; background-color: #00bff0; border-radius: 50%; width: 50px;">                    
                    </div>
                </div>
                <div class="col-xs-8" style="">
                    <p class="col-xs" style="text-align: left; color: black;">Adquiere tú membresía y tus próximas vacaciones serán hasta 50% más baratas.
                    </p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6" style="">
                <div class="col-xs-4" style="">
                    <div class="pull-right" style="height: 50px; background-color: #00bff0; border-radius: 50%; width: 50px;">                    
                    </div>
                </div>
                <div class="col-xs-8" style="">
                    <p class="col-xs" style="text-align: left; color: black;">Te garantizamos el mejor precio, no hay nadie que nos iguale, ni el comparador de Trivago
                    </p>
                </div>
            </div>
        </div>
        <div class="row" style="margin: 1rem;">
            <div class="col-xs-12 col-sm-6" style="margin-bottom: 1rem">
                <div class="col-xs-4" style="">
                    <div class="pull-right" style="height: 50px; background-color: #00bff0; border-radius: 50%; width: 50px;">                    
                    </div>
                </div>
                <div class="col-xs-8" style="">
                    <p class="col-xs" style="text-align: left; color: black;">Con tú Membresía podrás reservar ilimitadamente más de 180,000 Hoteles por todo el mundo...
                    </p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6" style="">
                <div class="col-xs-4" style="">
                    <div class="pull-right" style="height: 50px; background-color: #00bff0; border-radius: 50%; width: 50px;">                    
                    </div>
                </div>
                <div class="col-xs-8" style="">
                    <p class="col-xs" style="text-align: left; color: black;">Tarifas y promociones exclusivas, únicamente para los miembros del programa. ¡Ofertas Reales!

                    </p>
                </div>
            </div>
        </div>
        <div class="row" style="margin: 1rem;">
            <div class="col-xs-12 col-sm-6" style="margin-bottom: 1rem">
                <div class="col-xs-4" style="">
                    <div class="pull-right" style="height: 50px; background-color: #00bff0; border-radius: 50%; width: 50px;">                    
                    </div>
                </div>
                <div class="col-xs-8" style="">
                    <p class="col-xs" style="text-align: left; color: black;">¡Reserva y paga despues! hasta 4 días antes de tu viaje... ó con tarjeta al momento. ¡Tú decides!
                    </p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6" style="">
                <div class="col-xs-4" style="">
                    <div class="pull-right" style="height: 50px; background-color: #00bff0; border-radius: 50%; width: 50px;">                    
                    </div>
                </div>
                <div class="col-xs-8" style="">
                    <p class="col-xs" style="text-align: left; color: black;">No esperes expos de viajes, reserva desde hoy. ¡Nosotros siempre estamos en Outlet!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection