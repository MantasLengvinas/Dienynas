<?php 

class Mark{

    private $db;
    public $markTypes = array('Kontrolinis darbas', 'Savarankiškas darbas', 'Klasės darbas', 'Kaupiamasis', 'Praktinis darbas', 'Namų darbai', 'Įskaita');

    public function __construct(){
        $this->db = new Database;
    }

    public function typeColor($id){
        switch($id){
            case 0:
            $color = 'color_kontr';
            break;
            case 1:
                $color = 'color_sav';
            break;
            case 2:
                $color = 'color_klases';
            break;
            case 3:
                $color = 'color_kaupiamasis';
            break;
            case 4: 
                $color = 'color_praktinis';
            break;
            case 5:
                $color = 'color_namu';
            break;
            case 6:
                $color = 'color_iskaita';
            break;
        }
        return $color;
    }

    public function getAllMarks($username){
        $this->db->query("SELECT * FROM marks WHERE student_username=:username ORDER BY uploaded DESC");
        $this->db->bind('username', $username);
        $this->db->execute();

        $data = $this->db->getAll();

        return $data;
    }

    public function getMonthMarks($username, $month, $year){
        $this->db->query("SELECT * FROM marks WHERE student_username=:username AND month=:month AND year=:year ORDER BY uploaded DESC");
        $this->db->bind('username', $username);
        $this->db->bind('month', $month);
        $this->db->bind('year', $year);
        $this->db->execute();

        $data = $this->db->getAll();

        return $data;
    }

    public function deleteMarks($username){
        $this->db->query("DELETE FROM marks WHERE student_username = :username");
        $this->db->bind('username', $username);
        $this->db->execute();
    }

    public function uploadMark($uname, $subj, $year, $month, $day, $mark, $type){
        $period = 0;
        $ts = strtotime('1/25/2019 0:0');
        $mts = strtotime(''.$month.'/'.$day.'/'.$year.' 0:0');
        if($mts > $ts){
            $period = 2;
        }
        else{
            $period = 1;
        }

        echo $ts.' '.$mts.' ';
        $this->db->query("INSERT INTO marks (student_username, subject, year, month, day, mark, type, period) VALUES (:student_username, :subject, :year, :month, :day, :mark, :type, :period)");
        $this->db->bind("student_username", $uname);
        $this->db->bind("subject", $subj);
        $this->db->bind("year", $year);
        $this->db->bind("month", $month);
        $this->db->bind("day", $day);
        $this->db->bind("mark", $mark);
        $this->db->bind("type", $type);
        $this->db->bind("period", $period);
        $this->db->execute();

        return 'Pažymys sėkmingai įrašytas!';
    }
}