<?php include_once '../config/init.php'; ?>

<?php 

    $m = new Mark;

    $username = $_POST['student'];
    $subject = $_POST['subject'];
    $year = $_POST['year'];
    $month = $_POST['month']; 
    $day = $_POST['day']; 
    $mark = $_POST['mark']; 
    $type = $_POST['type'];

    $response = $m->uploadMark($username, $subject, $year, $month, $day, $mark, $type);

    echo $response;

?>