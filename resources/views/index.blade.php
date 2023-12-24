<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Counter Visiters</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="{{asset('js/counter.js')}}"></script>
</head>
<body class="d-flex h-100 text-center text-bg-light">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="mb-auto">
    <div>
      <nav class="nav nav-underline justify-content-center float-md-end">
        @auth('web')
        <a class="nav-link fw-bold py-1 px-0" aria-current="page" href="{{ route('stats') }}">Просмотреть статистику</a>
        <a class="btn btn-sm btn-outline-primary mx-3" href="{{ route('logout') }}">Выйти</a>
        @endauth
        @guest('web')
        <a class="nav-link fw-bold py-1 px-0" aria-current="page" href="{{ route('login') }}">Вход для просмотра статистики</a>
        @endguest
      </nav>
    </div>
  </header>
  <main class="px-3">
    <main>
      <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-body-tertiary">
        <div class="col-md-6 p-lg-5 mx-auto">
          <h1 class="display-3 fw-bold">Сайт статистики посетителей.</h1>
          <h3 class="fw-normal text-muted mb-3">Для получения пароля обратитесь к администратору</h3>
        </div>
      </div>
    </main>
  </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>