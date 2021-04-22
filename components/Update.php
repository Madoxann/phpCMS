<?php
class Update{
    private $_from;
    private $_set = '';
    private $_where = '';
    public function __construct($from){
        $this->_from = $from;
        return $this;
    }
    public function set($set){
        $str = '';
        foreach ($set as $column => $value){
           $str.= "$column = '$value',";
        }
        $str = rtrim($str,', ');
        $this->_set = $str;
        return $this;
    }
    public function where($where){
        $this->_where = $where;
        return $this;
    }
    public function build(){
        return "
                UPDATE $this->_from
                SET $this->_set
                $this->_where;
            ";
    }
}