<?php
    class Genre {
        private $_db;
        public function __construct() {
            require_once('components/Db.php');
            $connection = DB::getConnection();
            $this->_db = $connection;
        }
        public function getAll() {
            //$query = "SELECT * FROM `genres`;";
            $query = new Select('`genres`');
            $result = mysqli_query($this->_db, $query->build());
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        public function getOneById($id){
            $query = new Select('`genres`');
            $query->where("WHERE `genre_id` = $id");
            $result = mysqli_query($this->_db, $query->build());
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        public function save($genre){
            $query = new Insert('`genres`');
            $set = array('`genre_name`' => $genre['genre_name'],
                         '`genre_description`' => $genre['genre_description']);
            $query->set($set);
            if(mysqli_query($this->_db, $query->build())){
                return True;
            }
            else{
                return False;
            }
        }
        public function update($genre, $id){
            $query = new Update('`genres`');
            $set = array('`genre_name`' => $genre['genre_name'],
                '`genre_description`' => $genre['genre_description']);
            $query->set($set);
            $query->where("WHERE `genre_id` = $id");
            if(mysqli_query($this->_db, $query->build())){
                return True;
            }
            else{
                return False;
            }
        }
        public function remove($id){
            $query = new Delete('`genres`');
            $query->where("WHERE `genre_id` = $id");
            mysqli_query($this->_db, $query->build());
            return;
        }
    }