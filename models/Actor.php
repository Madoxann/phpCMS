<?php
    class Actor {
        private $_db;
        public function __construct() {
            require_once('components/Db.php');
            $connection = DB::getConnection();
            $this->_db = $connection;
        }
        public function getAll() {
            $query = new Select('`actors`');
            $result = mysqli_query($this->_db, $query->build());
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        public function getOneById($id){
            $query = new Select('`actors`');
            $query->where("WHERE `actor_id` = $id");
            $result = mysqli_query($this->_db, $query->build());
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        public function save($actor){
            $query = new Insert('`actors`');
            $set = array('`actor_name`' => $actor['actor_name'],
                         '`actor_dob`' => $actor['actor_dob'],
                         '`actor_country`' => $actor['actor_country'],
                         '`actor_rating`' => $actor['actor_rating'],
                         '`actor_description`' => $actor['actor_description'],
                         '`actor_awards`' => $actor['actor_awards']);
            $query->set($set);

            if(mysqli_query($this->_db, $query->build())){
                return True;
            }
            else{
                return False;
            }
        }
        public function update($actor, $id){
            $query = new Update('`actors`');
            $set = array('`actor_name`' => $actor['actor_name'],
                '`actor_dob`' => $actor['actor_dob'],
                '`actor_country`' => $actor['actor_country'],
                '`actor_rating`' => $actor['actor_rating'],
                '`actor_description`' => $actor['actor_description'],
                '`actor_awards`' => $actor['actor_awards']);
            $query->where("WHERE `actor_id` = $id");
            $query->set($set);
            if(mysqli_query($this->_db, $query->build())){
                return True;
            }
            else{
                return False;
            }
        }
        public function remove($id){
            $query = new Delete('`actors`');
            $query->where("WHERE `actor_id` = $id");
            mysqli_query($this->_db, $query->build());
            return;
        }
    }
