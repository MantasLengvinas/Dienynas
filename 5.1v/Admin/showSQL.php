<?php include_once '../config/init.php'; ?>

<?php 

    $template = new Template('../templates/admin/showsql.php');

    $file = $_POST['database'];
    $path = "../_db_backup/".$file."";

    $template->sql = file_get_contents($path);

    echo $template;

?>