<?php include_once '../config/init.php'; ?>

<?php 

    $s = new Subject;

    $username = $_POST['st'];
    $subject = $_POST['s'];
    $teacher = $_POST['t'];

    $status = $s->uploadSubject($username, $subject, $teacher);

    $r = new RNotify;

    $r->title = "Mokomasis dalykas";
    $r->status = $status;

    if($status){
        $r->content = "Mokomasis dalykas sėkmingai pridėtas (".$subject.", ".$teacher.")";
    }
    else{
        $r->content = "Klaida. Mokomojo dalyko pridėti nepavyko";
    }
    
    $response = json_encode($r);

    echo $response;

?>