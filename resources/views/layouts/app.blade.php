<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
  	<!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    <title>{{ config('app.name') }} - {{ config('app.subtitle') }}</title>
 

 
    
    <!--Bootshape-->
    <link href="{{ asset('css/bootshape.css') }}" rel="stylesheet">
 
 
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Navigation bar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
        </div>
        <nav role="navigation" class="collapse navbar-collapse navbar-right">
          <ul class="navbar-nav nav">
            <li class="active"><a href="/">Wszystkie eventy</a></li>
          </ul>
          <ul class="navbar-nav nav">
          <li class="active"><a href="/kino">Kino</a></li>
          </ul>
          <ul class="navbar-nav nav">
          <li class="active"><a href="/teatr">Teatr</a></li>
          </ul>
          <ul class="navbar-nav nav">
          <li class="active"><a href="/koncert">Koncerty</a></li>
          </ul>
          <ul class="navbar-nav nav">
          <li class="active"><a href="/archiwum">Archiwum</a></li>
          </ul>
          @can('admin-only', Auth::user())
          <ul class="navbar-nav nav"> <li class="active"><a href="/admin">Panel Administratora</a></li></ul>
          @endcan
        
          <ul class="navbar-nav nav" style="float:right;">
            @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Zaloguj się</a></li>
                            <li><a href="{{ route('register') }}">Rejestracja</a></li>
                           
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
 
 
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
 
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
          </ul>
        </nav>
        
        
        
      </div>
    </div><!-- End Navigation bar -->
 
<!-- Content -->
@yield('content')
    
 
      
      
    <!-- Footer -->
    <div class="footer text-center">
        <p>&copy; 2020 Zespołowe przedsięwzięcie inżynierskie - Grupa II</p>
    </div><!-- End Footer -->

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootshape.js') }}"></script>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>