<?php include_once 'config/init.php'; ?>

<?php

$user = new User();

$template = new Template('templates/login.php');

$template->title = 'Login page';

echo $template;