<?php
    class MovieController {
        private $_movieModel;
        public $userIsAuthorized;
        private $_userModel;
        public function __construct() {
            $this->_movieModel = new Movie();
            $this->_userModel = new User();
            $this->userIsAuthorized = $this->_userModel->checkIfUserAuth();
        }
        public function actionIndex(){
            $movieData = $this->_movieModel->getAll();
            include_once('views/common/header.php');
            include_once('views/movie/index.php');
            include_once('views/common/footer.php');
            return;
        }
        public function actionView($id){
            $movieData  = $this->_movieModel->getOneById($id);
            include_once('views/common/header.php');
            include_once('views/movie/index.php');
            include_once('views/common/footer.php');
            return;
        }
        public function actionAdd(){
            $producersId = $this->_movieModel->getIdTable('producers');
            $genresId = $this->_movieModel->getIdTable('genres');
            if (isset($_POST['movie_name'])){
                $movieProducerId = htmlentities($_POST['movie_producer_id']);
                $movieName = htmlentities($_POST['movie_name']);
                $movieDescription = htmlentities($_POST['movie_description']);
                $movieReleaseDate = htmlentities($_POST['movie_release_date']);
                $movieRating = htmlentities($_POST['movie_rating']);
                $movieGenreId = htmlentities($_POST['movie_genre_id']);
                $movieAwards = htmlentities($_POST['movie_awards']);
                $data = array(
                    'movie_producer_id' => $movieProducerId,
                    'movie_name' => $movieName,
                    'movie_description' => $movieDescription,
                    'movie_release_date' => $movieReleaseDate,
                    'movie_rating' => $movieRating,
                    'movie_genre_id' => $movieGenreId,
                    'movie_awards' =>$movieAwards
                );
                if($this->_movieModel->save($data)){
                    header('Location:'.FULL_SITE_ROOT.'movie/index');
                }
                else{
                    echo 'ERROR';
                }
            }
            include_once('views/common/header.php');
            include_once('views/movie/add.php');
            include_once('views/common/footer.php');
            return;
        }
        public function actionEdit($id){
            $movieData = $this->_movieModel->getOneById($id);
            $producersId = $this->_movieModel->getIdTable('producers');
            $genresId = $this->_movieModel->getIdTable('genres');
            include_once('views/common/header.php');
            include_once('views/movie/edit.php');
            include_once('views/common/footer.php');
            if (isset($_POST['movie_name'])) {
                $movieProducerId = htmlentities($_POST['movie_producer_id']);
                $movieName = htmlentities($_POST['movie_name']);
                $movieDescription = htmlentities($_POST['movie_description']);
                $movieReleaseDate = htmlentities($_POST['movie_release_date']);
                $movieRating = htmlentities($_POST['movie_rating']);
                $movieGenreId = htmlentities($_POST['movie_genre_id']);
                $movieAwards = htmlentities($_POST['movie_awards']);
                $data = array(
                    'movie_producer_id' => $movieProducerId,
                    'movie_name' => $movieName,
                    'movie_description' => $movieDescription,
                    'movie_release_date' => $movieReleaseDate,
                    'movie_rating' => $movieRating,
                    'movie_genre_id' => $movieGenreId,
                    'movie_awards' => $movieAwards
                );
                if ($this->_movieModel->update($data, $id)) {
                    //this header returns a warning: cannot modify header information - headers already sent by...idk how to fix that
                    header('Location:'.FULL_SITE_ROOT.'movie/index');
                }
            }
            return;
        }
        public function actionDelete($id){
            $this->_movieModel->remove($id);
            header('Location:'.FULL_SITE_ROOT.'movie/index');
        }
    }