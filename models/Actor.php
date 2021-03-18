<?php
    require_once('components/Db.php');
    require_once('config/db.php');
    class Actor {
        private $_connection;
        public function __construct() {
            $this->_connection = DB::getConnection();
        }

        public function getAll(){
            mysqli_set_charset($this->_connection, 'utf8');
            $query = 'SELECT * FROM `actors`';
            $result = mysqli_query($this->_connection,$query);
            return mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
        public function save($actor){
            $query = "INSERT INTO `actors` 
                        SET `actor_name` = '$actor[actor_name]',
                            `actor_dob` = '$actor[actor_dob]',
                            `actor_country` = '$actor[actor_country]',
                            `actor_rating` = '$actor[actor_rating]',
                            `actor_description` = '$actor[actor_description]',
                            `actor_awards` = '$actor[actor_awards]';";
            if(mysqli_query($this->_connection, $query)){
                return True;
            }
            else{
                return False;
            }
        }
        public function update($actor, $id){
            $query = "UPDATE `news` 
                        SET `actor_name` = '$actor[actor_name]',
                            `actor_dob` = '$actor[actor_dob]',
                            `actor_country` = '$actor[actor_country]',
                            `actor_rating` = '$actor[actor_rating]',
                            `actor_description` = '$actor[actor_description]',
                            `actor_awards` = '$actor[actor_awards]'
                        WHERE `actor_id` = $id;";
            if(mysqli_query($this->_connection, $query)){
                return True;
            }
            else{
                return False;
            }
        }
    }