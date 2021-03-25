<?php
    class ActorController {
        private $_actorModel;
        public $userIsAuthorized;
        private $_userModel;
        public function __construct() {
            $this->_actorModel = new Actor();
            $this->_userModel = new User();
            $this->userIsAuthorized = $this->_userModel->checkIfUserAuth();
        }
        public function actionIndex(){
            $actorData = $this->_actorModel->getAll();
            include_once('views/common/header.php');
            include_once('views/actor/index.php');
            include_once('views/common/footer.php');
            return;
        }
        public function actionView($id){
            $actorData  = $this->_actorModel->getOneById($id);
            include_once('views/common/header.php');
            include_once('views/actor/index.php');
            include_once('views/common/footer.php');
            return;
        }
        public function actionAdd(){
            if (isset($_POST['actor_name'])){
                $actorName = htmlentities($_POST['actor_name']);
                $actorDob = htmlentities($_POST['actor_dob']);
                $actorCountry = htmlentities($_POST['actor_country']);
                $actorRating = htmlentities($_POST['actor_rating']);
                $actorDescription = htmlentities($_POST['actor_description']);
                $actorAwards = htmlentities($_POST['actor_awards']);
                //Понаделать проверок
                $data = array(
                    'actor_name' => $actorName,
                    'actor_dob' => $actorDob,
                    'actor_country' => $actorCountry,
                    'actor_rating' => $actorRating,
                    'actor_description' => $actorDescription,
                    'actor_awards' => $actorAwards
                );
                if($this->_actorModel->save($data)){
                    header('Location:'.FULL_SITE_ROOT.'actor/index');
                }
                else{
                    echo 'ERROR';
                }
            }
            include_once('views/common/header.php');
            include_once('views/actor/add.php');
            include_once('views/common/footer.php');
            return;
        }
        public function actionEdit($id){
            $actorData = $this->_actorModel->getOneById($id);
            $actorData = $actorData[0];
            include_once('views/common/header.php');
            include_once('views/actor/edit.php');
            include_once('views/common/footer.php');
            if (isset($_POST['actor_name'])) {
                $actorName = htmlentities($_POST['actor_name']);
                $actorDob = htmlentities($_POST['actor_dob']);
                $actorCountry = htmlentities($_POST['actor_country']);
                $actorRating = htmlentities($_POST['actor_rating']);
                $actorDescription = htmlentities($_POST['actor_description']);
                $actorAwards = htmlentities($_POST['actor_awards']);
                $data = array(
                    'actor_name' => $actorName,
                    'actor_dob' => $actorDob,
                    'actor_country' => $actorCountry,
                    'actor_rating' => $actorRating,
                    'actor_description' => $actorDescription,
                    'actor_awards' => $actorAwards
                );
                if ($this->_actorModel->update($data, $id)) {
                    header('Location:' . FULL_SITE_ROOT . 'actor/index');
                }
            }
            return;
        }
        public function actionDelete($id){
            $this->_actorModel->remove($id);
            header('Location:'.FULL_SITE_ROOT.'actor/index');
        }
    }