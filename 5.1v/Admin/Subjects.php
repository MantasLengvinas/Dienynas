<?php include_once '../config/init.php'; ?>

<?php 
    $template = new Template('../templates/admin/subjects.php');
    $user = new User;

    $template->students = $user->getStudents();

    echo $template;

?>

