<?php include_once '../config/init.php'; ?>

<?php

$m = new Mark;
$s = new Subject;
$template = new Template('../templates/user/Pamoka/MokinioDienynas.php');

$template->marks = $m->getAllMarks($_SESSION['username']);
$template->subjects = $s->getAllSubjects($_SESSION['username']);

$template->school = $_SESSION['school'];
$template->sy = sy;
$template->title = 'Mokinio dienynas';
$template->firstname = $_SESSION['firstname'];
$template->lastname = $_SESSION['lastname'];
$template->role = $_SESSION['role'];
$template->version = version;

echo $template;