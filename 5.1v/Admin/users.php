<?php include_once '../config/init.php'; ?>

<?php 
    $template = new Template('../templates/admin/users.php');
    $user = new User();

    $template->users = $user->getAllUsers();

    echo $template;
?>