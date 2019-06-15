<?php include_once '../config/init.php'; ?>

<?php 
    $template = new Template('../templates/admin/prepareMark.php');
    $m = new Mark;
    $s = new Subject;

    $username = $_POST['username'];
    $monthInfo = $_POST['monthInfo'];

    $template->subjects = $s->getAllSubjects($username);
    $template->months = $monthInfo;
    $template->markTypes = $m->markTypes;

    echo $template;

?>
