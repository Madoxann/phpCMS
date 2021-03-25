<?php
    class ProducerController {
        private $_producerModel;
        public $userIsAuthorized;
        private $_userModel;
        public function __construct() {
            $this->_producerModel = new Producer();
            $this->_userModel = new User();
            $this->userIsAuthorized = $this->_userModel->checkIfUserAuth();
        }
        public function actionIndex(){
            $producerData = $this->_producerModel->getAll();
            include_once('views/common/header.php');
            include_once('views/producer/index.php');
            include_once('views/common/footer.php');
            return;
        }
        public function actionView($id){
            $producerData  = $this->_producerModel->getOneById($id);
            include_once('views/common/header.php');
            include_once('views/producer/index.php');
            include_once('views/common/footer.php');
            return;
        }
        public function actionAdd(){
            if (isset($_POST['producer_name'])){
                $producerName = htmlentities($_POST['producer_name']);
                $producerDob = htmlentities($_POST['producer_dob']);
                $producerCountry = htmlentities($_POST['producer_country']);
                $producerDescription = htmlentities($_POST['producer_description']);
                $producerAwards = htmlentities($_POST['producer_awards']);
                //Понаделать проверок
                $data = array(
                    'producer_name' => $producerName,
                    'producer_dob' => $producerDob,
                    'producer_country' => $producerCountry,
                    'producer_description' => $producerDescription,
                    'producer_awards' => $producerAwards
                );
                if($this->_producerModel->save($data)){
                    header('Location:'.FULL_SITE_ROOT.'producer/index');
                }
                else{
                    echo 'ERROR';
                }
            }
            include_once('views/common/header.php');
            include_once('views/producer/add.php');
            include_once('views/common/footer.php');
            return;
        }
        public function actionEdit($id){
            $producerData = $this->_producerModel->getOneById($id);
            $producerData = $producerData[0];
            include_once('views/common/header.php');
            include_once('views/producer/edit.php');
            include_once('views/common/footer.php');
            if (isset($_POST['producer_name'])) {
                $producerName = htmlentities($_POST['producer_name']);
                $producerDob = htmlentities($_POST['producer_dob']);
                $producerCountry = htmlentities($_POST['producer_country']);
                $producerDescription = htmlentities($_POST['producer_description']);
                $producerAwards = htmlentities($_POST['producer_awards']);
                $data = array(
                    'producer_name' => $producerName,
                    'producer_dob' => $producerDob,
                    'producer_country' => $producerCountry,
                    'producer_description' => $producerDescription,
                    'producer_awards' => $producerAwards
                );
                if ($this->_producerModel->update($data, $id)) {
                    header('Location:' . FULL_SITE_ROOT . 'producer/index');
                }
            }
            return;
        }
        public function actionDelete($id){
            $this->_producerModel->remove($id);
            header('Location:'.FULL_SITE_ROOT.'producer/index');
        }
    }