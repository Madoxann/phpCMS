<?php
    class Actor {
        private $_db;
        public function __construct() {
            require_once('components/Db.php');
            $connection = DB::getConnection();
            $this->_db = $connection;
        }
        public function getAll() {
            $query = "SELECT * FROM `actors`;";
            $result = mysqli_query($this->_db, $query);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        public function getOneById($id){
            $query = "SELECT * FROM `actors`
                        WHERE `actor_id` = $id;";
            $result = mysqli_query($this->_db, $query);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        public function save($actor){
            $query = "INSERT INTO `actors` 
                        SET `actor_name` = '$actor[actor_name]',
                            `actor_dob` = '$actor[actor_dob]',
                            `actor_country` = '$actor[actor_country]',
                            `actor_rating` = '$actor[actor_rating]',
                            `actor_description` = '$actor[actor_description]',
                            `actor_awards` = '$actor[actor_awards]';";
            if(mysqli_query($this->_db, $query)){
                return True;
            }
            else{
                return False;
            }
        }
        public function update($actor, $id){
            $query = "UPDATE `actors` 
                        SET `actor_name` = '$actor[actor_name]',
                            `actor_dob` = '$actor[actor_dob]',
                            `actor_country` = '$actor[actor_country]',
                            `actor_rating` = '$actor[actor_rating]',
                            `actor_description` = '$actor[actor_description]',
                            `actor_awards` = '$actor[actor_awards]'
                        WHERE `actor_id` = $id;";
            if(mysqli_query($this->_db, $query)){
                return True;
            }
            else{
                return False;
            }
        }
        public function remove($id){
            $query = "
                DELETE FROM `actors`
                WHERE `actor_id` = $id;
                    ";
            mysqli_query($this->_db, $query);
            return;
        }
    }