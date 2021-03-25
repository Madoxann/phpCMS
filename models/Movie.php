<?php
    class Movie {
        private $_db;
        public function __construct() {
            require_once('components/Db.php');
            $connection = DB::getConnection();
            $this->_db = $connection;
        }
        public function getAll() {
            $query = "SELECT * FROM `movies`;";
            $result = mysqli_query($this->_db, $query);
            $returnArr = mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach ($returnArr as &$oneMovie){
                $oneMovie = $this->getOneById($oneMovie['movie_id']);
            }
            return $returnArr;
        }
        public function getOneById($id){
            $query = "SELECT * FROM `movies`
                        WHERE `movie_id` = $id;";
            $result = mysqli_query($this->_db, $query);
            $returnArr = mysqli_fetch_all($result, MYSQLI_ASSOC)[0];
            $query = "SELECT `producer_name` FROM `producers`
                        WHERE `producer_id` = $returnArr[movie_producer_id];";
            $result = mysqli_query($this->_db, $query);
            $returnArr += ['movie_producer_name' => mysqli_fetch_all($result, MYSQLI_ASSOC)[0]['producer_name']];
            $query = "SELECT `genre_name` FROM `genres`
                        WHERE `genre_id` = $returnArr[movie_genre_id];";
            $result = mysqli_query($this->_db, $query);
            $returnArr += ['movie_genre_name' => mysqli_fetch_all($result, MYSQLI_ASSOC)[0]['genre_name']];
            return $returnArr;
        }
        public function save($movie){
            $query = "INSERT INTO `movies` 
                        SET  `movie_producer_id` = $movie[movie_producer_id],
                            `movie_name` = '$movie[movie_name]',
                            `movie_description` = '$movie[movie_description]',
                            `movie_release_date` = '$movie[movie_release_date]',
                            `movie_rating` = $movie[movie_rating],
                            `movie_genre_id` = $movie[movie_genre_id],
                            `movie_awards` = '$movie[movie_awards]';";
            echo $query;
            if(mysqli_query($this->_db, $query)){
                return True;
            }
            else{
                return False;
            }
        }
        public function update($movie, $id){
            $query = "UPDATE `movies` 
                        SET  `movie_producer_id` = $movie[movie_producer_id],
                            `movie_name` = '$movie[movie_name]',
                            `movie_description` = '$movie[movie_description]',
                            `movie_release_date` = '$movie[movie_release_date]',
                            `movie_rating` = $movie[movie_rating],
                            `movie_genre_id` = $movie[movie_genre_id],
                            `movie_awards` = '$movie[movie_awards]' 
                             WHERE `movie_id` = $id;";
            if(mysqli_query($this->_db, $query)){
                return True;
            }
            else{
                return False;
            }
        }
        public function remove($id){
            $query = "
                DELETE FROM `movies`
                WHERE `movie_id` = $id;";
            mysqli_query($this->_db, $query);
            return;
        }
        public function getIdTable($tableName){
            $idName = substr($tableName,0,strlen($tableName)-1).'_id';
            $query = "
                SELECT `$idName` FROM `$tableName`;
            ";
            $result = mysqli_query($this->_db, $query);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
    }