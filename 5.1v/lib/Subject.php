<?php

class Subject{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllSubjects($username){
        $this->db->query("SELECT * FROM subjects WHERE student_username=:username");
        $this->db->bind('username', $username);
        $this->db->execute();

        $data = $this->db->getAll();

        return $data;

    }

    public function deleteSubjects($username){
        $this->db->query("DELETE FROM subjects WHERE student_username = :username");
        $this->db->bind('username', $username);
        $this->db->execute();
    }
}