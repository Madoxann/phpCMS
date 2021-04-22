<?php
    class Producer {
        private $_db;
        public function __construct() {
            require_once('components/Db.php');
            $connection = DB::getConnection();
            $this->_db = $connection;
        }
        public function getAll() {
            $query = new Select('`producers`');
            $result = mysqli_query($this->_db, $query->build());
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        public function getOneById($id){
            $query = new Select('`producers`');
            $query->where("WHERE `producer_id` = $id");
            $result = mysqli_query($this->_db, $query->build());
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        public function save($producer){
            $query = new Insert('`producers`');
            $set = array('`producer_name`' => $producer['producer_name'],
                'producer_dob' => $producer['producer_dob'],
                '`producer_country`' => $producer['producer_country'],
                '`producer_description`' => $producer['producer_description'],
                '`producer_awards`' => $producer['producer_awards']);
            $query->set($set);
            if(mysqli_query($this->_db, $query->build())){
                return True;
            }
            else{
                return False;
            }
        }

        public function update($producer, $id){
            $query = new Update('`producers`');
            $set = array('`producer_name`' => $producer['producer_name'],
                'producer_dob' => $producer['producer_dob'],
                '`producer_country`' => $producer['producer_country'],
                '`producer_description`' => $producer['producer_description'],
                '`producer_awards`' => $producer['producer_awards']);
            $query->set($set);
            $query->where("WHERE `producer_id` = $id");
            if(mysqli_query($this->_db, $query->build())){
                return True;
            }
            else{
                return False;
            }
        }
        public function remove($id){
            $query = new Delete('`producers`');
            $query->where("WHERE `producer_id` = $id");
            mysqli_query($this->_db, $query->build());
            return;
        }
    }