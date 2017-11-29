<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="autor" content="NTN">
    <meta name="keywords" lang="es" content="css,html,javascript,recibos,pagos,pagos en linea,agua,luz,telefono">
    <meta name="keywords" lang="en-us" content="css,html,javascript,receipt,payment,pay on line,water,light,telephone">
    <meta name="description" content="Sitio web en el cual se cancelan servicios basicos como luz, agua, telefono e internet">
    <meta name="copyright" content="&copy;2017 NTN group">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pagos') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Ingreso
                    </a>
                  </div>
                  <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                      <li>
                        <a href="{{ url('/charges') }}">Efectuar Pagos</a>
                      </li>
                    </ul>
                  </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    @section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- Stripe.js --}}
    <script src="https://js.stripe.com/v3/"></script>
    @show
</body>
</html>
