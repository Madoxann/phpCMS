<?php
    class Movie {
        private $_db;
        public function __construct() {
            require_once('components/Db.php');
            $connection = DB::getConnection();
            $this->_db = $connection;
        }
        public function getAll() {
            $query = new Select('`movies`');
            $result = mysqli_query($this->_db, $query->build());
            $returnArr = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $fullArr = array();
            foreach ($returnArr as $oneMovie){
                array_push($fullArr, $this->getOneById($oneMovie['movie_id']));
            }
            return $fullArr;
        }
        public function getOneById($id){
            $query = new Select('`movies`');
            $what = array(0 => 'movie_id',
                          1 => 'movie_name',
                          2 => 'movie_description',
                          3 => 'movie_release_date',
                          4 => 'movie_rating',
                          5 => 'movie_awards',
                          6 => 'genres.genre_name',
                          7 => 'producers.producer_name');
            $query->what($what);
            $join = array('type' => 'LEFT', 'table' => 'genres', 'key1' => 'movies.movie_genre_id', 'key2' => 'genres.genre_id');
            $join1 = array('type' => 'LEFT', 'table' => 'producers', 'key1' => 'producers.producer_id', 'key2' => 'movies.movie_producer_id');
            $joinFull = array(1 => $join,
                              2 => $join1);
            $query->join($joinFull);
            $query->where("WHERE `movie_id` = $id");
            $result = mysqli_query($this->_db, $query->build());
            $returnArr = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $returnArr = $returnArr[0];
            return $returnArr;
        }
        public function save($movie){
            $query = new Insert('`movies`');
            $set = array('`movie_producer_id`' => $movie['movie_producer_id'],
                         '`movie_name`' => $movie['movie_name'],
                         '`movie_description`' => $movie['movie_description'],
                         '`movie_release_date`' => $movie['movie_release_date'],
                         '`movie_rating`' => $movie['movie_rating'],
                         '`movie_genre_id`' => $movie['movie_genre_id'],
                         '`movie_awards`' => $movie['movie_awards']);
            $query->set($set);
            echo $query->build();
            if(mysqli_query($this->_db, $query->build())){
                return True;
            }
            else{
                return False;
            }
        }
        public function update($movie, $id){
            $query = new Update('`movies`');
            $set = array('`movie_producer_id`' => $movie['movie_producer_id'],
                '`movie_name`' => $movie['movie_name'],
                '`movie_description`' => $movie['movie_description'],
                '`movie_release_date`' => $movie['movie_release_date'],
                '`movie_rating`' => $movie['movie_rating'],
                '`movie_genre_id`' => $movie['movie_genre_id'],
                '`movie_awards`' => $movie['movie_awards']);
            $query->where("WHERE `movie_id` = $id");
            $query->set($set);
            if(mysqli_query($this->_db, $query->build())){
                return True;
            }
            else{
                return False;
            }
        }
        public function remove($id){
            $query = new Delete('`movies`');
            $query->where("WHERE `movie_id` = $id");
            mysqli_query($this->_db, $query->build());
            return;
        }
        public function getIdTable($tableName){
            $idName = substr($tableName,0,strlen($tableName)-1).'_id';
            $query = new Select($tableName);
            $what = array(0 => $idName);
            $query->what($what);
            $result = mysqli_query($this->_db, $query->build());
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
    }