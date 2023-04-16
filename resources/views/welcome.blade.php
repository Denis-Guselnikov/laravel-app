<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-expand bg-light navbar-light">
                <div class="container-fluid">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="#" class="nav-link menu-link__active">Главная страница</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link menu-link">Каталок статей</a>
                        </li>
                    </ul>
                    <a href="https://github.com/Denis-Guselnikov" class="d-flex justify-content-end">
                        <i class="bi bi-github" style="font-size:2rem; color: black"></i>
                    </a>
                </div>
            </nav>
            <div class="hero" style="background-image: url(/img/laravel-app.png)">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero__content text-center">
                                <div class="hero__content-tag">
                                    <a href="#">Разработчик - PHP</a>
                                </div>
                                <h2><a href="#">Тестовое задание</a></h2>
                                <div class="hero__content-tag">
                                    <a href="#">QWE.ru</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
