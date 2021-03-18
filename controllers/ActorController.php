<?php
    require_once('models/Actor.php');
    class ActorController {
        private $_actorModel;
        public function __construct() {
            $this->_actorModel = new Actor();
        }
        public function actionIndex(){
            $actorsArr = $this->_actorModel->getAll();
            print_r($actorsArr);
            include_once('views/common/header.php');
            include_once('views/actor/index.php');
            include_once('views/common/footer.php');
            return;
        }
    }