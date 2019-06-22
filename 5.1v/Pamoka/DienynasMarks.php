<?php include_once '../config/init.php'; ?>

<?php 

    $m = new Mark;

    $month = $_POST['menuo'];
    $year = $_POST['metai'];
    $username = $_SESSION['username'];


    $data = $m->getMonthMarks($username, $month, $year);
    $json = json_encode($data);

    echo($json);

?>