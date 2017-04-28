<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Login | Portal de servicios Fusagasugá </title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('plugins/css/bootstrap.min.css') }}" rel="stylesheet">

  <link href="{{ asset('plugins/fonts/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('plugins/css/animate.min.css') }}" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="{{ asset('plugins/css/custom.css') }}" rel="stylesheet">
  <link href="{{ asset('plugins/css/icheck/flat/green.css') }}" rel="stylesheet">

  <script src="{{ asset('plugins/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('plugins/js/jquery.min.js') }}"></script>
  <script src="{{ asset('plugins/js/bootstrap2.min.js') }}"></script>
  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->

        </head>

        <body style="background:#F7F7F7;">

          <div class="">
            <a class="hiddenanchor" id="toregister"></a>
            <a class="hiddenanchor" id="tologin"></a>

            <div id="wrapper">

              <div id="login" class="animate form">
                <section class="login_content">
                  {!! Form::open(['route'=> 'login', 'method' => 'POST']) !!}

                  {!! csrf_field() !!}
                  <h1>Ingreso</h1>
                  <div class="text-center animate form">
                    @include('flash::message')
                  </div>
                  <div>
                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required']) !!}
                  </div>
                  <div>
                    <input type="password" class="form-control" placeholder="Contraseña" required="" id="password" name="password"/>
                  </div>
                  <div>
                    {!! Form::submit('Ingresar', ['class' => 'btn btn-default', 'name' => 'ingresar']) !!}
                    {!! Form::button('Volver', ['class' => 'btn btn-default', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}
                    <a class="reset_pass" style="display: none" href="#">No recuerdas tu contraseña?</a>
                  </div>
                  <div class="clearfix"></div>
                  <div class="separator">

                    <p class="change_link">Eres Nuevo?
                      <a href="#toregister" class="to_register"> Crea una cuenta </a>
                    </p>
                    <div class="clearfix"></div>
                    <br />
                    <div>
                      <h1><i class="fa fa-institution" style="font-size: 22px;"></i> Portal de servicios Fusagasugá</h1>

                      <p>©2016 Universidad de Cundinamarca</p>
                    </div>
                  </div>
                  {!! Form::close() !!}
                  <!-- form -->
                </section>
                <!-- content -->
              </div>
              <div id="register" class="animate form">
                <section class="login_content">
                  {!! Form::open(['route' => 'registrar', 'method' => 'POST', 'files' => true]) !!}
                  <h1>Crear Cuenta</h1>



                  <div class="clearfix"></div>
                  <div class="separator">

                    <div class="form-group">

                      {!! Form::text('id', null, ['class' => 'form-control', 'placeholder' => 'Numero de documento', 'required', 'pattern' => '[0-9]{8,30}', 'title' => 'La Cedula Solo Debe Contener Numeros y tener una longitud minima de 8 Digitos']) !!}
                    </div>

                    <div class="form-group">

                      {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre Completo', 'required', 'pattern' => '[A-Za-z- ]{3,120}', 'title' => 'El Nombre Solo Debe Tener Letras']) !!}
                    </div>

                    <div class="form-group">

                      {!! Form::text('apellido', null, ['class' => 'form-control', 'placeholder' => 'Apellido Completo', 'required', 'pattern' => '[A-Za-z.Ññ- ]{3,120}', 'title' => 'El Apellido Solo Debe Tener Letras']) !!}
                    </div>

                    <div class="form-group">

                      {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'required', 'pattern' => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$', 'title' => 'El Email Debe De Tener el Formato example@example.com']) !!}
                    </div>

                    <div class="form-group">

                      {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'contraseña', 'required', 'title' => 'Debe contener al menos un número y una mayúscula y minúscula, y al menos 8 o más caracteres']) !!}
                    </div>

                    <div class="form-group">
                      {!! Form::submit('Registrar', ['class' => 'btn btn-default'])!!}
                      {!! Form::reset('Limpiar', ['class' => 'btn btn-default'])!!}
                    </div>

                    <p class="change_link">Ya tienes cuenta ?
                      <a href="#tologin" class="to_register"> Ingresar </a>
                    </p>
                    <div class="clearfix"></div>
                    <br />
                    <div>
                      <h1><i class="fa fa-institution" style="font-size: 22px;"></i> Portal de servicios Fusagasugá</h1>

                      <p>©2016 Universidad de Cundinamarca</p>
                    </div>
                  </div>
                  {!! Form::close() !!}
                  <!-- form -->
                </section>
                <!-- content -->
              </div>

            </div>
          </div>

        </body>

        </html>
