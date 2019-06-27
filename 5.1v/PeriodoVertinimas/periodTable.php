<?php include_once '../config/init.php'; ?>

<?php
$s = new Subject;
$p = new Period;
$template = new Template('../templates/user/PeriodoVertinimas/periodTable.php');

$period = $_POST['p'];
$subjects = $s->getAllSubjects($_SESSION['username']);
$template->subjects = $subjects;
$template->period = $period;
$template->p = $p;
$template->description = $p->setPeriodDesc($period);

echo $template;