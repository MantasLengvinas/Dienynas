<?php include_once '../config/init.php'; ?>

<?php 

    $m = new Mark;
    $s = new Subject;

    $username = $_POST['student'];
    $subject = $_POST['subject'];
    $year = $_POST['year'];
    $month = $_POST['month']; 
    $day = $_POST['day']; 
    $mark = $_POST['mark']; 
    $type = $_POST['type'];

    $status = $m->uploadMark($username, $subject, $year, $month, $day, $mark, $type);

    $r = new RNotify;

    $r->title = "Pažymys";
    $r->status = $status;

    $um = "";

    if($status){
        $r->content = "Pažymys sėkmingai įrašytas";
    }
    else{
        $r->content = "Klaida. Pažymys neįrašytas";
    }
    
    $response = json_encode($r);

    echo $response;

?>