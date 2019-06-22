<?php include_once '../config/init.php'; ?>

<?php 

$template = new Template('../templates/admin/home.php');
$user = new User();

$template->school = $_SESSION['school'];
$template->firstname = $_SESSION['firstname'];
$template->lastname = $_SESSION['lastname'];
$template->role = $_SESSION['role'];

echo $template;