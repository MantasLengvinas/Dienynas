<?php include_once '../config/init.php'; ?>

<?php 
    $template = new Template('../templates/admin/User/sessions.php');
    $session = new Session;

    $template->sessions = $session->getSessions();

    echo $template;

?>

