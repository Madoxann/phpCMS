<?php
class UserController{
    private $userModel;
    public function __construct(){
        $this->userModel = new User();
    }
    public function actionReg(){
        if (isset($_POST['user_login'])) {
            $userLogin = htmlentities($_POST['user_login']);
            $userEmail = htmlentities($_POST['user_email']);
            $userPassword = md5(htmlentities($_POST['user_password']));
            $userAddress = htmlentities($_POST['user_email']);
            $userPhone = htmlentities($_POST['user_phone']);
            $userDob = htmlentities($_POST['user_dob']);
            $errors = [];
            if ($_POST['user_password'] != $_POST['user_repeat_password']) {
                $errors[] = 'Пароли не совпадают';
            }
            //else{
                //регулярки
            //    if($this->userModel->checkIfEmailExists($userEmail)){
            //        $errors[] = 'Такой пользователь не существует';
            //    }
            //}
            if(empty($errors)){
                $data = array(
                    'login' => $userLogin,
                    'email' => $userEmail,
                    'password' => $userPassword,
                    'address' => $userAddress,
                    'phone' => $userPhone,
                    'dob' => $userDob
                );
                if($this->userModel->register($data)){
                    header('Location: '.FULL_SITE_ROOT.'actor/index');
                }
                else{
                    $errors[] = 'Не удалось зарегестрироваться';
                }
            }
        }
        include_once('views/common/header.php');
        include_once('views/user/reg.php');
        include_once('views/common/footer.php');
        return;
    }
    public function actionAuth(){
        if (isset($_POST['user_login'])) {
            $userLogin = htmlentities($_POST['user_login']);
            $userPassword = htmlentities($_POST['user_password']);
            $userPassword = md5($userPassword);
            $userInfo = $this->userModel->getUserInfo($userLogin,$userPassword);
            if(intval($userInfo['count']) == 0){
                $errors[] = 'Нет пользователя';
            }
            if(empty($errors)){
                if($this->userModel->auth($userInfo['user_id'])){
                    header('Location:'.FULL_SITE_ROOT.'actor/index');
                }
            }
        }
        include_once('views/common/header.php');
        include_once('views/user/auth.php');
        include_once('views/common/footer.php');
        return;
    }
    public function actionLogout(){
        $this->userModel->logout();
        header('Location:'.FULL_SITE_ROOT.'actor/index');
    }
}