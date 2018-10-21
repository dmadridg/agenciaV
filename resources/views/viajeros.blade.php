@extends('layouts.main')

@section('content')
<div class="container-fluid" style="background-color: #d6d6d6; padding: 25px 30px 25px 30px;">
    <div class="container" style="">
        <div class="row row-eq-height" style="">                    
            <div class="col-xs-4 col-sm-2" style="background-color: white;border-radius: 2rem;padding: 1rem 0rem 5rem 0rem;"> 
                <ul class="list-unstyled">
                  <li style="color: white;background-color: #0086cf;padding: 0.5rem 0rem 0.5rem 1rem;font-size: 2rem;font-weight: 600;margin: 1rem 0rem;border-radius: 1rem;">Hoteles</li>
                  <li style="color: #0086cf;background-color: white;padding: 0.5rem 0rem 0.5rem 1rem;font-size: 2rem;font-weight: 600;margin: 1rem 0rem;border-radius: 1rem;">Vuelos</li>
                  <li style="color: #0086cf;background-color: white;padding: 0.5rem 0rem 0.5rem 1rem;font-size: 2rem;font-weight: 600;margin: 1rem 0rem;border-radius: 1rem;">Atracciones</li>
                  <li style="color: #0086cf;background-color: white;padding: 0.5rem 0rem 0.5rem 1rem;font-size: 2rem;font-weight: 600;margin: 1rem 0rem;border-radius: 1rem;">Traslados</li>
                  <li style="color: #0086cf;background-color: white;padding: 0.5rem 0rem 0.5rem 1rem;font-size: 2rem;font-weight: 600;margin: 1rem 0rem;border-radius: 1rem;">Autos</li>
                  <li style="color: #0086cf;background-color: white;padding: 0.5rem 0rem 0.5rem 1rem;font-size: 2rem;font-weight: 600;margin: 1rem 0rem;border-radius: 1rem;">Circuitos</li>
                </ul>
            </div>
            <div class="col-xs-8 col-sm-4" id="" style="margin-bottom: 2rem;"> 
                <div class="row" style="margin: 0rem 1rem;"> 
                    <div class="row" style="text-align: center; color: #6287c2; background-color: #c7c2c2; font-weight: 600;     border-radius: 1rem 1rem 0rem 0rem;">   
                        Los Mejores Precios en Hoteles
                    </div>
                    <div class="row" style="color: black; background-color: #edeff3; border-radius: 0rem 0rem 1rem 1rem;"">  
                        <div class="row" style="color: black; margin: 1rem; padding: 0;" > 
                            <div class="form-group" style="margin-top: 2rem;">
                                <label for="destino">Destino</label>
                                <input type="text" class="form-control" id="destino" placeholder="Buscar Destino">
                            </div>
                            <div class="form-group" >
                                <label for="destino">Fecha de llegada</label>
                                <input type="date" class="form-control" id="fechaLle" placeholder="dd-mm-yyyy">
                            </div>
                            <div class="form-group" >
                                <label for="destino">Fecha de salida</label>
                                <input type="date" class="form-control" id="fechaSal" placeholder="dd-mm-yyyy">
                            </div>
                            <div class="form-group" >
                                <label for="destino">Habitaciones</label><br>
                                <div class="btn-group" data-toggle="buttons">
                                  <label class="btn btn-default active">
                                    <input type="radio" name="habitaciones" id="habitacion1" autocomplete="off" checked>1
                                  </label>
                                  <label class="btn btn-default">
                                    <input type="radio" name="habitaciones" id="habitacion2" autocomplete="off">2
                                  </label>
                                  <label class="btn btn-default">
                                    <input type="radio" name="habitaciones" id="habitacion3" autocomplete="off">3
                                  </label>
                                  <label class="btn btn-default">
                                    <input type="radio" name="habitaciones" id="habitacion4" autocomplete="off">4
                                  </label>
                                  <label class="btn btn-default">
                                    <input type="radio" name="habitaciones" id="habitacion5" autocomplete="off">5
                                  </label>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group" >
                                    <label for="destino">Adultos</label><br>
                                    <select class="form-control">
                                      <option>1</option>
                                      <option>2</option>
                                      <option>3</option>
                                      <option>4</option>
                                      <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group" >
                                    <label for="destino">Niños</label><br>
                                    <select class="form-control">
                                      <option>1</option>
                                      <option>2</option>
                                      <option>3</option>
                                      <option>4</option>
                                      <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary pull-right" style="margin-top: 1rem;">BUSCAR</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div id="slide1" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#slide1" data-slide-to="0" class="active"></li>
                    <li data-target="#slide1" data-slide-to="1"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    <div class="item active">
                      <img src="{{asset('img/card-bg-2.jpg')}}" alt="...">
                      <div class="carousel-caption">
                            
                      </div>
                    </div>
                    <div class="item">
                      <img src="{{asset('img/card-bg-3.jpg')}}" alt="...">
                      <div class="carousel-caption">
                            
                      </div>
                    </div>
                  </div>

                  <!-- Controls -->
                  <a class="left carousel-control" href="#slide1" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#slide1" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid" style="background-color: white; padding: 25px 0 25px 0;">
    <div class="MultiCarousel" data-items="1,2,3,3" data-slide="1" id="MultiCarousel2"  data-interval="1000">
        <div class="MultiCarousel-inner">
            <div class="item">
                <div class="pad15">
                    <img src="{{asset('img/card-bg-2.jpg')}}" class="col-sm img-carrousel" style="width: 100%" alt="Teléfono" />
                </div>
            </div>
            <div class="item">
                <div class="pad15">
                    <img src="{{asset('img/card-bg-2.jpg')}}" class="col-sm img-carrousel" style="width: 100%" alt="Teléfono" />
                </div>
            </div>
            <div class="item">
                <div class="pad15">
                    <img src="{{asset('img/card-bg-2.jpg')}}" class="col-sm img-carrousel" style="width: 100%" alt="Teléfono" />
                </div>
            </div>
            <div class="item">
                <div class="pad15">
                    <img src="{{asset('img/card-bg-2.jpg')}}" class="col-sm img-carrousel" style="width: 100%" alt="Teléfono" />
                </div>
            </div>
            
        </div>
        <button class="btn btn-primary leftLst"><</button>
        <button class="btn btn-primary rightLst">></button>
    </div>
</div>
<div class="container-fluid" style="background-color: #00bff0; padding: 25px 30px 25px 30px;">
    <div class="container" style="">
        <div class="row" style="padding: 35px 0px 35px 0px; display: flex;  align-items: center;  justify-content: center;  flex-direction: row;"> 
            <div class="col-xs"  style="text-align: center;">
                <span class="col-xs" style="color: white;font-weight: 600;font-size: 30px;">¡Reserva y paga a MSI!</span><br>
                <span class="col-xs" style="color: black;font-weight: 600;font-size: 16px;">Consulta nuestras Formas de pago</span>
            </div> 
            <img src="{{asset('img/msi.png')}}" class="col-xs" style="width: 100px; margin-left: 3rem;" alt="Msi" />    
        </div> 
        <div class="row" style="text-align: center;">                    
            <img src="{{asset('img/pagos.png')}}" class="col-xs" style="width: 70%" alt="Msi" /> 
        </div> 
    </div>
</div>
<div class="container-fluid" style="background-color: white; padding: 25px 30px 25px 30px;">
    <div class="container" style="">
        <div class="row row-eq-height" id="rowImg" style="">
            <img src="{{asset('img/card-bg-2.jpg')}}" class="col-xs-4" alt="Teléfono" style="height: 100%" /> 
            <img src="{{asset('img/card-bg-2.jpg')}}" class="col-xs-8" id="secondImg" alt="Teléfono" style="height: 100%" /> 
        </div>
        <div class="row" style="font-size: 4rem; color: black; font-weight: 600; text-align: center; margin-top: 3rem">
            Hoteles Recomendados
        </div> 
        <div class="row" style="font-size: 4rem; color: black; font-weight: 600; text-align: center; margin-top: 3rem">
            <div class="MultiCarousel" data-items="1,5,5,5" data-slide="1" id="MultiCarousel"  data-interval="1000">
                <div class="MultiCarousel-inner">
                    <div class="item">
                        <div class="pad15">
                            <img src="{{asset('img/card-bg-2.jpg')}}" class="col-sm img-carrousel" style="width: 100%" alt="Teléfono" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="pad15">
                            <img src="{{asset('img/card-bg-2.jpg')}}" class="col-sm img-carrousel" style="width: 100%" alt="Teléfono" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="pad15">
                            <img src="{{asset('img/card-bg-2.jpg')}}" class="col-sm img-carrousel" style="width: 100%" alt="Teléfono" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="pad15">
                            <img src="{{asset('img/card-bg-2.jpg')}}" class="col-sm img-carrousel" style="width: 100%" alt="Teléfono" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="pad15">
                            <img src="{{asset('img/card-bg-2.jpg')}}" class="col-sm img-carrousel" style="width: 100%" alt="Teléfono" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="pad15">
                            <img src="{{asset('img/card-bg-2.jpg')}}" class="col-sm img-carrousel" style="width: 100%" alt="Teléfono" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="pad15">
                            <img src="{{asset('img/card-bg-2.jpg')}}" class="col-sm img-carrousel" style="width: 100%" alt="Teléfono" />
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary leftLst"><</button>
                <button class="btn btn-primary rightLst">></button>
            </div>
        </div> 
        <div class="row" style="">
            <div class="col-xs-12 col-sm-6" style="">
                <div class="col-xs-8" style="">
                    <p class="col-xs" style="text-align: right; color: #00bff0;font-weight: 600;font-size: 4rem;">Chat</p>
                    <p class="col-xs pull-right" style="text-align: right; color: black; font-size: 2rem;">Obtén siempre atención y asesoría personalizada</p>
                </div>
                <div class="col-xs-4" style="">
                    <img src="{{asset('img/chat.png')}}" alt="Chat" style="width: 100%;" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-6" style="">
                <div class="col-xs-4" style="">
                    <img src="{{asset('img/facilidad.png')}}" alt="Chat" style="width: 100%;" />
                </div>
                <div class="col-xs-8" style="">
                    <p class="col-xs" style="text-align: left; color: #00bff0;font-weight: 600;font-size: 4rem;">Facilidad</p>
                    <p class="col-xs pull-right" style="text-align: left; color: black; font-size: 2rem;">Reserva tu viaje usando nuestra plataforma intuitiva</p>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 2rem">
            <div class="col-xs-12 col-sm-6" style="">
                <div class="col-xs-8" style="">
                    <p class="col-xs" style="text-align: right; color: #00bff0;font-weight: 600;font-size: 4rem;">Opciones</p>
                    <p class="col-xs pull-right" style="text-align: right; color: black; font-size: 2rem;">Reserva más de 200,000 hoteles por todo el mundo</p>
                </div>
                <div class="col-xs-4" style="">
                    <img src="{{asset('img/opciones.png')}}" alt="Chat" style="width: 100%;" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-6" style="">
                <div class="col-xs-4" style="">
                    <img src="{{asset('img/promociones.png')}}" alt="Chat" style="width: 100%;" />
                </div>
                <div class="col-xs-8" style="">
                    <p class="col-xs" style="text-align: left; color: #00bff0;font-weight: 600;font-size: 4rem;">Promociones</p>
                    <p class="col-xs pull-right" style="text-align: left; color: black; font-size: 2rem;">Recibe en tu e-mail ofertas de viaje 100% reales</p>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 2rem">
            <div class="col-xs-12 col-sm-6" style="">
                <div class="col-xs-8" style="">
                    <p class="col-xs" style="text-align: right; color: #00bff0;font-weight: 600;font-size: 4rem;">Ahorro</p>
                    <p class="col-xs pull-right" style="text-align: right; color: black; font-size: 2rem;">Nuestros increibles precios te harán incrementar tus viajes</p>
                </div>
                <div class="col-xs-4" style="">
                    <img src="{{asset('img/ahorro.png')}}" alt="Chat" style="width: 100%;" />
                </div>
            </div>
            <div class="col-xs-12 col-sm-6" style="">
                <div class="col-xs-4" style="">
                    <img src="{{asset('img/administracion.png')}}" alt="Chat" style="width: 100%;" />
                </div>
                <div class="col-xs-8" style="">
                    <p class="col-xs" style="text-align: left; color: #00bff0;font-weight: 600;font-size: 4rem;">Administración</p>
                    <p class="col-xs pull-right" style="text-align: left; color: black; font-size: 2rem;">Abre una cuenta, controla tus viajes y obtén beneficios</p>
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection