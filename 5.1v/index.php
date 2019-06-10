<?php

include_once 'config/init.php';

$template = new Template('templates/login.php');

$template->title = 'Login page';

echo $template;