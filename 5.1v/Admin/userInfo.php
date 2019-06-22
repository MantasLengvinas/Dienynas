<?php include_once '../config/init.php'; ?>

<?php 
    $id = $_GET['id'];

    $template = new Template('../templates/admin/userInfo.php');
    $user = new User;
    $m = new Mark;

    $template->data = $user->getUserData($id);
    $subjects = $template->data[2];

    foreach($template->data[1] as $mark){
        $mark->subject = $subjects[$mark->subject]->subject;
        $mark->type = $m->typeColor($mark->type);
    }

    $roleid = $template->data[0]->role;
    $template->role = $user->roleTitle($roleid);
    
    if(sizeof($template->data[2]) == 0 && sizeof($template->data[1]) == 0){
        $template->height = 330;
    }else if(sizeof($template->data[2]) == 0 || sizeof($template->data[1]) == 0){
        $template->height = 480;
    }else if(sizeof($template->data[2]) > 0 && sizeof($template->data[1]) > 0){
        $template->height = 640;
    }

    echo $template;
?>