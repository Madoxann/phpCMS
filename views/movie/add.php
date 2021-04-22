<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= FULL_SITE_ROOT?>movie/index">Фильмы</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= FULL_SITE_ROOT?>actor/index">Актеры</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= FULL_SITE_ROOT?>producer/index">Режиссеры</a>
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
        <label class="form-label">Название фильма</label>
        <input type="text" class="form-control" name="movie_name">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">ID режиссера</label>
        </div>
        <select class="custom-select" id="inputGroupSelect01" name="movie_producer_id">
            <option selected>Choose...</option>
            <?php foreach ($producersId as $oneId){?>
                <option value="<?=$oneId['producer_id'];?>"><?=$oneId['producer_id'];?></option>
            <?php }?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Дата выхода в прокат</label>
        <input type="date" class="form-control" name="movie_release_date">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">ID жанра</label>
        </div>
        <select class="custom-select" id="inputGroupSelect01" name="movie_genre_id">
            <option selected>Choose...</option>
            <?php foreach ($genresId as $oneId){?>
                <option value="<?=$oneId['genre_id'];?>"><?=$oneId['genre_id'];?></option>
            <?php }?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Оценка фильма</label>
        <input type="range" class="form-range" min="0" max="10" name="movie_rating">
    </div>
    <div class="mb-3">
        <label class="form-label">Описание фильма</label>
        <input type="text" class="form-control" name="movie_description">
    </div>
    <div class="mb-3">
        <label class="form-label">Награды фильма</label>
        <input type="text" class="form-control" name="movie_awards" value="Отсутствуют">
    </div>
      <button type="submit" class="btn btn-primary">Добавить фильм</button>
    </form>
</main>
