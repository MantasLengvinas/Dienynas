<?php include_once '../config/init.php'; ?>

<?php 
    $template = new Template('../templates/admin/Data/logs.php');
    
    $template->logs = file_get_contents("../log.txt");
    $template->version = version;

    echo $template;

?>

