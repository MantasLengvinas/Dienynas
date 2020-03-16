<?php include_once '../config/init.php'; ?>

<?php 
    $template = new Template('../templates/admin/User/users.php');
    $user = new User();

    if(empty($_GET)){
        $template->users = $user->getAllUsers();
        foreach($template->users as $u){
            $u->role = $user->roleTitle($u->role);
        }
    }
    else{
        $value = $_GET['value'];
        $template->users = $user->searchUser($value);
        foreach($template->users as $u){
            $u->role = $user->roleTitle($u->role);
        }
    }

    $template->version = version;

    echo $template;
?>
