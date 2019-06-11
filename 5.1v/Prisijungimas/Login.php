<?php include_once '../config/init.php'; ?>

<?php

//User class
$user = new User();
$template = new Template('../templates/login.php');

//Login

$template->errorMsgLogin = '';

if (!empty($_POST['loginSubmit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(strlen(trim($username)) > 1 && strlen(trim($password)) > 1 ){
        $uid = $user->Login($username, $password);
        if($uid){
            $url = 'Naujienos?clickMode=true';
            header("Location: $url");
        }
        else{
            $template->errorMsgLogin = "Please check login details.";
        }
    }
}

echo $template;