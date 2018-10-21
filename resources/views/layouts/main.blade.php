<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title', isset($title) ? $title .' | Globo Hotel' : 'Globo Hotel')</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport" />
        <meta name="base-url" content="{{ url('') }}">

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css')}}"  type="text/css" media="screen"/>

        <link href="{{asset('plugins/bootstrap-datepicker/css/datepicker.min.css')}}" rel="stylesheet" type="text/css" media="screen"/>

        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/custom.css')}}"  type="text/css" media="screen"/>
        
    <body>
        <div class="container-fluid fondo-oscuro">
            <div class="container" >
                <div class="row" >
                    <img src="{{asset('img/phone.png')}}" class="col-sm" alt="Teléfono" /> 
                    <span class="col-sm text-normal-menu-white">+52 3321 898237</span>
                    <img src="{{asset('img/whatsapp.png')}}" class="col-sm" alt="WhatsApp"/> 
                    <span class="col-sm text-normal-menu-white">01 (33) 3942 6000</span>
                    <span class="col-sm pull-right text-normal-menu-white">Ayuda</span>
                    <span class="col-sm pull-right text-normal-menu-white">Iniciar Sesión</span>
                    <span class="col-sm pull-right text-normal-menu-white">Crear Cuenta</span>
                </div>
            </div>
        </div>
        <div class="container-fluid fondo-claro">
            <div class="container" >
                <div class="row" >
                    <a class="col-sm item-menu-princ" href="{{url('')}}"><img src="{{asset('img/logo.png')}}" width="130" alt="Globo Hotel" /> 
                    </a>
                    <a class="col-sm item-menu-princ @if($title == 'Viajeros') {{'menu-active'}} @endif" href="{{url('')}}" >Viajeros</a>
                    <a class="col-sm item-menu-princ @if($title == 'Membresias') {{'menu-active'}} @endif" href="{{url('membresias')}}">Membresias</a>
                    <a class="col-sm item-menu-princ @if($title == 'Agencias') {{'menu-active'}} @endif" href="{{url('agencias')}}">Agencias</a>
                    <a class="col-sm item-menu-princ @if($title == 'Socios') {{'menu-active'}} @endif" href="{{url('socios')}}">Socios</a>
                    <a class="col-sm item-menu-princ @if($title == 'Operadores') {{'menu-active'}} @endif" href="{{url('operadores')}}">Operadores</a>
                    <a class="col-sm item-menu-princ @if($title == 'Empresas') {{'menu-active'}} @endif" href="{{url('empresas')}}">Empresas</a>
                </div>
            </div>
        </div>
        @yield('content')
        <div class="container-fluid fondo-oscuro">
            <div class="container" >
                <div class="row" style="text-align: center;">                    
                    <span class="col-sm text-middle-white">Sigue a Globohotel.mx</span>
                    <img src="{{asset('img/facebook.png')}}" class="col-sm" style="width: 40px; margin-left: 4rem;" alt="Facebook" /> 
                    <img src="{{asset('img/twitter.png')}}" class="col-sm" style="width: 40px; margin-left: 1rem;" alt="Twitter" /> 
                    <img src="{{asset('img/youtube.png')}}" class="col-sm" style="width: 40px; margin-left: 1rem;" alt="Youtube" /> 
                    <img src="{{asset('img/instagram.png')}}" class="col-sm" style="width: 40px; margin-left: 1rem;" alt="Instagram" /> 
                </div>
            </div>
        </div>
        <div class="container-fluid fondo-azul">
            <div class="container" >
                <div class="row" style="text-align: center;">                    
                    <span class="col-sm-12 text-small-white">!SÓLO PARA CLIENTES EXCLUSIVOS!</span>
                    <span class="col-sm-12 text-middle-black">RECIBE ANTES QUE NADIE</span>
                    <span class="col-sm-12" style="color: black;font-weight: 600;font-size: 22px;">NUESTRA PROMOCIONES</span>
                </div>
                <div class="row" style="display: flex;  align-items: center;  justify-content: center;  flex-direction: row;"> 
                    <div class="col-sm-4" >
                        <input type="email" class="form-control" id="email" placeholder="escribe tu email" style="text-align: center;">
                    </div>    
                    <div class="col-sm" >
                        <button type="button" class="btn btn-black pull-left">¡QUIERO RECIBIRLAS!</button>
                    </div> 
                </div> 
            </div>
        </div>
        <div class="container-fluid" style="background-color: white; padding: 10px 30px 25px 30px;">
            <div class="container" >
                <div class="row" style="text-align: center;">                    
                    <span class="col-sm" style="color: black;">Conocenos</span>
                    <span class="col-sm" style="color: black; margin-left: 1.5rem;">Mi Factura</span>
                    <span class="col-sm" style="color: black; margin-left: 1.5rem;">Preguntas frecuentes</span>
                    <span class="col-sm" style="color: black; margin-left: 1.5rem;">Formas de pago</span>
                    <span class="col-sm" style="color: black; margin-left: 1.5rem;">Blog</span>
                    <span class="col-sm" style="color: black; margin-left: 1.5rem;">Terminos de uso</span>
                    <span class="col-sm" style="color: black; margin-left: 1.5rem;">Contacto</span>
                </div>
                <div class="row" style="padding: 35px 0px 35px 0px; display: flex;  align-items: center;  justify-content: center;  flex-direction: row;"> 
                    <img src="{{asset('img/logo.png')}}" class="col-sm" style="width: 100px;" alt="Globo Hotel" />    
                    <div class="col-sm" style="margin-left: 3rem;">
                        <span class="col-sm" style="color: black; margin-left: 1.5rem; font-weight: 600; font-size: 14px;">Derechos reservados 2018 Globohotel.mx</span>
                        <br>
                        <span class="col-sm" style="color: #00bff0; margin-left: 1.5rem; font-weight: 600; font-size: 14px;">LICENCIA SECTUR: 04140390976</span>
                    </div> 
                </div> 
            </div>
        </div>
    </body>
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    
    <script src="{{asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>
    
    <script type="text/javascript">
        $(document).ready(function () {        
            var itemsMainDiv = ('.MultiCarousel');
            var itemsDiv = ('.MultiCarousel-inner');
            var itemWidth = "";
            $("#rowImg").height($("#secondImg").height());
            $("#second").height($("#first").height());
            
            $('.leftLst, .rightLst').click(function () {
                var condition = $(this).hasClass("leftLst");
                if (condition)
                    click(0, this);
                else
                    click(1, this)
            });

            ResCarouselSize();

            $(window).resize(function () {
                $("#second").height($("#first").height());
                $("#rowImg").height($("#secondImg").height());
                ResCarouselSize();
            });

            //this function define the size of the items
            function ResCarouselSize() {
                var incno = 0;
                var dataItems = ("data-items");
                var itemClass = ('.item');
                var id = 0;
                var btnParentSb = '';
                var itemsSplit = '';
                var sampwidth = $(itemsMainDiv).width();
                var bodyWidth = $('body').width();
                $(itemsDiv).each(function () {
                    id = id + 1;
                    var itemNumbers = $(this).find(itemClass).length;
                    btnParentSb = $(this).parent().attr(dataItems);
                    itemsSplit = btnParentSb.split(',');
                    $(this).parent().attr("id", "MultiCarousel" + id);


                    if (bodyWidth >= 1200) {
                        incno = itemsSplit[3];
                        itemWidth = sampwidth / incno;
                    }
                    else if (bodyWidth >= 992) {
                        incno = itemsSplit[2];
                        itemWidth = sampwidth / incno;
                    }
                    else if (bodyWidth >= 768) {
                        incno = itemsSplit[1];
                        itemWidth = sampwidth / incno;
                    }
                    else {
                        incno = itemsSplit[0];
                        itemWidth = sampwidth / incno;
                    }
                    $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
                    $(this).find(itemClass).each(function () {
                        $(this).outerWidth(itemWidth);
                    });

                    $(".leftLst").addClass("over");
                    $(".rightLst").removeClass("over");

                });
            }


            //this function used to move the items
            function ResCarousel(e, el, s) {
                var leftBtn = ('.leftLst');
                var rightBtn = ('.rightLst');
                var translateXval = '';
                var divStyle = $(el + ' ' + itemsDiv).css('transform');
                var values = divStyle.match(/-?[\d\.]+/g);
                var xds = Math.abs(values[4]);
                if (e == 0) {
                    translateXval = parseInt(xds) - parseInt(itemWidth * s);
                    $(el + ' ' + rightBtn).removeClass("over");

                    if (translateXval <= itemWidth / 2) {
                        translateXval = 0;
                        $(el + ' ' + leftBtn).addClass("over");
                    }
                }
                else if (e == 1) {
                    var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                    translateXval = parseInt(xds) + parseInt(itemWidth * s);
                    $(el + ' ' + leftBtn).removeClass("over");

                    if (translateXval >= itemsCondition - itemWidth / 2) {
                        translateXval = itemsCondition;
                        $(el + ' ' + rightBtn).addClass("over");
                    }
                }
                $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
            }

            //It is used to get some elements from btn
            function click(ell, ee) {
                var Parent = "#" + $(ee).parent().attr("id");
                var slide = $(Parent).attr("data-slide");
                ResCarousel(ell, Parent, slide);
            }

        });
    </script>
</html>
