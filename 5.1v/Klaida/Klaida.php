<?php include_once '../config/init.php'; ?>

<?php

$template = new Template('../templates/other/klaida.php');

$template->curry = curry;
$template->version = version;

echo $template;