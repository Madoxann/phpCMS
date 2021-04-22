<?php
class ProducerControllerProxy{
    private $_producerController;
    private $_role;
    private $userModel;
    public function __construct(){
        $this->_producerController = new ProducerController();
        $this->_userModel = new User();
        $this->_role = $this->_userModel->getRole();
    }
    public function actionIndex(){
        $this->_producerController->actionIndex();
    }
    public function actionView($id){
        $this->_producerController->actionView($id);
    }
    public function actionAdd(){
        if($this->_role === 'admin'){
            $this->_producerController->actionAdd();
        }
        else{
            //Не писать этого, а запретить кнопку
            include_once('views/common/header.php');
            include_once('views/common/no_rights.php');
            include_once('views/common/footer.php');
        }
    }
    public function actionEdit($id){
        if($this->_role === 'admin'){
            $this->_producerController->actionEdit($id);
        }
        else{
            //Не писать этого, а запретить кнопку
            include_once('views/common/header.php');
            include_once('views/common/no_rights.php');
            include_once('views/common/footer.php');
        }
    }
    public function actionDelete($id){
        if($this->_role === 'admin'){
            $this->_producerController->actionDelete($id);
        }
        else{
            //Не писать этого, а запретить кнопку
            include_once('views/common/header.php');
            include_once('views/common/no_rights.php');
            include_once('views/common/footer.php');
        }
    }
}