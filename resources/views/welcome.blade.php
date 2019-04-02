<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Distribuidores Macuro</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
  <div class="container-fluid">
    <div class="row" style="height:100vh;">

      <div class="col-md-6" style="background-image:url('/img/macuro-landing.jpg');
      height:100%; background-size:cover; background-repeat:no-repeat; background-position:center center;">

        <div class="row d-flex justify-content-center py-4">
          <img src="/img/LOGOTIPO-MACURO.png" alt="" width="200px">
        </div>

      </div>
      <!---Separador de columnas--->
      <div class="col-md-6" style="background-image:url('/img/background-sidebar-welcome.jpg');
      height:100%; background-size:cover; background-repeat:no-repeat; background-position:center center; padding:50px;">
        <div class="row">
          <h3 style="margin-left:15px; font-family:'Source Sans Pro'; font-weight:600;">INGRESAR:</h3>
        </div>
        <br>
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="row">
            <div class="form-group col-md-5">
              <input id="email" placeholder="Correo Electrónico" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
              @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group col-md-5">
                <input placeholder="Contraseña" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-md-2">
              <button type="submit" class="btn btn-primary" style="background-color:#8b0000; border-color:#8b0000; border-radius:0;">
                Entrar
              </button>
            </div>
          </div>
          <div class="form-group row">
              <div class="col-md-6">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="form-check-label" for="remember" style="font-weight:600;">
                          RECORDAR MIS DATOS
                      </label>
                  </div>
              </div>
          </div>
        </form>
        <br>
        <br>
        <div class="row">
          <h3 style="margin-left:15px; font-family:'Source Sans Pro'; font-weight:600;">¿DESEAS REGISTRARTE?</h3>
        </div>
        <br>
        <form action="" method="post">
          <div class="row">
            <div class="form-group col-md-6">
              <input type="text" class="form-control" placeholder="Nombre De La Empresa" required name="company">
            </div>
            <div class="form-group col-md-6">
              <input type="text" class="form-control" placeholder="Teléfono" required name="telephone">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-6">
              <input type="text" class="form-control" placeholder="Nombre" required name="name">
            </div>
            <div class="form-group col-md-6">
              <input type="text" class="form-control" placeholder="Celular" required name="cellphone">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-6">
              <input type="email" class="form-control" placeholder="Correo Electrónico" required name="email">
            </div>
            <div class="form-group col-md-6">
              <input type="text" class="form-control" placeholder="Ciudad" required name="Ciudad">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-6">
              <input type="text" class="form-control" placeholder="RIF" required name="rif">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-6">
              <button type="submit" class="btn btn-primary" style="background-color:#8b0000; border-color:#8b0000; border-radius:0;">
                Regístrate
              </button>
            </div>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>
</body>
</html>
