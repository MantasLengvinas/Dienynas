<?php include_once '../config/init.php'; ?>

<?php 
    $template = new Template('../templates/admin/marks.php');
    $user = new User;
    

    $template->students = $user->getStudents();

    echo $template;

?>
