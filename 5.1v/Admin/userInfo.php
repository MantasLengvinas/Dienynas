<?php include_once '../config/init.php'; ?>

<?php 
    $id = $_GET['id'];

    $template = new Template('../templates/admin/userInfo.php');
    $user = new User();

    $template->data = $user->getUserData($id);

    echo $template;
?>