<?php
class GenreControllerProxy{
    private $_actorController;
    private $_role;
    private $userModel;
    public function __construct(){
        $this->_genreController = new GenreController();
        $this->_userModel = new User();
        $this->_role = $this->_userModel->getRole();
    }
    public function actionIndex(){
        $this->_genreController->actionIndex();
    }
    public function actionView($id){
        $this->_genreController->actionView($id);
    }
    public function actionAdd(){
        if($this->_role === 'admin'){
            $this->_genreController->actionAdd();
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
            $this->_genreController->actionEdit($id);
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
            $this->_genreController->actionDelete($id);
        }
        else{
            //Не писать этого, а запретить кнопку
            include_once('views/common/header.php');
            include_once('views/common/no_rights.php');
            include_once('views/common/footer.php');
        }
    }
}