<html>
    <head>
    <meta charset="utf8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}}</title>

     <link href='http://fonts.googleapis.com/css?family=Arizonia' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Qwigley' rel='stylesheet' type='text/css'>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/owl.theme.default.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}"/>

    <script src="{{asset('js/jquery-1.10.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jcarousel.js')}}"></script>
    <script src="{{asset('js/jquery.cookie-1.4.1.min.js')}}"></script>
    <script src="{{asset('js/angular.js')}}"></script>
    
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.js"></script>

    {{--  <script src="{{asset('js/angular-route.js')}}"></script>  --}}
    <script src="{{asset('js/angular-messages.js')}}"></script>
    <script src="{{asset('js/angular-translate.js')}}"></script>
    <script src="{{asset('js/angular-cookies.min.js')}}"></script>
    <script src="{{asset('js/angular-translate-storage-cookie.js')}}"></script>
    <script src="{{asset('js/angular-translate-loader-static-files.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <script src="https://use.fontawesome.com/9c41da6c01.js"></script>
    <script type="text/javascript" src="{{asset('js/main.js')}}">jQuery.noConflict();</script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/services.js')}}"></script>
    </head>
   
<body ng-app="Portfolio" data-lang="@{{ lang }}">
    <div class="container-fluid">

        <header class="row fixed">
            <nav class="col-xs-12 no-padding">
                <div id="logo-container">
                    <p class="fixed">Carolina Almeida</p>
                </div><!---
                --><div id="small-menu-container">
                    <i class="fa fa-bars both-centered fixed" aria-hidden="true"></i>
                </div>
                <ul id="nav-list" class="no-padding fixed">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#portefolio">@{{ 'Portefolio' | translate }}</a></li>
                    <li><a href="#competencias">@{{ 'Competencias' | translate }}</a></li>
                    <li><a href="#sobre">@{{ 'Sobre' | translate }}</a></li>
                    <li><a href="#contactos">@{{ 'Contactos' | translate }}</a></li>
                    <li class="lang">
                        <p ng-controller="Language">
                            <span ng-click="changeLang('pt')">PT</span> |
                            <span ng-click="changeLang('en')">EN</span>
                        </p>
                    </li>
                </ul>
            </nav>
        </header>

        <main class="row">
            @yield('content');
        </main>

        <footer class="row">
            <div class="no-padding">
                <ul id="social-container" class="vertical-centered">
                    <li><a href="mailto:aclopesalmeida@gmail.com"><i class="fa fa-envelope both-centered" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-github both-centered" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.linkedin.com/in/carolina-almeida-08335a9b"><i class="fa fa-linkedin both-centered" aria-hidden="true"></i></a></li>
                </ul>
                <p id="copyright" class="vertical-centered">&copy; 2018 Carolina Almeida - Todos os direitos reservados</p>
            </div>
        </footer>
    </body>
</html>