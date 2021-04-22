<?php
    class GenreController {
        private $_actorModel;
        public $userIsAuthorized;
        private $_userModel;
        public function __construct() {
            $this->_genreModel = new Genre();
            $this->_userModel = new User();
            $this->userIsAuthorized = $this->_userModel->checkIfUserAuth();
        }
        public function actionIndex(){
            $genreData = $this->_genreModel->getAll();
            include_once('views/common/header.php');
            include_once('views/genre/index.php');
            include_once('views/common/footer.php');
            return;
        }
        public function actionView($id){
            $genreData  = $this->_genreModel->getOneById($id);
            include_once('views/common/header.php');
            include_once('views/genre/index.php');
            include_once('views/common/footer.php');
            return;
        }
        public function actionAdd(){
            if (isset($_POST['genre_name'])){
                $genreName = htmlentities($_POST['genre_name']);
                $genreDescription = htmlentities($_POST['genre_description']);
                $data = array(
                    'genre_name' => $genreName,
                    'genre_description' => $genreDescription
                );
                if($this->_genreModel->save($data)){
                    header('Location:'.FULL_SITE_ROOT.'genre/index');
                }
                else{
                    echo 'ERROR';
                }
            }
            include_once('views/common/header.php');
            include_once('views/genre/add.php');
            include_once('views/common/footer.php');
            return;
        }
        public function actionEdit($id){
            $genreData = $this->_genreModel->getOneById($id);
            $genreData = $genreData[0];
            include_once('views/common/header.php');
            include_once('views/genre/edit.php');
            include_once('views/common/footer.php');
            if (isset($_POST['genre_name'])) {
                $genreName = htmlentities($_POST['genre_name']);
                $genreDescription = htmlentities($_POST['genre_description']);
                $data = array(
                    'genre_name' => $genreName,
                    'genre_description' => $genreDescription
                );
                if ($this->_genreModel->update($data, $id)) {
                    header('Location:' . FULL_SITE_ROOT . 'genre/index');
                }
            }
            return;
        }
        public function actionDelete($id){
            $this->_genreModel->remove($id);
            header('Location:'.FULL_SITE_ROOT.'genre/index');
        }
    }
