<?php
    class Select{
        private $_what = '*';
        private $_from;
        private $_join = '';
        private $_where = '';
        private $_group =  '';
        private $_having = '';
        private $_order = '';
        private $_limit = '';
        public function __construct($from){
            $this->_from = $from;
            return $this;
        }
        public function what($what){
            $str = '';
            foreach ($what as $alias => $column){
                if(is_numeric($alias)){
                    $str .= "$column, ";
                }
                else{
                    $str .= "$column AS $alias";
                }
            }
            $str = rtrim($str,', ');
            $this->$what = $str;
            return $this;
        }
        public function join($join){
            foreach ($join as $item){
                $this->_join .= "$item[type] JOIN $item[table] ON $item[key1] = $item[key2] ";
            }
            return $this;
        }
        public function where($where){
            $this->_where = $where;
            return $this;
        }
        public function group($group){
            $this->_group = "GROUP BY $group";
            return $this;
        }
        public function having($having){
            $this->_having = $having;
            return $this;
        }
        public function orderBy($column, $dir = 'ASC'){
            $this->_order = "ORDER BY $column $dir";
            return $this;
        }
        public function limit($limit, $offset = 0){
            $this->_limit = "LIMIT $offset, $limit";
            return $this;
        }
        public function build(){
            return "
                SELECT $this->_what
                FROM $this->_from
                $this->_join
                $this->_where
                $this->_group
                $this->_having
                $this->_order
                $this->_limit;
            ";
        }
    }