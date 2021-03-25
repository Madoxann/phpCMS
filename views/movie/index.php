<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Фильмы</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= FULL_SITE_ROOT?>movie/add">Добавить запись</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= FULL_SITE_ROOT?>actor/index">Актеры</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= FULL_SITE_ROOT?>producer/index">Режиссеры</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= FULL_SITE_ROOT?>genre/index">Жанры</a>
            </li>
            <?php if (!$this->userIsAuthorized){?>
            <li class="nav-item">
                <a class="nav-link" href="<?= FULL_SITE_ROOT?>authorize">Авторизация</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= FULL_SITE_ROOT?>register">Регистрация</a>
            </li>
            <?php }else{?>
            <li class="nav-item">
                <a class="nav-link" href="<?= FULL_SITE_ROOT?>logout">Выход</a>
            </li>
            <?php }?>
        </ul>
    </div>
</nav>
<main role="main" class="container">
    <div id="slide" class="carousel carousel-light slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#slide" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#slide" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#slide" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item" data-bs-interval="2000">
                <img src="<?= FULL_SITE_ROOT?>views/img/actor.jpg" class="card-img-top" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Актеры</h5>
                    <p>Все об актерах</p>
                </div>
            </div>
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="<?= FULL_SITE_ROOT?>views/img/producer.jpg" class="card-img-top" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Режиссеры</h5>
                    <p>Все о режиссерах</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= FULL_SITE_ROOT?>views/img/genres.jpg" class="card-img-top" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Жанры</h5>
                    <p>Узнайте о жанрах кино и выберите шедевр на свой вкус</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#slide"  data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#slide"  data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <?php $counter = 0?>
    <?php foreach ($movieData as $movieOne): ?>
        <?php $counter += 1?>
        <?php if($counter % 4 == 0 || $counter == 1){
            echo '<div class="row">';
        } ?>
        <div class="col">
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $movieOne['movie_name']; ?></h5>
                    <p class="card-text">Выпущен в прокат: <?= $movieOne['movie_release_date']; ?>, Режиссер: <?= $movieOne['movie_producer_name']; ?>,  Жанр: <?= $movieOne['movie_genre_name']; ?>, Оценка пользователей: <?= $movieOne['movie_rating']; ?></p>
                    <p class="card-text"><?= $movieOne['movie_description']; ?></p>
                    <p class="card-text">Награды: <?= $movieOne['movie_awards']; ?></p>
                    <div class="text-center">
                        <a href="<?= FULL_SITE_ROOT?>movie/edit/<?=$movieOne['movie_id']?>" class="btn btn-primary">Изменить</a>
                        <a href="<?= FULL_SITE_ROOT?>movie/delete/<?=$movieOne['movie_id']?>" class="btn btn-danger">Удалить</a>
                    </div>
                </div>
            </div>
        </div>
        <?php if($counter % 3 == 0){
            echo '</div>';
        } ?>
    <?php endforeach; ?>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>