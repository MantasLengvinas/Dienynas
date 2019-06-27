<?php
class Subject{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    function compareByName($a, $b) {
        return strcmp($a->name, $b->name);
    }

    public function getAllSubjects($username){
        $this->db->query("SELECT * FROM subjects WHERE student_username=:username");
        $this->db->bind('username', $username);
        $this->db->execute();

        $data = $this->db->getAll();
        usort($data, function($a, $b){
            return strcmp($a->subject, $b->subject);
        });

        return $data;
    }

    public function getSubjectNames($username){
        $this->db->query("SELECT subject FROM subjects WHERE student_username=:username");
        $this->db->bind('username', $username);
        $this->db->execute();

        $data = $this->db->getAll();
        sort($data);

        return $data;
    }

    public function uploadSubject($username, $subject, $teacher){
        $this->db->query("INSERT INTO subjects (student_username, subject, teacher) VALUES (:username, :subject, :teacher)");
        $this->db->bind('username', $username);
        $this->db->bind('subject', $subject);
        $this->db->bind('teacher', $teacher);
        $this->db->execute();

        return 'Mokomasis dalykas sėkmingai įrašytas';
    }

    public function deleteSubjects($username){
        $this->db->query("DELETE FROM subjects WHERE student_username = :username");
        $this->db->bind('username', $username);
        $this->db->execute();
    }
}