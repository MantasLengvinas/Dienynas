<?php include_once '../config/init.php'; ?>

<?php

    $template = new Template('../templates/admin/Education/analitics.php');
    $u = new User;
    $s = new Subject;

    $template->students = $u->getStudents();
    $template->sy = sy;
    $template->curry = curry;
    $template->version = version;

    echo $template;