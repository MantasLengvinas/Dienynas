<?php include_once '../config/init.php'; ?>

<?php

$user = new User;
$template = new Template('../templates/user/Pamoka/MokinioDienynas.php');

$template->marks = $user->getAllMarks($_SESSION['username']);
$template->subjects = $user->getAllSubjects($_SESSION['username']);

$template->school = $_SESSION['school'];
$template->firstname = $_SESSION['firstname'];
$template->lastname = $_SESSION['lastname'];
$template->role = $_SESSION['role'];

echo $template;