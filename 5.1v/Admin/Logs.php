<?php include_once '../config/init.php'; ?>

<?php 
    $template = new Template('../templates/admin/logs.php');
    
    $template->logs = file_get_contents("../log.txt");

    echo $template;

?>

