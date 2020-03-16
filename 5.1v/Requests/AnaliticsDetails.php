<?php include_once '../config/init.php'; ?>

<?php

    $template = new Template('../templates/admin/Requests/analiticsdetails.php');
    $u = new User;
    $m = new Mark;

    $template->student = $_GET['s'];
    $period = $_GET['P'];

    $template->sy = sy;
    $template->curry = curry;
    $template->version = version;

    echo $template;