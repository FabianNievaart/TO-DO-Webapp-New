<?php
class record{
    private $_db;

    public function __construct($record = null){
        $this->_db = db::getInstance();
    }

    public function create($fields = array()){
        if(!$this->_db->insert('todo', $fields)){
            throw new Exception('There was a problem creating a new record');
        }
    }
}