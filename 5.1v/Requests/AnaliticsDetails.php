<?php include_once '../config/init.php'; ?>

<?php 

    function TotalAverageByMonth($marks, $month, $year) {
        $sum = 0; $a = 0;
        $days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $time = strtotime(''.$month.'/'.$days.'/'.$year.'');
        foreach($marks as $mark){
            $markTime = strtotime(''.$mark->month.'/'.$mark->day.'/'.$mark->year.'');
            if($markTime <= $time){
                $sum += $mark->mark;
                $a++;
            }
        }

        if($a > 0){
            $avg = round($sum / $a, 2);
            return $avg;
        }

        return 0;

    }

    function WeeksInMonth($month, $year){
        $num_of_days = date("t", mktime(0,0,0,$month,1,$year)); 
        $lastday = date("t", mktime(0, 0, 0, $month, 1, $year)); 
        $no_of_weeks = 0; 
        $count_weeks = 0; 

        while($no_of_weeks < $lastday){ 
            $no_of_weeks += 7; 
            $count_weeks++; 
        } 

	    return $count_weeks;
    } 

    function WeeksHavePassed($date1, $date2) {
        if($date1 > $date2) return WeeksHavePassed($date2, $date1);
        $first = DateTime::createFromFormat('m/d/Y', $date1);
        $second = DateTime::createFromFormat('m/d/Y', $date2);

        return floor($first->diff($second)->days/7);
    }

    function TotalAverageByWeek($marks, $weekEnd, $month, $year){
        $sum = 0; $a = 0;
        $time = strtotime(''.$month.'/'.$weekEnd.'/'.$year.'');
        foreach($marks as $mark) {
            $markTime = strtotime(''.$mark->month.'/'.$mark->day.'/'.$mark->year.'');
            if($markTime <= $time){
                $sum += $mark->mark;
                $a++;
            }
        }

        if($a > 0){
            $avg = round($sum / $a, 2);
            return $avg;
        }

        return 0;
    }

?>

<?php 

    class Data {
        public $isUseable;
        public $title;
        public $desc;
        public $monthAvg, $totalAvg;
        public $labels;
    }

    $m = new Mark;

    function AnaliticsByMonths($student, $monthNames, $m) {
        //Returns data json

        //Data arrays
        $totalAVGS = [];
        $monthAVGS = [];
        $labels = [];

        $totalResponse = $m->getAllMarks($student);

        for($i = 0; $i < date("m") + 4; $i++){
            $monthData = $monthNames[$i];
            $days = cal_days_in_month(CAL_GREGORIAN, $monthData['n'], $monthData['year']);
            $timestamp = strtotime(''.$monthData['n'].'/'.$days.'/'.$monthData['year'].'');
    
            $monthResponse = $m->monthMarksAnalitics($student, $monthData['n']);
            $monthAVG = round($monthResponse[0]->monthAVG, 2);
            array_push($monthAVGS, $monthAVG);
    
            $totalAVG = TotalAverageByMonth($totalResponse, $monthData['n'], $monthData['year']);
            array_push($totalAVGS, $totalAVG);
    
        }
        
        for($i = 0; $i < date("m") + 4; $i++){
            $monthData = $monthNames[$i];
            array_push($labels, $monthData['name']);
        }
    
        
        $dataPoint = new Data;

        if(array_sum($monthAVGS) == 0 && array_sum($totalAVGS) == 0){
            $dataPoint->isUseable = false;
        } else {
            $dataPoint->isUseable = true;
        }
        $dataPoint->title = "mėnesius";
        $dataPoint->desc = "mėnesį";
        $dataPoint->monthAvg = $monthAVGS;
        $dataPoint->totalAvg = $totalAVGS;
        $dataPoint->labels = $labels;
    
        $DataJSON = json_encode($dataPoint);

        return $DataJSON;
    }

    function AnaliticsByWeeks($student, $monthNames, $m) {
        //Returns data json

        $totalAVGS = [];
        $monthAVGS = [];
        $labels = [];

        $totalResponse = $m->getAllMarks($student);

        $fm = $monthNames[0];
        $weeks = WeeksHavePassed($fm['n'].'/1/'.$fm['year'], date("m/d/Y"));

        for($i = 0; $i < $weeks; $i++){
            //$monthData = $monthNames[$i];
            //$days = cal_days_in_month(CAL_GREGORIAN, $monthData['n'], $monthData['year']);
            //$timestamp = strtotime(''.$monthData['n'].'/'.$days.'/'.$monthData['year'].'');
            //
            //array_push($monthAVGS, 0);
            //
            //$totalAVG = TotalAverageByWeek($totalResponse, 15, $monthData['n'], $monthData['year']);
            //array_push($totalAVGS, $totalAVG);
    
        }

        //Set labels
        
        $d = '02';
        $mo = '09';

        for($i = 0; $i < date("m") + 4; $i++){
            $monthData = $monthNames[$i];
            $k = WeeksInMonth($monthData['n'], $monthData['year']);
            $days = cal_days_in_month(CAL_GREGORIAN, $monthData['n'], $monthData['year']);

            for($j = 0; $j < $k; $j++){
                if($d > $days){
                    $d -= $days;
                    $weekTitle = ($mo + 1).'-'.$d;
                    array_push($labels, $weekTitle);
                }else {
                    $weekTitle = $mo.'-'.$d;
                    array_push($labels, $weekTitle);
                    $d += '07';
                }
            }

            if($mo == '12'){
                $mo = '01';
            }

            $mo++;
            $d - $days;
            
        }
    
        //Create object, pass data and return
        
        $dataPoint = new Data;

        if(array_sum($monthAVGS) == 0 && array_sum($totalAVGS) == 0){
            $dataPoint->isUseable = false;
        } else {
            $dataPoint->isUseable = true;
        }
        $dataPoint->title = "savaites";
        $dataPoint->desc = "savaitę";
        $dataPoint->monthAvg = $monthAVGS;
        $dataPoint->totalAvg = $totalAVGS;
        $dataPoint->labels = $labels;
    
        $DataJSON = json_encode($dataPoint);

        return $DataJSON;
    }

    $student = $_GET['s'];
    $period = $_GET['p'];
    $type = $_GET['t'];
    $monthNames = $_GET['md'];

?>

<?php

    $template = new Template('../templates/admin/Requests/analiticsdetails.php');

    $data = NULL;

    switch($type){
        case '1':
            $data = AnaliticsByMonths($student, $monthNames, $m);
        break;
        case '2':
            $data = AnaliticsByWeeks($student, $monthNames, $m);
        break;
    }

    $template->DataJSON = $data;
    $template->sy = sy;
    $template->curry = curry;
    $template->version = version;

    echo $template;