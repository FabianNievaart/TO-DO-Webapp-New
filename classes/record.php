<?php
class Record{
    private $_db;

    public function __construct($record = null){
        $this->_db = DB::getInstance();
    }

    public function create($fields = array()){
        if(!$this->_db->insert('todo', $fields)){
            throw new Exception('There was a problem creating a new record');
        }
    }

    public function update($fields = array(), $id){

        if (!$this->_db->update('todo', $id, $fields)){
            throw new Exception('There was a problem updating information');
        }
    }

    public function delete($where = array()){

        if (!$this->_db->delete('todo', $where)){
            throw new Exception('There was a problem deleting the record');
        }
    }
}