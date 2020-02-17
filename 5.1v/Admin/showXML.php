<?php include_once '../config/init.php'; ?>

<?php 
    libxml_use_internal_errors(true);

    $template = new Template('../templates/admin/showsql.php');

    $file = $_POST['database'];
    $path = "http://localhost/Dienynas/5.1v/_db_backup/".$file."";

    $xml = simplexml_load_file($path);


    if(!$xml){
        $template->xml = "Nepavyko atidaryti failo";
        foreach(libxml_get_errors() as $error) {
            echo "<br>", $error->message;
        }
    }
    else{
        $template->xml = $xml;
    }

    echo $template;

?>