<?php

class BaseModel {
    protected $tableName;
    protected $db;

    public function __construct(){
        $this->db = new Database;
    }

    /**
     * This method is to get all pengguna from database
     */
    public function getAll(){
        $this->db->query("SELECT * FROM " . $this->tableName);
        $result = $this->db->resultSet();
        
        // Get columns list
        $this->db->query("DESCRIBE " . $this->tableName);
        $columns = $this->db->resultSet();
        
        return array('results' => $result, 'columns' => $columns);
    }

    public function getById($key, $id){
        $this->db->query('SELECT * FROM ' . $this->tableName . ' WHERE '. $key.'=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
    }
}