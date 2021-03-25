<?php
    class Producer {
        private $_db;
        public function __construct() {
            require_once('components/Db.php');
            $connection = DB::getConnection();
            $this->_db = $connection;
        }
        public function getAll() {
            $query = "SELECT * FROM `producers`;";
            $result = mysqli_query($this->_db, $query);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        public function getOneById($id){
            $query = "SELECT * FROM `producers`
                        WHERE `producer_id` = $id;";
            $result = mysqli_query($this->_db, $query);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        public function save($producer){
            $query = "INSERT INTO `producers` 
                        SET `producer_name` = '$producer[producer_name]',
                            `producer_dob` = '$producer[producer_dob]',
                            `producer_country` = '$producer[producer_country]',
                            `producer_description` = '$producer[producer_description]',
                            `producer_awards` = '$producer[producer_awards]';";
            if(mysqli_query($this->_db, $query)){
                return True;
            }
            else{
                return False;
            }
        }

        public function update($producer, $id){
            $query = "UPDATE `producers` 
                        SET `producer_name` = '$producer[producer_name]',
                            `producer_dob` = '$producer[producer_dob]',
                            `producer_country` = '$producer[producer_country]',
                            `producer_description` = '$producer[producer_description]',
                            `producer_awards` = '$producer[producer_awards]'
                        WHERE `producer_id` = $id;";
            if(mysqli_query($this->_db, $query)){
                return True;
            }
            else{
                return False;
            }
        }
        public function remove($id){
            $query = "
                DELETE FROM `producers`
                WHERE `producer_id` = $id;
                    ";
            mysqli_query($this->_db, $query);
            return;
        }
    }