<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Panel | Log in</title>

        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <link rel="stylesheet" href="{{ mix('/css/index.css', 'admin') }}">

        <style>@media print {#ghostery-purple-box {display:none !important}}</style>
</head>

<body class="hold-transition login-page justify-content-start" style="position: relative; background: url(../../admin/img/sign.bg.jpg) no-repeat center center, #272e35; background-size: cover; background-attachment: fixed;">
    <x-admin.message></x-admin.message>
    <div class="login-box">
        <div class="login-logo">
            <span style="color:white;"><b>Admin</b>Panel</span>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Увійдіть, щоб продовжити роботу</p>
                <form action="{{ route('admin.login') }}" method="post" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="input-group mb-3">
                        <input
                            type="text"
                            name="email"
                            tabindex="1"
                            autofocus
                            class="form-control"
                            placeholder="Email користувача"
                            required
                            value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input
                            type="password"
                            name="password"
                            tabindex="2"
                            class="form-control"
                            placeholder="Пароль"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 ml-auto">
                            <button
                                type="submit"
                                name="submit"
                                tabindex="3"
                                class="btn btn-primary btn-block">
                                Увійти
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </body>
</html>
