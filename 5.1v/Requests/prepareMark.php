<?php include_once '../config/init.php'; ?>

<?php 
    $template = new Template('../templates/admin/Requests/prepareMark.php');
    $m = new Mark;
    $s = new Subject;

    $username = $_POST['username'];
    $monthInfo = $_POST['monthInfo'];
    $sy = explode('-', sy);

    $template->subjects = $s->getSubjectNames($username);
    $template->months = $monthInfo[1];
    $template->markTypes = $m->markTypes;
    $template->years = $sy;

    echo $template;

?>
