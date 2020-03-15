<?php include_once '../config/init.php'; ?>

<?php

//Auto redirect if logged in

if(isset($_SESSION['logged_in'])){
    if($_SESSION['role'] == 'Mokinys'){
        $url = 'Naujienos?logged_in=true';
        header("Location: $url");
    }
    else if($_SESSION['role'] == 'Administratorius'){
        $url = '../Education/Marks?logged_in=true';
        header("Location: $url");
    }
}
else{

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
                if($_SESSION['role'] == 'Administratorius'){
                    $url = '../Education/Marks?clickMode=true';
                    header("Location: $url");
                }
                else{
                    $url = 'Naujienos?clickMode=true';
                    header("Location: $url");
                }
            }
            else{
                $template->errorMsgLogin = "Neteisingas prisijungimo vardas ir/arba slaptažodis";
            }
        }
    }

    $template->v = version;
    echo $template;
}