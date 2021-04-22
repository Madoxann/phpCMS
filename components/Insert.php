<?php
class Insert{
    private $_from;
    private $_set = '';
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
    public function build(){
        return "
                INSERT INTO $this->_from
                SET $this->_set;
            ";
    }
}