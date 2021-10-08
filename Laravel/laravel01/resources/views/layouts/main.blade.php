<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <!-- fonte do google -->

        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!--  CSS bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Fonts -->
         <link rel="stylesheet" href="/css/style.css">
         <script src="/js/scripts.js"></script>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-sm navbar-light">
                <div class="collapse navbar-collapse" id='navbar'>
                    <a href="/" class="navbar-brand">
                        <img src="/img/botão_home.jpg" alt="Home" style="width: 50px">
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a href="/events/create" class="nav-link">Criar Eventos</a>
                        </li>
                       
                        <!-- links que será ser mostrado quando estiver autenticado-->
                        @auth
                            <li class="nav-item">
                                <a href="/dashboard" class="nav-link">Meus Eventos</a>
                            </li>

                            <li class="nav-item">
                                <form action="/logout" method="POST">
                                @csrf
                                <a href="/logout"
                                    class="nav-link"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">Sair
                                    
                                </a>
                                </form>
                            </li>

                        @endauth

                        @guest 
                            <li class="nav-item">
                                <a href="/login" class="nav-link">Entrar</a>
                            </li>
                            <li class="nav-item">
                                <a href="/register" class="nav-link">Cadastrar</a>
                            </li>
                        @endguest
                    </ul>
                </div>

            </nav>
        </header>

        <main>
            <div class="container-fluid">
                <div class="row">
                    @if(session('msg'))
                        <p class="msg">{{ session('msg') }}</p>
                       
                    @endif

                    @yield('content')
                </div>
            </div>
        </main>
        
        
       

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>