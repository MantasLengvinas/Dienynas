<?php include_once '../config/init.php'; ?>

<?php 

    $s = new Subject;

    $username = $_POST['st'];
    $subject = $_POST['s'];
    $teacher = $_POST['t'];

    $response = $s->uploadSubject($username, $subject, $teacher);

    echo $response;

?>