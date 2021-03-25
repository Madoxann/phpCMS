<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= FULL_SITE_ROOT?>actor/index">Актеры</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= FULL_SITE_ROOT?>producer/index">Режиссеры</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= FULL_SITE_ROOT?>movie/index">Фильмы</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= FULL_SITE_ROOT?>genre/index">Жанры</a>
            </li>
        </ul>
    </div>
</nav>
<main role="main" class="container">
    <form method="post">
    <div class="mb-3">
        <label class="form-label">Имя актера</label>
        <input type="text" class="form-control" name="actor_name">
    </div>
    <div class="mb-3">
        <label class="form-label">Дата рождения актера</label>
        <input type="date" class="form-control" name="actor_dob">
    </div>
    <div class="mb-3">
        <label class="form-label">Страна актера</label>
        <input type="text" class="form-control" name="actor_country">
    </div>
    <div class="mb-3">
        <label class="form-label">Оценка актера</label>
        <input type="range" class="form-range" min="0" max="10" name="actor_rating">
    </div>
    <div class="mb-3">
        <label class="form-label">Описание актера</label>
        <input type="text" class="form-control" name="actor_description">
    </div>
    <div class="mb-3">
        <label class="form-label">Награды актера</label>
        <input type="text" class="form-control" name="actor_awards" value="Отсутствуют">
    </div>
      <button type="submit" class="btn btn-primary">Добавить актера</button>
    </form>
</main>