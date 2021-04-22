<?php
class MovieControllerProxy{
    private $_actorController;
    private $_role;
    private $userModel;
    public function __construct(){
        $this->_movieController = new MovieController();
        $this->_userModel = new User();
        $this->_role = $this->_userModel->getRole();
    }
    public function actionIndex(){
        $this->_movieController->actionIndex();
    }
    public function actionView($id){
        $this->_movieController->actionView($id);
    }
    public function actionAdd(){
        if($this->_role === 'admin'){
            $this->_movieController->actionAdd();
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
            $this->_movieController->actionEdit($id);
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
            $this->_movieController->actionDelete($id);
        }
        else{
            //Не писать этого, а запретить кнопку
            include_once('views/common/header.php');
            include_once('views/common/no_rights.php');
            include_once('views/common/footer.php');
        }
    }
}