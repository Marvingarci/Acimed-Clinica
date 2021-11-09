<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="es">
<!--<![endif]-->

<head>
    <meta charset="utf-8" name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Medical Record</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="/vendors/jqvmap/dist/jqvmap.min.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Exo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body{
            font-family: 'Exo', sans-serif;
        }
        .header-col{
            background: #E3E9E5;
            color:#536170;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }
        .header-calendar{
            background: #0cacea;color:white;
            height:50px;

        }
        .box-day{
            border:1px solid #E3E9E5;
            height:79px;
        }
        .box-dayoff{
            border:1px solid #E3E9E5;
            height:79px;
            background-color: #ccd1ce;
        }
        .col{
            text-align: right;
        }



    </style>

    

    @livewireStyles
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav id="nav-menu" class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav" id="lista">

                    <li class="active pt-10">
                        <a href="/"> <i class="menu-icon fa fa-home text-white"></i>Inicio</a>
                    </li>

                    @if(auth()->user()->is_admin == '1')
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Doctores</a>
                        <ul class="sub-menu children dropdown-menu" id="lista">
                            <li><i class="fa fa-users"></i><a href="/doctores/nuevo">Nuevo</a></li>
                            <li><i class="fa fa-user-md"></i><a href="/doctores">Registros</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Pacientes</a>
                        <ul class="sub-menu children dropdown-menu" id="lista">
                            <li><i class="fa fa-product-hunt"></i><a href="">Nuevo</a></li>
                            <li><i class="fa fa-product-hunt"></i><a href="">Registros</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-pencil-square-o"></i>Fecha</a>
                        <ul class="sub-menu children dropdown-menu" id="lista">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="{{ route('citas_index') }}">Nueva
                                    Cita</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="{{route('Evento.index')}}">Calendario de citas</a></li>
                        </ul>
                    </li>

                    @endif


                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-pencil-square-o"></i>Historial</a>
                        <ul class="sub-menu children dropdown-menu" id="lista">
                            <li id="letras"><i class="menu-icon fa fa-sign-in"></i><a href="https://www.ip.gob.hn/" target="_blank">Atenciones</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-info-circle"></i>Acerca de </a>
                        <ul class="sub-menu children dropdown-menu" id="lista">
                            <li><i class="menu-icon fa fa-coffee"></i><a href="">ACIMED</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->


    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="grid grid-cols-2 p-4 h-14 bg-blue-400">
            <div>
                <h1 class="text-2xl font-bold text-white">Citas Médicas</h1>
            </div>
            <div class="justify-self-end">
                <i class="fa fa-sign-in text-white"></i>
                <a class="text-white-300 text-sm" href="{{ route('logout') }}">
                    <button class="text-white">
                        Cerrar Sesión
                    </button> </a>
            </div>
        </header>
        <div class="content mt-3">
            <div class="min-h-screen bg-gray-100">
                <!-- Page Heading -->

                @yield('content')
                @stack('modals')

            </div> <!-- .content -->
        </div>
        <!-- /header -->
        <!-- Right Panel -->

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="/vendors/popper.js/dist/umd/popper.min.js"></script>
        <script src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>


        <script src="{{ asset('js/script.js') }}"></script>

        <script>
            $('#modalBorrarApertura').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id_apertura = button.data('id');
                var modal = $(this);
                modal.find('.modal-footer #idApertura').val(id_apertura);
            })
        </script>

        <script src="/assets/js/icheck.js"></script>
        <script src="/assets/js/app.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

        <script>
            $('.phone_mascara').mask('+000 0000-0000');
            $(document).ready(function() {
                $('.selector_buscador_1').select2();
            });
        </script>

        @stack('scripts')

        @livewireScripts
    </div>
</body>

</html>