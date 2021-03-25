<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= FULL_SITE_ROOT?>producer/index">Режиссеры</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= FULL_SITE_ROOT?>actor/index">Актеры</a>
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
        <label class="form-label">Имя режиссера</label>
        <input type="text" class="form-control" name="producer_name">
    </div>
    <div class="mb-3">
        <label class="form-label">Дата рождения режиссера</label>
        <input type="date" class="form-control" name="producer_dob">
    </div>
    <div class="mb-3">
        <label class="form-label">Страна режиссера</label>
        <input type="text" class="form-control" name="producer_country">
    </div>
    <div class="mb-3">
        <label class="form-label">Описание режиссера</label>
        <input type="text" class="form-control" name="producer_description">
    </div>
    <div class="mb-3">
        <label class="form-label">Награды режиссера</label>
        <input type="text" class="form-control" name="producer_awards" value="Отсутствуют">
    </div>
      <button type="submit" class="btn btn-primary">Добавить режиссера</button>
    </form>
</main>