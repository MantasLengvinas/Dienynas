<?php

class Period {

    private $db, $m;

    public function __construct(){
        $this->db = new Database;
        $this->m = new Mark;
    }

    public function getAvg($username, $subject){
        $this->db->query("SELECT mark FROM marks WHERE student_username = :username");
        $this->db->bind("username", $username);
        $this->db->execute();

        $marks = $this->db->getAll();
        $sum = 0;
        $i = 0;

        // foreach($marks as $mark){
        //     $sum += intval($mark);
        //     $i++;
        // }

        return $marks;
    }

}

?>