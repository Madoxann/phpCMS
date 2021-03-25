<?php
    class Genre {
        private $_db;
        public function __construct() {
            require_once('components/Db.php');
            $connection = DB::getConnection();
            $this->_db = $connection;
        }
        public function getAll() {
            $query = "SELECT * FROM `genres`;";
            $result = mysqli_query($this->_db, $query);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        public function getOneById($id){
            $query = "SELECT * FROM `genres`
                        WHERE `genre_id` = $id;";
            $result = mysqli_query($this->_db, $query);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        public function save($genre){
            $query = "INSERT INTO `genres` 
                        SET `genre_name` = '$genre[genre_name]',
                            `genre_description` = '$genre[genre_description]'
                        ;";
            if(mysqli_query($this->_db, $query)){
                return True;
            }
            else{
                return False;
            }
        }
        public function update($genre, $id){
            $query = "UPDATE `genres` 
                        SET `genre_name` = '$genre[genre_name]',
                            `genre_description` = '$genre[genre_description]'
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
                DELETE FROM `genres`
                WHERE `genre_id` = $id;
                    ";
            mysqli_query($this->_db, $query);
            return;
        }
    }