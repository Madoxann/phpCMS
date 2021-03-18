<?php
    require_once('models/Actor.php');
    class ActorController {
        private $_actorModel;
        public function __construct() {
            $this->_actorModel = new Actor();
        }
        public function actionIndex(){
            $actorsArr = $this->_actorModel->getAll();
            include_once('views/common/header.php');
            include_once('views/actor/index.php');
            include_once('views/common/footer.php');
            return;
        }
        public function actionView($id){
            $actorOne = $this->_actorModel->getOneById($id);
            $actorsArr = $actorOne;
            include_once('views/actor/index.php');
            //throw at 404 if no such news
            return;
        }
        public function actionAdd(){
            if (isset($_POST['news_title'])){
                $newsTitle = htmlentities($_POST['news_title']);
                $newsAuthor = htmlentities($_POST['news_author']);
                $newsDescription = htmlentities($_POST['news_description']);
                $newsTags = htmlentities($_POST['news_tags']);
                //Понаделать проверок
                $data = array(
                    'title' => $newsTitle,
                    'author' => $newsAuthor,
                    'description' => $newsDescription,
                    'tags' => $newsTags
                );
                if($this->newsModel->save($data)){
                    header('Location:'.FULL_SITE_ROOT.'news/index');
                }
            }
            include_once('views/news/add.php');
            return;
        }
        public function actionEdit($id){
            if (isset($_POST['news_title'])) {
                $newsTitle = htmlentities($_POST['news_title']);
                $newsAuthor = htmlentities($_POST['news_author']);
                $newsDescription = htmlentities($_POST['news_description']);
                $newsTags = htmlentities($_POST['news_tags']);
                //Понаделать проверок
                $data = array(
                    'title' => $newsTitle,
                    'author' => $newsAuthor,
                    'description' => $newsDescription,
                    'tags' => $newsTags
                );
                if ($this->newsModel->update($data, $id)) {
                    header('Location:' . FULL_SITE_ROOT . 'news/index');
                }
                $newsInfo = $this->newsModel->getOneById($id);
                include_once('views/news/edit.php');
                return;
            }
        }
    }