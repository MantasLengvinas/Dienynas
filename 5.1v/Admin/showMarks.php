<?php include_once '../config/init.php'; ?>

<?php 

    $template = new Template('../templates/admin/showMarks.php');
    $m = new Mark;
    $s = new Subject;
    $username = $_GET['username'];

    $marks = $m->getAllMarks($username);
    $subjects = $s->getSubjectNames($username);

    foreach($marks as $mark){
        $mark->subject = $subjects[$mark->subject]->subject;
        $mark->type = $m->typeColor($mark->type);
    }

    $template->marks = $marks;

    echo $template;

?>