<?php include_once '../inc/header.php'; ?>

<?php

$user = new User;
$template = new Template('../templates/user/Pamoka/MokinioDienynas.php');

$template->marks = $user->getAllMarks();
$template->subjects = $user->getAllSubjects();

echo $template;