<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>

        <title>Login</title>

        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css')}}"  type="text/css" media="screen"/>
        <link rel="stylesheet" href="{{ asset('dist/css/all_icons.css')}}"  type="text/css"/>
        <link rel="stylesheet" href="{{ asset('plugins/metisMenu/metisMenu.min.css')}}" type="text/css"/>
        <link rel="stylesheet" href="{{ asset('dist/css/kavach.min.css')}}" type="text/css"/>
        <link rel="stylesheet" href="{{ asset('dist/css/animate.css')}}" type="text/css"/>
        <style type="text/css">
            /* Change the white to any color ;) */
            input:-webkit-autofill {
                -webkit-box-shadow: 0 0 0px 1000px white inset !important;
            }
            body{
                background: url({{asset('img/background_login.jpg')}});
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center bottom;
            }
            .opacity {
                opacity: 0.9;
            }
        </style>
    </head>
    <body>
        <div class="container centered">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 opacity">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Inicio de sesión</h3>
                        </div>
                        <div class="panel-body">
                            <img src="{{asset('img/logo.png')}}" class="img-responsive" alt="" />
                            <form class="m-t-30 m-l-15 m-r-15" method="POST" action="login" autocomplete="off" id="form-log">
                                <fieldset>
                                    {!! csrf_field() !!}
                                    <div class="form-group {{ $errors->has('msg') ? ' error' : '' }}" style="padding-bottom: 1px;">
                                        <label class="form-label">Correo</label>
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" value="{{ @session('email') ? session('email') : '' }}" />
                                        @if ($errors->has('msg'))
                                            <span class="show-error">
                                                <strong>{{ $errors->first('msg') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Contraseña</label>
                                        <input class="form-control" placeholder="Contraseña" name="password" type="password" value="" />
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <div class="form-group">
                                        <button class="btn btn-login m-t-10" type="submit">Entrar <i class="fa fa-sign-in"></i></button>
                                    </div>

                                    {{-- <div class="form-group text-center">
                                        <p>¿No tienes cuenta aún? Regístrate <a class="cl-danger" href="{{url('sign-up')}}">aquí</a></p>
                                    </div> --}}
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
