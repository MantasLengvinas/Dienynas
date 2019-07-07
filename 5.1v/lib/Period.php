<?php

class Period {

    private $db, $s;

    public function __construct(){
        $this->db = new Database;
        $this->s = new Subject;
    }

    public function setPeriodDesc($period){
        switch($period){
            case 0:
                return 'Metinis';
            break;
            case 1:
                return '1 pusmetis, 2018-09-03 - 2019-01-25';
            break;
            case 2:
                return '2 pusmetis, 2018-01-26 - 2019-06-21';
        }
    }

    public function rowHeight($string){
        if(strlen($string) >= 40){
            return '67';
        }
        else{
            return '48';
        }
    }

    public function getAllMarks($period, $username){
        $this->db->query("SELECT * FROM marks WHERE student_username=:username AND period=:period ORDER BY uploaded DESC");
        $this->db->bind('username', $username);
        $this->db->bind('period', $period);
        $this->db->execute();

        $data = $this->db->getAll();

        return $data;
    }

    public function loadPeriodMarks($period, $subject, $username){
        $this->db->query("SELECT * FROM marks WHERE student_username=:username AND subject=:subject AND period=:period ORDER BY uploaded DESC");
        $this->db->bind('username', $username);
        $this->db->bind('subject', $subject);
        $this->db->bind('period', $period);
        $this->db->execute();

        $data = $this->db->getAll();

        return $data;
    }

    public function subjectAvg($period, $subject, $username){
        $marks = $this->loadPeriodMarks($period, $subject, $username);
        $sum = 0;
        $i = 0;
        foreach($marks as $mark){
            $sum += intval($mark->mark);
            $i++;
        }

        if($sum > 0){
            //$this->updatePeriod($username, $subject, $period, round($sum / $i, 2));
            return round($sum / $i, 2);
        }
        else{
            //$this->updatePeriod($username, $subject, $period, 0);
            return 0;
        }
    }

    public function roundedAvg($period, $subject, $username){
        $avg = $this->subjectAvg($period, $subject, $username);

        if($avg != 0){
            return round($avg);
        }
         
    }

    public function totalRoundedAvg($period, $username){
        //if($period == 3){
            $sub = $this->s->getSubjectNames($username);
            $sum = 0;
            $i = 0;

            foreach($sub as $su){
                $sum += $this->roundedAvg($period, $i, $username);
                if($this->roundedAvg($period, $i, $username) != 0){
                    $i++;
                }
            }

            if($sum > 0){
                return round($sum / $i, 2);
            }
        //}

    }

    public function totalAvg($period, $username){
        $sum = 0;
        $i = 0;
        $marks = $this->getAllMarks($period, $username);

        foreach($marks as $mark){
            $sum += intval($mark->mark);
            $i++;
        }

        if($sum > 0){
            return round($sum / $i, 2);
        }
    }

    private function updatePeriod($username, $subj, $period, $value){

        $name = 0;
        $sub = $this->s->getSubjectNames($username);
        $subject = utf8_encode($sub[intval($subj)]->subject);

        switch($period){
            case 0:
                $name = 'annual';
            break;
            case 1:
                $name = 'first_period';
            break;
            case 2:
                $name = 'second_period';
            break;
        }
 
        $this->db->query("UPDATE subjects SET $name=:value WHERE student_username=:username AND subject=:subject");
        $this->db->bind('value', $value);
        $this->db->bind('username', $username);
        $this->db->bind('subject', $subject);

        $this->db->execute();
    }

}

?>