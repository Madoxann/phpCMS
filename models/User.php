<?php
class User{
    private $db;
    public function __construct(){
        require_once('config/db.php');
        $this->db = DB::getConnection();
    }
    public function checkIfEmailExists($email){
        $query = "
                SELECT COUNT(*)
                    FROM `users`
                    WHERE `user_email` = '$email';
            ";
        $result = mysqli_query($this->db, $query);
        return mysqli_fetch_assoc($result)['count'];
    }
    public function register($data){
        print_r($data);
        $query = "INSERT INTO `users`
                        SET `user_login` = '$data[login]',
                            `user_email` = '$data[email]',
                            `user_password` = '$data[password]',
                            `user_address` = '$data[address]',
                            `user_phone` = '$data[phone]',
                            `user_dob` = '$data[dob]';";
        if(mysqli_query($this->db, $query)){
            print_r($query);
            return True;
        }
        print_r($query);
        return False;
    }
    public function getUserInfo($login, $password){
        $query = "
                SELECT `user_id`,COUNT(*) AS `count`
                    FROM `users`
                    WHERE `user_login` = '$login' AND `user_password` = '$password';
            ";
        $result = mysqli_query($this->db, $query);
        return mysqli_fetch_assoc($result);
    }
    public function auth($user_id){
        $token = Helper::generateToken();
        $tokenTime = time() + 30 * 60;
        $query = "
                INSERT INTO `connects`
                    SET `connect_user_id` = '$user_id',
                        `connect_token` = '$token',
                        `connect_token_time` = FROM_UNIXTIME($tokenTime);
            ";
        mysqli_query($this->db,$query);
        setcookie('user_id', $user_id, time() + 2 * 24 * 60 * 60,'/');
        setcookie('token', $token, time() + 2 * 24 * 60 * 60,'/');
        setcookie('token_time', $tokenTime, time() + 2 * 24 * 60 * 60,'/');
        return true;
    }
    public function checkIfUserAuth(){
        if(isset($_COOKIE['user_id']) && isset($_COOKIE['token_time']) && isset($_COOKIE['token'])){
            $userId = $_COOKIE['user_id'];
            $tokenTime = $_COOKIE['token_time'];
            $token = $_COOKIE['token'];
            $query = "
                    SELECT `connect_id` FROM `connects`
                    WHERE `connect_user_id` = $userId
                    AND `connect_token` = '$token';
                ";
            $result = mysqli_query($this->db, $query);
            $userInfo = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if (!empty($userInfo)){
                if (time() > $tokenTime){
                    $token = Helper::generateToken();
                    $tokenTime = time() + 30 * 60;
                    $connectId= $userInfo['connect_id'];
                    $query = "
                            UPDATE `connects`
                                SET `connect_token` = '$token',
                                `connect_token_time` = FROM_UNIXTIME($tokenTime);
                            WHERE `connect_id` = $connectId;
                        ";
                    $result = mysqli_query($this->db, $query);
                    setcookie('user_id', $userId, time() + 2 * 24 * 60 * 60,'/');
                    setcookie('token', $token, time() + 2 * 24 * 60 * 60,'/');
                    setcookie('token_time', $tokenTime, time() + 2 * 24 * 60 * 60,'/');
                }
                return True;
            }
        }
        return False;
    }
    public function logout(){
        $userId = $_COOKIE['user_id'];
        $token = $_COOKIE['token'];
        $query = "
                DELETE FROM `connects`
                    WHERE `connect_user_id` = $userId AND 
                    `connect_token` = '$token';
            ";
        mysqli_query($this->db,$query);
        setcookie('user_id', 0, time() - 100,'/');
        setcookie('token', 0, time() -100,'/');
        setcookie('token_time', 0, time() -100,'/');
        return;
    }
}