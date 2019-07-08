<?php include_once '../config/init.php'; ?>

<?php

$m = new Mark;
$s = new Subject;
$p = new Period;
$template = new Template('../templates/user/PeriodoVertinimas/MokinioVertinimai.php');

$template->marks = $m->getAllMarks($_SESSION['username']);
$template->subjects = $s->getAllSubjects($_SESSION['username']);

$template->school = $_SESSION['school'];
$template->title = 'Mokinio laikotarpio vertinimai';
$template->firstname = $_SESSION['firstname'];
$template->lastname = $_SESSION['lastname'];
$template->role = $_SESSION['role'];
$template->sy = sy;
$template->version = version;

echo $template;