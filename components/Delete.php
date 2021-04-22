<?php
class Delete{
    private $_from;
    private $_where = '';
    public function __construct($from){
        $this->_from = $from;
        return $this;
    }
    public function where($where){
        $this->_where = $where;
        return $this;
    }
    public function build(){
        return "
                DELETE FROM $this->_from
                $this->_where;
            ";
    }
}