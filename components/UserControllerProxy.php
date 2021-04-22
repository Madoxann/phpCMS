<?php
class UserControllerProxy{
    private $_userController;
    private $_role;
    //Будет иметь значения: authorized, unauthorized
    private $userModel;
    public function __construct(){
        $this->_userController = new UserController();
        $this->_userModel = new User();
        $this->_role = $this->_userModel->getRole();
    }
    public function actionReg(){
        if($this->_role === 'unauthorized'){
            $this->_userController->actionReg();
        }
        else{
            //Не писать этого, а запретить кнопку
            include_once('views/common/header.php');
            include_once('views/common/no_rights.php');
            include_once('views/common/footer.php');
        }
    }
    public function actionAuth(){
        if($this->_role === 'unauthorized'){
            $this->_userController->actionAuth();
        }
        else{
            //Не писать этого, а запретить кнопку
            include_once('views/common/header.php');
            include_once('views/common/no_rights.php');
            include_once('views/common/footer.php');
        }
    }
    public function actionLogout(){
        if($this->_role === 'authorized' or $this->_role === 'admin'){
            $this->_userController->actionLogout();
        }
        else{
            //Не писать этого, а запретить кнопку
            include_once('views/common/header.php');
            include_once('views/common/no_rights.php');
            include_once('views/common/footer.php');
        }
    }
}
