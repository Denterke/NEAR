<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400&amp;subset=cyrillic-ext" rel="stylesheet">

        <!-- Styles -->
        <style>
            * {
                margin: 0;
                padding: 0;
            }

            html, body {
                background: #121d31;
                color: #636b6f;
                font-family: 'Ubuntu Light', 'Ubuntu';
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links {
                margin-top: 2vw;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                transition: color 0.3s;
            }

            .top-right > a {
                color: #9fa7ab;
            }

            .links > a:hover {
                color: #a5b1b7;
            }

            .top-right > a:hover {
                color: #dae3e8;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 0;
            }

            .top-left {
                position: absolute;
                left: 50px;
                top: 0;
                width: 10%;
            }

            .central {
                width: 55%;
                margin-left: 20%;
            }

            .m-b-md {
                margin-top: 5vw;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref">
            <div class="top-left links">
                <img src="images/logo.png" style="width: 100%;">
            </div>

            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/admin_panel') }}">Открыть панель управления</a>
                    @else
                        <a href="{{ url('/login') }}">Вход в панель управления</a>
                        <br><br>
                        <a href="{{ url('/register') }}">Подключиться к системе</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="central links">
                    <a href="https://laravel.com/docs">ЗАДАЧИ</a>
                    <a href="https://laracasts.com">ТЕХНОЛОГИИ</a>
                    <a href="https://laravel-news.com">ЦЕНЫ</a>
                    <a href="https://forge.laravel.com">СОТРУДНИЧЕСТВО</a>
                    <a href="https://github.com/laravel/laravel">КОМАНДА</a>
                </div>

                <div class="title m-b-md">
                    <img src="images/schema.png" style="width: 50%;">
                </div>
            </div>
        </div>
    </body>
</html>
