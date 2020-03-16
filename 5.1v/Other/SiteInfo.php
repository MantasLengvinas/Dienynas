<?php include_once '../config/init.php'; ?>

<?php 
    $template = new Template('../templates/admin/Other/siteInfo.php');

    $template->version = version;

    echo $template;
?>