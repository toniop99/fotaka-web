<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fotaka</title>

    <link rel="manifest" id="my-manifest-placeholder">
    <link rel="shortcut icon" type="image/png" href="{{asset('favicon.png')}}"/>
    <link rel="apple-touch-icon" href="{{asset('storage/assets/logo-192.png')}}">
    <meta name="theme-color" content="#ffee58"/>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
          crossorigin="anonymous">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    @stack('styles')

</head>

<body>
<!-- navbar -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
    <div class="container-fluid navbar-container">
        <div class="logo-container">
            <a href="{{route('home')}}" class="navbar-brand logo-link">
                <img src="{{asset('storage/assets/logo.png')}}" alt="Fotaka Logo" class="logo">
            </a>
        </div>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link active" aria-current="page">
                        Inicio
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="orlasDropdown"
                       role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Orlas
                    </a>

                    <ul id="orlas-dropdown" class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start" aria-labelledby="orlasDropdown">
                        <li>
                            <a href="{{route('orlas')}}" class="dropdown-item">¿Qué hacemos?</a>
                        </li>
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-header">Acceso | orlas interactivas</div>

                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">
                        Servicios
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">
                        Productos
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact')}}" tabindex="-1" aria-disabled="true">Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<footer id="footer" class="footer py-4 bg-dark text-white-50 fixed-bottom">
    <div class="container">
        <div class="row">
            <div class="col">
                <small>Copyright &copy; fotaka.org</small>
            </div>

            <div class="col-6 d-flex justify-content-end">
                    <a class="social-link" href="https://www.facebook.com/Fotaka-Fot%C3%B3grafos-373508492798026" target="_blank">
                        <i class="fab fa-facebook fa-2x"></i>
                    </a>

                    <a class="social-link" href="https://www.instagram.com/fotakafotografia/?hl=es" target="_blank">
                        <i class="fab fa-instagram fa-2x"></i>
                    </a>
            </div>
        </div>
    </div>
</footer>

@stack('page-script')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

<script src="{{asset('js/app.js')}}"></script>

<script>

    if ('serviceWorker' in navigator) {
        // Register a service worker hosted at the root of the
        // site using the default scope.
        navigator.serviceWorker.register('/js/service-worker.js').then(function(registration) {
            console.log('Service worker registration succeeded:', registration);
        }, /*catch*/ function(error) {
            console.log('Service worker registration failed:', error);
        });
    } else {
        console.log('Service workers are not supported.');
    }
</script>

</body>
</html>
