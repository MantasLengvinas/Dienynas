<?php include_once '../config/init.php'; ?>

<?php

$template = new Template('../templates/admin/marks.php');
$user = new User;

$template->sy = sy;
$template->students = $user->getStudents();
$template->curry = curry;
$template->version = version;

echo $template;