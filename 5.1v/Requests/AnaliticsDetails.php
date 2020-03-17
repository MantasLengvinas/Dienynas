<?php include_once '../config/init.php'; ?>

<?php 

    function totalAverage($marks, $month, $year) {
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

    $student = $_GET['s'];
    $period = $_GET['p'];
    $monthNames = $_GET['md'];

    $m = new Mark;

    class Data {
        public $isUseable;
        public $monthAvg, $totalAvg;
        public $labels;
    }

    $totalAVGS = [];
    $monthAVGS = [];
    $labels = [];

    $totalResponse = $m->getAllMarks($student);

    for($i = 0; $i < date("m") + 4; $i++){
        $monthData = $monthNames[$i];
        $timestamp = strtotime(''.$monthData['n'].'/28/'.$monthData['year'].'');

        $monthResponse = $m->monthMarksAnalitics($student, $monthData['n']);
        $monthAVG = round($monthResponse[0]->monthAVG, 2);
        array_push($monthAVGS, $monthAVG);

        $totalAVG = totalAverage($totalResponse, $monthData['n'], $monthData['year']);
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
    $dataPoint->monthAvg = $monthAVGS;
    $dataPoint->totalAvg = $totalAVGS;
    $dataPoint->labels = $labels;

    $DataJSON = json_encode($dataPoint);

?>

<?php

    $template = new Template('../templates/admin/Requests/analiticsdetails.php');

    $template->DataJSON = $DataJSON;
    $template->sy = sy;
    $template->curry = curry;
    $template->version = version;

    echo $template;