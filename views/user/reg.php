<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= FULL_SITE_ROOT?>actor/index">Актеры</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Режиссеры</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Фильмы</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Жанры</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= FULL_SITE_ROOT?>authorize">Авторизация</a>
            </li>
        </ul>
    </div>
</nav>
<main role="main" class="container">
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Ваш логин</label>
            <input type="text" class="form-control" name="user_login">
        </div>
        <div class="mb-3">
            <label class="form-label">Ваша почта</label>
            <input type="email" class="form-control" name="user_email">
        </div>
        <div class="mb-3">
            <label class="form-label">Ваш пароль</label>
            <input type="password" class="form-control" name="user_password">
        </div>
        <div class="mb-3">
            <label class="form-label">Повторите пароль</label>
            <input type="password" class="form-control" name="user_repeat_password">
        </div>
        <div class="mb-3">
            <label class="form-label">Ваш адрес</label>
            <input type="text" class="form-control" name="user_address">
        </div>
        <div class="mb-3">
            <label class="form-label">Ваш телефон</label>
            <input type="text" class="form-control" name="user_phone">
        </div>
        <div class="mb-3">
            <label class="form-label">Ваша дата рождения</label>
            <input type="date" class="form-control" name="user_dob">
        </div>
        <button type="submit" class="btn btn-primary">Зарегестрироваться</button>
    </form>
</main>
