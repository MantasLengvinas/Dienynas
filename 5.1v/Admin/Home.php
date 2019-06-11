<?php include_once '../config/init.php'; ?>

<?php 

$template = new Template('../templates/admin/home.php');
$user = new User();

$template->users = $user->getAllUsers();

echo $template;