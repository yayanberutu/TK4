<?php

class BaseModel {
    protected $tableName = "Pengguna";
    protected $db;

    public function __construct(){
        $this->db = new Database;
    }

    /**
     * This method is to get all pengguna from database
     */
    public function getAll(){
        $this->db->query("SELECT * FROM " . $this->tableName);
        return $this->db->resultSet();
    }
}