<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <main class="form-signin w-100 m-auto">
            <div class="d-flex justify-content-center row">
                <div class="col-lg-4 col-md-4 col-sm-9">
                    <form action="{{ route('login.store') }}" method="POST">
                        @csrf
                        <h1 class="h3 mt-5 mb-3 fw-bold">Пожалуйста Идентифицируйтесь</h1>
                          @error('email')
                          <p class="text-danger m-0">{{ $message }}</p>
                          @enderror
                        <div class="form-floating mb-3">
                          <input name="email" type="email" class="form-control @error('email') bg-danger-subtle @enderror" id="floatingInput" placeholder="name@example.com">
                          <label for="floatingInput">Почта</label>
                        </div>
                        <div class="form-floating">
                          <input name="password" type="password" class="form-control @error('email') bg-danger-subtle @enderror" id="floatingPassword" placeholder="Password">
                          <label for="floatingPassword">Пароль</label>
                        </div>
                        <button class="btn btn-primary w-100 mt-2 py-2" type="submit">Войти</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>