<?php

class Period {

    private $db, $m;

    public function __construct(){
        $this->db = new Database;
        $this->m = new Mark;
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

    public function loadPeriodMarks($period, $username){

    }

}

?>