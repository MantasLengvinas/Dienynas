<?php include_once '../config/init.php'; ?>

<?php 
    $template = new Template('../templates/admin/marks.php');
    $user = new User;
    $m = new Mark;
    $s = new Subject;

    $template->students = $user->getStudents();
    $template->markTypes = $m->markTypes;

    echo $template;

?>