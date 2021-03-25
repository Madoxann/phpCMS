<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= FULL_SITE_ROOT?>actor/index">Актеры</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= FULL_SITE_ROOT?>actor/add">Добавить запись</a>
            </li>
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
                <a class="nav-link" href="<?= FULL_SITE_ROOT?>register">Регистрация</a>
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
            <label class="form-label">Ваш пароль</label>
            <input type="password" class="form-control" name="user_password">
        </div>
        <button type="submit" class="btn btn-primary">Войти</button>
    </form>
</main>

