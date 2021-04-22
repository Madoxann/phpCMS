<?php
class ActorControllerProxy{
    private $_actorController;
    private $_role;
    private $userModel;
    public function __construct(){
        $this->_actorController = new ActorController();
        $this->_userModel = new User();
        $this->_role = $this->_userModel->getRole();
    }
    public function actionIndex(){
        $this->_actorController->actionIndex();
    }
    public function actionView($id){
        $this->_actorController->actionView($id);
    }
    public function actionAdd(){
        if($this->_role === 'admin'){
            $this->_actorController->actionAdd();
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
            $this->_actorController->actionEdit($id);
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
            $this->_actorController->actionDelete($id);
        }
        else{
            //Не писать этого, а запретить кнопку
            include_once('views/common/header.php');
            include_once('views/common/no_rights.php');
            include_once('views/common/footer.php');
        }
    }
}
