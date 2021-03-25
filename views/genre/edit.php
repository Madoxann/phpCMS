<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= FULL_SITE_ROOT?>genre/index">Жанры</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= FULL_SITE_ROOT?>actor/add">Актеры</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= FULL_SITE_ROOT?>producer/add">Режиссеры</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= FULL_SITE_ROOT?>movie/add">Фильмы</a>
            </li>
        </ul>
    </div>
</nav>
<main role="main" class="container">
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Название жанра</label>
            <input type="text" class="form-control" name="genre_name" value="<?= $genreData['genre_name'];?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Описание жанра</label>
            <input type="text" class="form-control" name="genre_description" value="<?= $genreData['genre_description'];?>">
        </div>
        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>
</main>
